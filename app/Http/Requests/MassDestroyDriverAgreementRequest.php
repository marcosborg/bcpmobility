<?php

namespace App\Http\Requests;

use App\Models\DriverAgreement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDriverAgreementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('driver_agreement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:driver_agreements,id',
        ];
    }
}
