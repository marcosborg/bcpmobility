<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLangRequest;
use App\Http\Requests\StoreLangRequest;
use App\Http\Requests\UpdateLangRequest;
use App\Models\Lang;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LangController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $langs = Lang::all();

        return view('admin.langs.index', compact('langs'));
    }

    public function create()
    {
        abort_if(Gate::denies('lang_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.langs.create');
    }

    public function store(StoreLangRequest $request)
    {
        $lang = Lang::create($request->all());

        return redirect()->route('admin.langs.index');
    }

    public function edit(Lang $lang)
    {
        abort_if(Gate::denies('lang_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.langs.edit', compact('lang'));
    }

    public function update(UpdateLangRequest $request, Lang $lang)
    {
        $lang->update($request->all());

        return redirect()->route('admin.langs.index');
    }

    public function show(Lang $lang)
    {
        abort_if(Gate::denies('lang_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.langs.show', compact('lang'));
    }

    public function destroy(Lang $lang)
    {
        abort_if(Gate::denies('lang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lang->delete();

        return back();
    }

    public function massDestroy(MassDestroyLangRequest $request)
    {
        $langs = Lang::find(request('ids'));

        foreach ($langs as $lang) {
            $lang->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
