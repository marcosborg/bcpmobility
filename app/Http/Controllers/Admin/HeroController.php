<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHeroRequest;
use App\Http\Requests\StoreHeroRequest;
use App\Http\Requests\UpdateHeroRequest;
use App\Models\Hero;
use App\Models\Lang;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HeroController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('hero_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Hero::with(['lang'])->select(sprintf('%s.*', (new Hero)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'hero_show';
                $editGate      = 'hero_edit';
                $deleteGate    = 'hero_delete';
                $crudRoutePart = 'heroes';

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
            $table->addColumn('lang_name', function ($row) {
                return $row->lang ? $row->lang->name : '';
            });

            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('text', function ($row) {
                return $row->text ? $row->text : '';
            });
            $table->editColumn('button', function ($row) {
                return $row->button ? $row->button : '';
            });
            $table->editColumn('link', function ($row) {
                return $row->link ? $row->link : '';
            });
            $table->editColumn('button_2', function ($row) {
                return $row->button_2 ? $row->button_2 : '';
            });
            $table->editColumn('link_2', function ($row) {
                return $row->link_2 ? $row->link_2 : '';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'lang', 'image']);

            return $table->make(true);
        }

        $langs = Lang::get();

        return view('admin.heroes.index', compact('langs'));
    }

    public function create()
    {
        abort_if(Gate::denies('hero_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.heroes.create', compact('langs'));
    }

    public function store(StoreHeroRequest $request)
    {
        $hero = Hero::create($request->all());

        if ($request->input('image', false)) {
            $hero->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $hero->id]);
        }

        return redirect()->route('admin.heroes.index');
    }

    public function edit(Hero $hero)
    {
        abort_if(Gate::denies('hero_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hero->load('lang');

        return view('admin.heroes.edit', compact('hero', 'langs'));
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

        return redirect()->route('admin.heroes.index');
    }

    public function show(Hero $hero)
    {
        abort_if(Gate::denies('hero_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hero->load('lang');

        return view('admin.heroes.show', compact('hero'));
    }

    public function destroy(Hero $hero)
    {
        abort_if(Gate::denies('hero_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hero->delete();

        return back();
    }

    public function massDestroy(MassDestroyHeroRequest $request)
    {
        $heroes = Hero::find(request('ids'));

        foreach ($heroes as $hero) {
            $hero->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('hero_create') && Gate::denies('hero_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Hero();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}