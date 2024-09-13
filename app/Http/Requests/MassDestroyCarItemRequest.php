<?php

namespace App\Http\Requests;

use App\Models\CarItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCarItemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('car_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:car_items,id',
        ];
    }
}
