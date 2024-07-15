<?php

namespace App\Http\Requests;

use App\Models\Year;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateYearRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('year_edit');
    }

    public function rules()
    {
        return [
            'number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
