<?php

namespace App\Http\Requests;

use App\Models\VehicleDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVehicleDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_document_create');
    }

    public function rules()
    {
        return [
            'car_item_id' => [
                'required',
                'integer',
            ],
            'documents' => [
                'array',
            ],
            'carta_verde' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'condicoes_particulares' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'dua' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'dav' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'tvde_license' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'inspecao_tecnica_periodica' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}