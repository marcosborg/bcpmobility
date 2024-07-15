<?php

namespace App\Http\Requests;

use App\Models\CarBrand;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarBrandRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_brand_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
