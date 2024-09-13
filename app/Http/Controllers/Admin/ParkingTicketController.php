<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyParkingTicketRequest;
use App\Http\Requests\StoreParkingTicketRequest;
use App\Http\Requests\UpdateParkingTicketRequest;
use App\Models\CarItem;
use App\Models\Driver;
use App\Models\ParkingTicket;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ParkingTicketController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('parking_ticket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ParkingTicket::with(['driver', 'car_item'])->select(sprintf('%s.*', (new ParkingTicket)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'parking_ticket_show';
                $editGate      = 'parking_ticket_edit';
                $deleteGate    = 'parking_ticket_delete';
                $crudRoutePart = 'parking-tickets';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('driver_name', function ($row) {
                return $row->driver ? $row->driver->name : '';
            });

            $table->addColumn('car_item_license_plate', function ($row) {
                return $row->car_item ? $row->car_item->license_plate : '';
            });

            $table->editColumn('document', function ($row) {
                return $row->document ? '<a href="' . $row->document->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('value', function ($row) {
                return $row->value ? $row->value : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'driver', 'car_item', 'document']);

            return $table->make(true);
        }

        $drivers   = Driver::get();
        $car_items = CarItem::get();

        return view('admin.parkingTickets.index', compact('drivers', 'car_items'));
    }

    public function create()
    {
        abort_if(Gate::denies('parking_ticket_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $car_items = CarItem::pluck('license_plate', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.parkingTickets.create', compact('car_items', 'drivers'));
    }

    public function store(StoreParkingTicketRequest $request)
    {
        $parkingTicket = ParkingTicket::create($request->all());

        if ($request->input('document', false)) {
            $parkingTicket->addMedia(storage_path('tmp/uploads/' . basename($request->input('document'))))->toMediaCollection('document');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $parkingTicket->id]);
        }

        return redirect()->route('admin.parking-tickets.index');
    }

    public function edit(ParkingTicket $parkingTicket)
    {
        abort_if(Gate::denies('parking_ticket_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $car_items = CarItem::pluck('license_plate', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parkingTicket->load('driver', 'car_item');

        return view('admin.parkingTickets.edit', compact('car_items', 'drivers', 'parkingTicket'));
    }

    public function update(UpdateParkingTicketRequest $request, ParkingTicket $parkingTicket)
    {
        $parkingTicket->update($request->all());

        if ($request->input('document', false)) {
            if (! $parkingTicket->document || $request->input('document') !== $parkingTicket->document->file_name) {
                if ($parkingTicket->document) {
                    $parkingTicket->document->delete();
                }
                $parkingTicket->addMedia(storage_path('tmp/uploads/' . basename($request->input('document'))))->toMediaCollection('document');
            }
        } elseif ($parkingTicket->document) {
            $parkingTicket->document->delete();
        }

        return redirect()->route('admin.parking-tickets.index');
    }

    public function show(ParkingTicket $parkingTicket)
    {
        abort_if(Gate::denies('parking_ticket_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parkingTicket->load('driver', 'car_item');

        return view('admin.parkingTickets.show', compact('parkingTicket'));
    }

    public function destroy(ParkingTicket $parkingTicket)
    {
        abort_if(Gate::denies('parking_ticket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parkingTicket->delete();

        return back();
    }

    public function massDestroy(MassDestroyParkingTicketRequest $request)
    {
        $parkingTickets = ParkingTicket::find(request('ids'));

        foreach ($parkingTickets as $parkingTicket) {
            $parkingTicket->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('parking_ticket_create') && Gate::denies('parking_ticket_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ParkingTicket();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
