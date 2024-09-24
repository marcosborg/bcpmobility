<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyActivityRequest;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\Week;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('activity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Activity::with(['week'])->select(sprintf('%s.*', (new Activity)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'activity_show';
                $editGate      = 'activity_edit';
                $deleteGate    = 'activity_delete';
                $crudRoutePart = 'activities';

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
            $table->editColumn('operator_code', function ($row) {
                return $row->operator_code ? $row->operator_code : '';
            });
            $table->addColumn('week_from', function ($row) {
                return $row->week ? $row->week->from : '';
            });

            $table->editColumn('net', function ($row) {
                return $row->net ? $row->net : '';
            });
            $table->editColumn('gross', function ($row) {
                return $row->gross ? $row->gross : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'week']);

            return $table->make(true);
        }

        $weeks = Week::get();

        return view('admin.activities.index', compact('weeks'));
    }

    public function create()
    {
        abort_if(Gate::denies('activity_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $weeks = Week::pluck('from', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.activities.create', compact('weeks'));
    }

    public function store(StoreActivityRequest $request)
    {
        $activity = Activity::create($request->all());

        return redirect()->route('admin.activities.index');
    }

    public function edit(Activity $activity)
    {
        abort_if(Gate::denies('activity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $weeks = Week::pluck('from', 'id')->prepend(trans('global.pleaseSelect'), '');

        $activity->load('week');

        return view('admin.activities.edit', compact('activity', 'weeks'));
    }

    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $activity->update($request->all());

        return redirect()->route('admin.activities.index');
    }

    public function show(Activity $activity)
    {
        abort_if(Gate::denies('activity_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activity->load('week');

        return view('admin.activities.show', compact('activity'));
    }

    public function destroy(Activity $activity)
    {
        abort_if(Gate::denies('activity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activity->delete();

        return back();
    }

    public function massDestroy(MassDestroyActivityRequest $request)
    {
        $activities = Activity::find(request('ids'));

        foreach ($activities as $activity) {
            $activity->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
