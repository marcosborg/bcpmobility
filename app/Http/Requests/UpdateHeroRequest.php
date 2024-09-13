<?php

namespace App\Http\Requests;

use App\Models\Hero;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHeroRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hero_edit');
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
                'required',
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
            'button_2' => [
                'string',
                'nullable',
            ],
            'link_2' => [
                'string',
                'nullable',
            ],
        ];
    }
}
