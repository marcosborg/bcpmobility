<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCarmanagementRequest;
use App\Http\Requests\StoreCarmanagementRequest;
use App\Http\Requests\UpdateCarmanagementRequest;
use App\Models\CarItem;
use App\Models\Carmanagement;
use App\Models\Driver;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarmanagementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('carmanagement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carmanagements = Carmanagement::with(['car_item', 'driver'])->get();

        return view('admin.carmanagements.index', compact('carmanagements'));
    }

    public function create()
    {
        abort_if(Gate::denies('carmanagement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_items = CarItem::pluck('license_plate', 'id')->prepend(trans('global.pleaseSelect'), '');

        $drivers = Driver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.carmanagements.create', compact('car_items', 'drivers'));
    }

    public function store(StoreCarmanagementRequest $request)
    {
        $carmanagement = Carmanagement::create($request->all());

        return redirect()->route('admin.carmanagements.index');
    }

    public function edit(Carmanagement $carmanagement)
    {
        abort_if(Gate::denies('carmanagement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_items = CarItem::pluck('license_plate', 'id')->prepend(trans('global.pleaseSelect'), '');

        $drivers = Driver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carmanagement->load('car_item', 'driver');

        return view('admin.carmanagements.edit', compact('car_items', 'carmanagement', 'drivers'));
    }

    public function update(UpdateCarmanagementRequest $request, Carmanagement $carmanagement)
    {
        $carmanagement->update($request->all());

        return redirect()->route('admin.carmanagements.index');
    }

    public function show(Carmanagement $carmanagement)
    {
        abort_if(Gate::denies('carmanagement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carmanagement->load('car_item', 'driver');

        return view('admin.carmanagements.show', compact('carmanagement'));
    }

    public function destroy(Carmanagement $carmanagement)
    {
        abort_if(Gate::denies('carmanagement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carmanagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarmanagementRequest $request)
    {
        $carmanagements = Carmanagement::find(request('ids'));

        foreach ($carmanagements as $carmanagement) {
            $carmanagement->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
