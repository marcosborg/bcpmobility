<?php

namespace App\Http\Requests;

use App\Models\FuelCard;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFuelCardRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fuel_card_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:fuel_cards,id',
        ];
    }
}
