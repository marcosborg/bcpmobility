<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDamageRequest;
use App\Http\Requests\StoreDamageRequest;
use App\Http\Requests\UpdateDamageRequest;
use App\Models\CarItem;
use App\Models\Damage;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DamageController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('damage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Damage::with(['positioning_map'])->select(sprintf('%s.*', (new Damage)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'damage_show';
                $editGate      = 'damage_edit';
                $deleteGate    = 'damage_delete';
                $crudRoutePart = 'damages';

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

            $table->editColumn('photos', function ($row) {
                if (! $row->photos) {
                    return '';
                }
                $links = [];
                foreach ($row->photos as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('cost', function ($row) {
                return $row->cost ? $row->cost : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'photos']);

            return $table->make(true);
        }

        $car_items = CarItem::get();

        return view('admin.damages.index', compact('car_items'));
    }

    public function create()
    {
        abort_if(Gate::denies('damage_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $positioning_maps = CarItem::pluck('license_plate', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.damages.create', compact('positioning_maps'));
    }

    public function store(StoreDamageRequest $request)
    {
        $damage = Damage::create($request->all());

        foreach ($request->input('photos', []) as $file) {
            $damage->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $damage->id]);
        }

        return redirect()->route('admin.damages.index');
    }

    public function edit(Damage $damage)
    {
        abort_if(Gate::denies('damage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $positioning_maps = CarItem::pluck('license_plate', 'id')->prepend(trans('global.pleaseSelect'), '');

        $damage->load('positioning_map');

        return view('admin.damages.edit', compact('damage', 'positioning_maps'));
    }

    public function update(UpdateDamageRequest $request, Damage $damage)
    {
        $damage->update($request->all());

        if (count($damage->photos) > 0) {
            foreach ($damage->photos as $media) {
                if (! in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $damage->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $damage->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.damages.index');
    }

    public function show(Damage $damage)
    {
        abort_if(Gate::denies('damage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $damage->load('positioning_map');

        return view('admin.damages.show', compact('damage'));
    }

    public function destroy(Damage $damage)
    {
        abort_if(Gate::denies('damage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $damage->delete();

        return back();
    }

    public function massDestroy(MassDestroyDamageRequest $request)
    {
        $damages = Damage::find(request('ids'));

        foreach ($damages as $damage) {
            $damage->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('damage_create') && Gate::denies('damage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Damage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
