<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Http\Resources\Admin\OptionResource;
use App\Models\Option;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OptionApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OptionResource(Option::with(['lang'])->get());
    }

    public function store(StoreOptionRequest $request)
    {
        $option = Option::create($request->all());

        if ($request->input('image', false)) {
            $option->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new OptionResource($option))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Option $option)
    {
        abort_if(Gate::denies('option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OptionResource($option->load(['lang']));
    }

    public function update(UpdateOptionRequest $request, Option $option)
    {
        $option->update($request->all());

        if ($request->input('image', false)) {
            if (! $option->image || $request->input('image') !== $option->image->file_name) {
                if ($option->image) {
                    $option->image->delete();
                }
                $option->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($option->image) {
            $option->image->delete();
        }

        return (new OptionResource($option))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Option $option)
    {
        abort_if(Gate::denies('option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $option->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
