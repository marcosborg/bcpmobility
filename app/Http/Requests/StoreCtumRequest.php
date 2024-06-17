<?php

namespace App\Http\Requests;

use App\Models\Ctum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCtumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ctum_create');
    }

    public function rules()
    {
        return [
            'lang_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'text' => [
                'string',
                'nullable',
            ],
            'button' => [
                'string',
                'nullable',
            ],
            'link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
