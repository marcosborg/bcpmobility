<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCtumRequest;
use App\Http\Requests\StoreCtumRequest;
use App\Http\Requests\UpdateCtumRequest;
use App\Models\Ctum;
use App\Models\Lang;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CtaController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('ctum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Ctum::with(['lang'])->select(sprintf('%s.*', (new Ctum)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'ctum_show';
                $editGate      = 'ctum_edit';
                $deleteGate    = 'ctum_delete';
                $crudRoutePart = 'cta';

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

        return view('admin.cta.index', compact('langs'));
    }

    public function create()
    {
        abort_if(Gate::denies('ctum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cta.create', compact('langs'));
    }

    public function store(StoreCtumRequest $request)
    {
        $ctum = Ctum::create($request->all());

        if ($request->input('image', false)) {
            $ctum->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ctum->id]);
        }

        return redirect()->route('admin.cta.index');
    }

    public function edit(Ctum $ctum)
    {
        abort_if(Gate::denies('ctum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ctum->load('lang');

        return view('admin.cta.edit', compact('ctum', 'langs'));
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

        return redirect()->route('admin.cta.index');
    }

    public function show(Ctum $ctum)
    {
        abort_if(Gate::denies('ctum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ctum->load('lang');

        return view('admin.cta.show', compact('ctum'));
    }

    public function destroy(Ctum $ctum)
    {
        abort_if(Gate::denies('ctum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ctum->delete();

        return back();
    }

    public function massDestroy(MassDestroyCtumRequest $request)
    {
        $cta = Ctum::find(request('ids'));

        foreach ($cta as $ctum) {
            $ctum->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('ctum_create') && Gate::denies('ctum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Ctum();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
