<?php

namespace App\Http\Requests;

use App\Models\VehicleMaintenance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVehicleMaintenanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_maintenance_edit');
    }

    public function rules()
    {
        return [
            'car_item_id' => [
                'required',
                'integer',
            ],
            'reason' => [
                'string',
                'required',
            ],
            'date_time_start' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'date_time_end' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'documents' => [
                'array',
            ],
        ];
    }
}
