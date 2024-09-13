<?php

namespace App\Http\Requests;

use App\Models\ParkingTicket;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreParkingTicketRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('parking_ticket_create');
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
            'value' => [
                'required',
            ],
            'date_time' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
