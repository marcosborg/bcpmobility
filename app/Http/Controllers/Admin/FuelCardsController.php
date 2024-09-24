<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFuelCardRequest;
use App\Http\Requests\StoreFuelCardRequest;
use App\Http\Requests\UpdateFuelCardRequest;
use App\Models\FuelCard;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FuelCardsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('fuel_card_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = FuelCard::query()->select(sprintf('%s.*', (new FuelCard)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'fuel_card_show';
                $editGate      = 'fuel_card_edit';
                $deleteGate    = 'fuel_card_delete';
                $crudRoutePart = 'fuel-cards';

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
            $table->editColumn('card_number', function ($row) {
                return $row->card_number ? $row->card_number : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.fuelCards.index');
    }

    public function create()
    {
        abort_if(Gate::denies('fuel_card_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fuelCards.create');
    }

    public function store(StoreFuelCardRequest $request)
    {
        $fuelCard = FuelCard::create($request->all());

        return redirect()->route('admin.fuel-cards.index');
    }

    public function edit(FuelCard $fuelCard)
    {
        abort_if(Gate::denies('fuel_card_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fuelCards.edit', compact('fuelCard'));
    }

    public function update(UpdateFuelCardRequest $request, FuelCard $fuelCard)
    {
        $fuelCard->update($request->all());

        return redirect()->route('admin.fuel-cards.index');
    }

    public function show(FuelCard $fuelCard)
    {
        abort_if(Gate::denies('fuel_card_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fuelCards.show', compact('fuelCard'));
    }

    public function destroy(FuelCard $fuelCard)
    {
        abort_if(Gate::denies('fuel_card_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fuelCard->delete();

        return back();
    }

    public function massDestroy(MassDestroyFuelCardRequest $request)
    {
        $fuelCards = FuelCard::find(request('ids'));

        foreach ($fuelCards as $fuelCard) {
            $fuelCard->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
