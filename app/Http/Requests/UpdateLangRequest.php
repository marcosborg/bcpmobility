<?php

namespace App\Http\Requests;

use App\Models\Lang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLangRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lang_edit');
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
