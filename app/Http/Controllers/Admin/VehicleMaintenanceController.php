<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVehicleMaintenanceRequest;
use App\Http\Requests\StoreVehicleMaintenanceRequest;
use App\Http\Requests\UpdateVehicleMaintenanceRequest;
use App\Models\CarItem;
use App\Models\VehicleMaintenance;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VehicleMaintenanceController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('vehicle_maintenance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = VehicleMaintenance::with(['car_item'])->select(sprintf('%s.*', (new VehicleMaintenance)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'vehicle_maintenance_show';
                $editGate      = 'vehicle_maintenance_edit';
                $deleteGate    = 'vehicle_maintenance_delete';
                $crudRoutePart = 'vehicle-maintenances';

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
            $table->addColumn('car_item_year', function ($row) {
                return $row->car_item ? $row->car_item->year : '';
            });

            $table->editColumn('car_item.license_plate', function ($row) {
                return $row->car_item ? (is_string($row->car_item) ? $row->car_item : $row->car_item->license_plate) : '';
            });
            $table->editColumn('reason', function ($row) {
                return $row->reason ? $row->reason : '';
            });

            $table->editColumn('observations', function ($row) {
                return $row->observations ? $row->observations : '';
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

        return view('admin.vehicleMaintenances.index', compact('car_items'));
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_maintenance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_items = CarItem::pluck('year', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vehicleMaintenances.create', compact('car_items'));
    }

    public function store(StoreVehicleMaintenanceRequest $request)
    {
        $vehicleMaintenance = VehicleMaintenance::create($request->all());

        foreach ($request->input('documents', []) as $file) {
            $vehicleMaintenance->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vehicleMaintenance->id]);
        }

        return redirect()->route('admin.vehicle-maintenances.index');
    }

    public function edit(VehicleMaintenance $vehicleMaintenance)
    {
        abort_if(Gate::denies('vehicle_maintenance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_items = CarItem::pluck('year', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicleMaintenance->load('car_item');

        return view('admin.vehicleMaintenances.edit', compact('car_items', 'vehicleMaintenance'));
    }

    public function update(UpdateVehicleMaintenanceRequest $request, VehicleMaintenance $vehicleMaintenance)
    {
        $vehicleMaintenance->update($request->all());

        if (count($vehicleMaintenance->documents) > 0) {
            foreach ($vehicleMaintenance->documents as $media) {
                if (! in_array($media->file_name, $request->input('documents', []))) {
                    $media->delete();
                }
            }
        }
        $media = $vehicleMaintenance->documents->pluck('file_name')->toArray();
        foreach ($request->input('documents', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $vehicleMaintenance->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
            }
        }

        return redirect()->route('admin.vehicle-maintenances.index');
    }

    public function show(VehicleMaintenance $vehicleMaintenance)
    {
        abort_if(Gate::denies('vehicle_maintenance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleMaintenance->load('car_item');

        return view('admin.vehicleMaintenances.show', compact('vehicleMaintenance'));
    }

    public function destroy(VehicleMaintenance $vehicleMaintenance)
    {
        abort_if(Gate::denies('vehicle_maintenance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleMaintenance->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleMaintenanceRequest $request)
    {
        $vehicleMaintenances = VehicleMaintenance::find(request('ids'));

        foreach ($vehicleMaintenances as $vehicleMaintenance) {
            $vehicleMaintenance->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vehicle_maintenance_create') && Gate::denies('vehicle_maintenance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new VehicleMaintenance();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
