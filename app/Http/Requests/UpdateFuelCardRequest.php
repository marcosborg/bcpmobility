<?php

namespace App\Http\Requests;

use App\Models\FuelCard;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFuelCardRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fuel_card_edit');
    }

    public function rules()
    {
        return [
            'card_number' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
