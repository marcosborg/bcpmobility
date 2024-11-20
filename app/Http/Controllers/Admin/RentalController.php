<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRentalRequest;
use App\Http\Requests\StoreRentalRequest;
use App\Http\Requests\UpdateRentalRequest;
use App\Models\Driver;
use App\Models\Rental;
use App\Models\Week;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('rental_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Rental::with(['driver', 'week'])->select(sprintf('%s.*', (new Rental)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'rental_show';
                $editGate      = 'rental_edit';
                $deleteGate    = 'rental_delete';
                $crudRoutePart = 'rentals';

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
            $table->editColumn('weekly_rental', function ($row) {
                return $row->weekly_rental ? $row->weekly_rental : '';
            });
            $table->editColumn('extra_km', function ($row) {
                return $row->extra_km ? $row->extra_km : '';
            });
            $table->addColumn('driver_name', function ($row) {
                return $row->driver ? $row->driver->name : '';
            });

            $table->addColumn('week_from', function ($row) {
                return $row->week ? $row->week->from : '';
            });

            $table->editColumn('rental_type', function ($row) {
                return $row->rental_type ? Rental::RENTAL_TYPE_RADIO[$row->rental_type] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'driver', 'week']);

            return $table->make(true);
        }

        $drivers = Driver::get();
        $weeks   = Week::get();

        return view('admin.rentals.index', compact('drivers', 'weeks'));
    }

    public function create()
    {
        abort_if(Gate::denies('rental_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $weeks = Week::pluck('from', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rentals.create', compact('drivers', 'weeks'));
    }

    public function store(StoreRentalRequest $request)
    {
        $rental = Rental::create($request->all());

        return redirect()->route('admin.rentals.index');
    }

    public function edit(Rental $rental)
    {
        abort_if(Gate::denies('rental_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $weeks = Week::pluck('from', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rental->load('driver', 'week');

        return view('admin.rentals.edit', compact('drivers', 'rental', 'weeks'));
    }

    public function update(UpdateRentalRequest $request, Rental $rental)
    {
        $rental->update($request->all());

        return redirect()->route('admin.rentals.index');
    }

    public function show(Rental $rental)
    {
        abort_if(Gate::denies('rental_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rental->load('driver', 'week');

        return view('admin.rentals.show', compact('rental'));
    }

    public function destroy(Rental $rental)
    {
        abort_if(Gate::denies('rental_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rental->delete();

        return back();
    }

    public function massDestroy(MassDestroyRentalRequest $request)
    {
        $rentals = Rental::find(request('ids'));

        foreach ($rentals as $rental) {
            $rental->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
