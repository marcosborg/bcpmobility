<?php

namespace App\Http\Requests;

use App\Models\Service;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_create');
    }

    public function rules()
    {
        return [
            'lang_id' => [
                'required',
                'integer',
            ],
            'icon' => [
                'string',
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'text' => [
                'string',
                'required',
            ],
        ];
    }
}
