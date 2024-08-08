@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.driverAgreement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.driver-agreements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.driverAgreement.fields.id') }}
                        </th>
                        <td>
                            {{ $driverAgreement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driverAgreement.fields.driver') }}
                        </th>
                        <td>
                            {{ $driverAgreement->driver->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driverAgreement.fields.car_item') }}
                        </th>
                        <td>
                            {{ $driverAgreement->car_item->license_plate ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driverAgreement.fields.start_date') }}
                        </th>
                        <td>
                            {{ $driverAgreement->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driverAgreement.fields.end_date') }}
                        </th>
                        <td>
                            {{ $driverAgreement->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driverAgreement.fields.weekly_income_high') }}
                        </th>
                        <td>
                            {{ $driverAgreement->weekly_income_high }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driverAgreement.fields.weekly_income_low') }}
                        </th>
                        <td>
                            {{ $driverAgreement->weekly_income_low }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driverAgreement.fields.additional_km_value_high') }}
                        </th>
                        <td>
                            {{ $driverAgreement->additional_km_value_high }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driverAgreement.fields.additional_km_value_low') }}
                        </th>
                        <td>
                            {{ $driverAgreement->additional_km_value_low }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.driver-agreements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection