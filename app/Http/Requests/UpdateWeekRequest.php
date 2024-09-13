<?php

namespace App\Http\Requests;

use App\Models\Week;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWeekRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('week_edit');
    }

    public function rules()
    {
        return [
            'from' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'to' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'month_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
