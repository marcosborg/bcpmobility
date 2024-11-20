<?php

namespace App\Http\Requests;

use App\Models\Receipt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReceiptRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('receipt_create');
    }

    public function rules()
    {
        return [
            'value' => [
                'required',
            ],
            'file' => [
                'required',
            ],
            'company' => [
                'required',
            ],
            'iva' => [
                'required',
            ],
            'retention' => [
                'required',
            ],
        ];
    }
}
