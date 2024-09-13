<?php

namespace App\Http\Requests;

use App\Models\CarItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_item_create');
    }

    public function rules()
    {
        return [
            'car_brand_id' => [
                'required',
                'integer',
            ],
            'car_model_id' => [
                'required',
                'integer',
            ],
            'year' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'license_plate' => [
                'string',
                'required',
            ],
            'motorization' => [
                'string',
                'nullable',
            ],
            'chassis_number' => [
                'string',
                'nullable',
            ],
            'internal_name' => [
                'string',
                'nullable',
            ],
            'documents' => [
                'array',
            ],
        ];
    }
}
