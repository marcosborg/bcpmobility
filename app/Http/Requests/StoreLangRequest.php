<?php

namespace App\Http\Requests;

use App\Models\Lang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLangRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lang_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'code' => [
                'string',
                'required',
            ],
        ];
    }
}
