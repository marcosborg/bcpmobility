@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.carItem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.car-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.carItem.fields.id') }}
                        </th>
                        <td>
                            {{ $carItem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carItem.fields.car_brand') }}
                        </th>
                        <td>
                            {{ $carItem->car_brand->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carItem.fields.car_model') }}
                        </th>
                        <td>
                            {{ $carItem->car_model->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carItem.fields.year') }}
                        </th>
                        <td>
                            {{ $carItem->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carItem.fields.license_plate') }}
                        </th>
                        <td>
                            {{ $carItem->license_plate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carItem.fields.motorization') }}
                        </th>
                        <td>
                            {{ $carItem->motorization }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carItem.fields.chassis_number') }}
                        </th>
                        <td>
                            {{ $carItem->chassis_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carItem.fields.internal_name') }}
                        </th>
                        <td>
                            {{ $carItem->internal_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carItem.fields.documents') }}
                        </th>
                        <td>
                            @foreach($carItem->documents as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carItem.fields.cost_per_km') }}
                        </th>
                        <td>
                            {{ $carItem->cost_per_km }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carItem.fields.monthly_income') }}
                        </th>
                        <td>
                            {{ $carItem->monthly_income }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.car-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection