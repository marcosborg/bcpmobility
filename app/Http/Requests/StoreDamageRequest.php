<?php

namespace App\Http\Requests;

use App\Models\Damage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDamageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('damage_create');
    }

    public function rules()
    {
        return [
            'photos' => [
                'array',
            ],
        ];
    }
}
