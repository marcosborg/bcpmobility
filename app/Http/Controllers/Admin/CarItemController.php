<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCarItemRequest;
use App\Http\Requests\StoreCarItemRequest;
use App\Http\Requests\UpdateCarItemRequest;
use App\Models\CarBrand;
use App\Models\CarItem;
use App\Models\CarModel;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CarItemController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('car_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carItems = CarItem::with(['car_brand', 'car_model', 'media'])->get();

        return view('admin.carItems.index', compact('carItems'));
    }

    public function create()
    {
        abort_if(Gate::denies('car_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_brands = CarBrand::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $car_models = CarModel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.carItems.create', compact('car_brands', 'car_models'));
    }

    public function store(StoreCarItemRequest $request)
    {
        $carItem = CarItem::create($request->all());

        foreach ($request->input('documents', []) as $file) {
            $carItem->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $carItem->id]);
        }

        return redirect()->route('admin.car-items.index');
    }

    public function edit(CarItem $carItem)
    {
        abort_if(Gate::denies('car_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_brands = CarBrand::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $car_models = CarModel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carItem->load('car_brand', 'car_model');

        return view('admin.carItems.edit', compact('carItem', 'car_brands', 'car_models'));
    }

    public function update(UpdateCarItemRequest $request, CarItem $carItem)
    {
        $carItem->update($request->all());

        if (count($carItem->documents) > 0) {
            foreach ($carItem->documents as $media) {
                if (! in_array($media->file_name, $request->input('documents', []))) {
                    $media->delete();
                }
            }
        }
        $media = $carItem->documents->pluck('file_name')->toArray();
        foreach ($request->input('documents', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $carItem->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
            }
        }

        return redirect()->route('admin.car-items.index');
    }

    public function show(CarItem $carItem)
    {
        abort_if(Gate::denies('car_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carItem->load('car_brand', 'car_model');

        return view('admin.carItems.show', compact('carItem'));
    }

    public function destroy(CarItem $carItem)
    {
        abort_if(Gate::denies('car_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarItemRequest $request)
    {
        $carItems = CarItem::find(request('ids'));

        foreach ($carItems as $carItem) {
            $carItem->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('car_item_create') && Gate::denies('car_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CarItem();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
