<?php

namespace App\Http\Requests;

use App\Models\Activity;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreActivityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('activity_create');
    }

    public function rules()
    {
        return [
            'operator_code' => [
                'string',
                'required',
            ],
            'week_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
