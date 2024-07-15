<?php

namespace App\Http\Requests;

use App\Models\Carmanagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarmanagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carmanagement_create');
    }

    public function rules()
    {
        return [
            'car_item_id' => [
                'required',
                'integer',
            ],
            'driver_id' => [
                'required',
                'integer',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
