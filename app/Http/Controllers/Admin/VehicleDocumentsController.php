<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVehicleDocumentRequest;
use App\Http\Requests\StoreVehicleDocumentRequest;
use App\Http\Requests\UpdateVehicleDocumentRequest;
use App\Models\CarItem;
use App\Models\VehicleDocument;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VehicleDocumentsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('vehicle_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = VehicleDocument::with(['car_item'])->select(sprintf('%s.*', (new VehicleDocument)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'vehicle_document_show';
                $editGate      = 'vehicle_document_edit';
                $deleteGate    = 'vehicle_document_delete';
                $crudRoutePart = 'vehicle-documents';

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
            $table->addColumn('car_item_license_plate', function ($row) {
                return $row->car_item ? $row->car_item->license_plate : '';
            });

            $table->editColumn('documents', function ($row) {
                if (! $row->documents) {
                    return '';
                }
                $links = [];
                foreach ($row->documents as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });

            $table->rawColumns(['actions', 'placeholder', 'car_item', 'documents']);

            return $table->make(true);
        }

        $car_items = CarItem::get();

        return view('admin.vehicleDocuments.index', compact('car_items'));
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_items = CarItem::pluck('license_plate', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vehicleDocuments.create', compact('car_items'));
    }

    public function store(StoreVehicleDocumentRequest $request)
    {
        $vehicleDocument = VehicleDocument::create($request->all());

        foreach ($request->input('documents', []) as $file) {
            $vehicleDocument->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vehicleDocument->id]);
        }

        return redirect()->route('admin.vehicle-documents.index');
    }

    public function edit(VehicleDocument $vehicleDocument)
    {
        abort_if(Gate::denies('vehicle_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_items = CarItem::pluck('license_plate', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicleDocument->load('car_item');

        return view('admin.vehicleDocuments.edit', compact('car_items', 'vehicleDocument'));
    }

    public function update(UpdateVehicleDocumentRequest $request, VehicleDocument $vehicleDocument)
    {
        $vehicleDocument->update($request->all());

        if (count($vehicleDocument->documents) > 0) {
            foreach ($vehicleDocument->documents as $media) {
                if (! in_array($media->file_name, $request->input('documents', []))) {
                    $media->delete();
                }
            }
        }
        $media = $vehicleDocument->documents->pluck('file_name')->toArray();
        foreach ($request->input('documents', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $vehicleDocument->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
            }
        }

        return redirect()->route('admin.vehicle-documents.index');
    }

    public function show(VehicleDocument $vehicleDocument)
    {
        abort_if(Gate::denies('vehicle_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleDocument->load('car_item');

        return view('admin.vehicleDocuments.show', compact('vehicleDocument'));
    }

    public function destroy(VehicleDocument $vehicleDocument)
    {
        abort_if(Gate::denies('vehicle_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleDocument->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleDocumentRequest $request)
    {
        $vehicleDocuments = VehicleDocument::find(request('ids'));

        foreach ($vehicleDocuments as $vehicleDocument) {
            $vehicleDocument->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vehicle_document_create') && Gate::denies('vehicle_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new VehicleDocument();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}