<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCtumRequest;
use App\Http\Requests\UpdateCtumRequest;
use App\Http\Resources\Admin\CtumResource;
use App\Models\Ctum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CtaApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ctum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CtumResource(Ctum::with(['lang'])->get());
    }

    public function store(StoreCtumRequest $request)
    {
        $ctum = Ctum::create($request->all());

        if ($request->input('image', false)) {
            $ctum->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new CtumResource($ctum))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Ctum $ctum)
    {
        abort_if(Gate::denies('ctum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CtumResource($ctum->load(['lang']));
    }

    public function update(UpdateCtumRequest $request, Ctum $ctum)
    {
        $ctum->update($request->all());

        if ($request->input('image', false)) {
            if (! $ctum->image || $request->input('image') !== $ctum->image->file_name) {
                if ($ctum->image) {
                    $ctum->image->delete();
                }
                $ctum->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($ctum->image) {
            $ctum->image->delete();
        }

        return (new CtumResource($ctum))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Ctum $ctum)
    {
        abort_if(Gate::denies('ctum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ctum->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
