<?php

namespace App\Http\Requests;

use App\Models\Carmanagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCarmanagementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('carmanagement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:carmanagements,id',
        ];
    }
}
