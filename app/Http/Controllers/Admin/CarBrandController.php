<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCarBrandRequest;
use App\Http\Requests\StoreCarBrandRequest;
use App\Http\Requests\UpdateCarBrandRequest;
use App\Models\CarBrand;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarBrandController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('car_brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carBrands = CarBrand::all();

        return view('admin.carBrands.index', compact('carBrands'));
    }

    public function create()
    {
        abort_if(Gate::denies('car_brand_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carBrands.create');
    }

    public function store(StoreCarBrandRequest $request)
    {
        $carBrand = CarBrand::create($request->all());

        return redirect()->route('admin.car-brands.index');
    }

    public function edit(CarBrand $carBrand)
    {
        abort_if(Gate::denies('car_brand_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carBrands.edit', compact('carBrand'));
    }

    public function update(UpdateCarBrandRequest $request, CarBrand $carBrand)
    {
        $carBrand->update($request->all());

        return redirect()->route('admin.car-brands.index');
    }

    public function show(CarBrand $carBrand)
    {
        abort_if(Gate::denies('car_brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carBrands.show', compact('carBrand'));
    }

    public function destroy(CarBrand $carBrand)
    {
        abort_if(Gate::denies('car_brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carBrand->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarBrandRequest $request)
    {
        $carBrands = CarBrand::find(request('ids'));

        foreach ($carBrands as $carBrand) {
            $carBrand->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
