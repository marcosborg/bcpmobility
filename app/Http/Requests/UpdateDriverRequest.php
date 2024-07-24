<?php

namespace App\Http\Requests;

use App\Models\Driver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDriverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('driver_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'uber_uuid' => [
                'string',
                'nullable',
            ],
            'bolt_name' => [
                'string',
                'nullable',
            ],
            'driver_license' => [
                'string',
                'nullable',
            ],
            'citizen_card' => [
                'string',
                'nullable',
            ],
            'driver_vat' => [
                'string',
                'nullable',
            ],
            'payment_vat' => [
                'string',
                'nullable',
            ],
            'iban' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'zip' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'reason' => [
                'string',
                'nullable',
            ],
            'documents' => [
                'array',
            ],
            'driver_service_vat' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'driver_withholding_tax' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
