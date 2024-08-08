<?php

namespace App\Http\Requests;

use App\Models\DriverAgreement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDriverAgreementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('driver_agreement_edit');
    }

    public function rules()
    {
        return [
            'driver_id' => [
                'required',
                'integer',
            ],
            'car_item_id' => [
                'required',
                'integer',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'weekly_income_high' => [
                'required',
            ],
            'weekly_income_low' => [
                'required',
            ],
            'additional_km_value_high' => [
                'required',
            ],
            'additional_km_value_low' => [
                'required',
            ],
        ];
    }
}
