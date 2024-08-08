<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDriverAgreementRequest;
use App\Http\Requests\StoreDriverAgreementRequest;
use App\Http\Requests\UpdateDriverAgreementRequest;
use App\Models\CarItem;
use App\Models\Driver;
use App\Models\DriverAgreement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DriverAgreementController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('driver_agreement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DriverAgreement::with(['driver', 'car_item'])->select(sprintf('%s.*', (new DriverAgreement)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'driver_agreement_show';
                $editGate      = 'driver_agreement_edit';
                $deleteGate    = 'driver_agreement_delete';
                $crudRoutePart = 'driver-agreements';

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

            $table->editColumn('weekly_income_high', function ($row) {
                return $row->weekly_income_high ? $row->weekly_income_high : '';
            });
            $table->editColumn('weekly_income_low', function ($row) {
                return $row->weekly_income_low ? $row->weekly_income_low : '';
            });
            $table->editColumn('additional_km_value_high', function ($row) {
                return $row->additional_km_value_high ? $row->additional_km_value_high : '';
            });
            $table->editColumn('additional_km_value_low', function ($row) {
                return $row->additional_km_value_low ? $row->additional_km_value_low : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'driver', 'car_item']);

            return $table->make(true);
        }

        $drivers   = Driver::get();
        $car_items = CarItem::get();

        return view('admin.driverAgreements.index', compact('drivers', 'car_items'));
    }

    public function create()
    {
        abort_if(Gate::denies('driver_agreement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $car_items = CarItem::pluck('license_plate', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.driverAgreements.create', compact('car_items', 'drivers'));
    }

    public function store(StoreDriverAgreementRequest $request)
    {
        $driverAgreement = DriverAgreement::create($request->all());

        return redirect()->route('admin.driver-agreements.index');
    }

    public function edit(DriverAgreement $driverAgreement)
    {
        abort_if(Gate::denies('driver_agreement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $car_items = CarItem::pluck('license_plate', 'id')->prepend(trans('global.pleaseSelect'), '');

        $driverAgreement->load('driver', 'car_item');

        return view('admin.driverAgreements.edit', compact('car_items', 'driverAgreement', 'drivers'));
    }

    public function update(UpdateDriverAgreementRequest $request, DriverAgreement $driverAgreement)
    {
        $driverAgreement->update($request->all());

        return redirect()->route('admin.driver-agreements.index');
    }

    public function show(DriverAgreement $driverAgreement)
    {
        abort_if(Gate::denies('driver_agreement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driverAgreement->load('driver', 'car_item');

        return view('admin.driverAgreements.show', compact('driverAgreement'));
    }

    public function destroy(DriverAgreement $driverAgreement)
    {
        abort_if(Gate::denies('driver_agreement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driverAgreement->delete();

        return back();
    }

    public function massDestroy(MassDestroyDriverAgreementRequest $request)
    {
        $driverAgreements = DriverAgreement::find(request('ids'));

        foreach ($driverAgreements as $driverAgreement) {
            $driverAgreement->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
