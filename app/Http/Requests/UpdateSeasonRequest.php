<?php

namespace App\Http\Requests;

use App\Models\Season;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSeasonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('season_edit');
    }

    public function rules()
    {
        return [
            'season' => [
                'required',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
