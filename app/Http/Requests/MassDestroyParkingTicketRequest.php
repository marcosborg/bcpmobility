<?php

namespace App\Http\Requests;

use App\Models\ParkingTicket;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyParkingTicketRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('parking_ticket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:parking_tickets,id',
        ];
    }
}
