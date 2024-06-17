<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHeroRequest;
use App\Http\Requests\UpdateHeroRequest;
use App\Http\Resources\Admin\HeroResource;
use App\Models\Hero;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HeroApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('hero_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HeroResource(Hero::with(['lang'])->get());
    }

    public function store(StoreHeroRequest $request)
    {
        $hero = Hero::create($request->all());

        if ($request->input('image', false)) {
            $hero->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new HeroResource($hero))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Hero $hero)
    {
        abort_if(Gate::denies('hero_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HeroResource($hero->load(['lang']));
    }

    public function update(UpdateHeroRequest $request, Hero $hero)
    {
        $hero->update($request->all());

        if ($request->input('image', false)) {
            if (! $hero->image || $request->input('image') !== $hero->image->file_name) {
                if ($hero->image) {
                    $hero->image->delete();
                }
                $hero->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($hero->image) {
            $hero->image->delete();
        }

        return (new HeroResource($hero))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Hero $hero)
    {
        abort_if(Gate::denies('hero_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hero->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
