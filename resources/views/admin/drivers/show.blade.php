@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.driver.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.drivers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.id') }}
                        </th>
                        <td>
                            {{ $driver->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.user') }}
                        </th>
                        <td>
                            {{ $driver->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.name') }}
                        </th>
                        <td>
                            {{ $driver->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.phone') }}
                        </th>
                        <td>
                            {{ $driver->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.uber_uuid') }}
                        </th>
                        <td>
                            {{ $driver->uber_uuid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.bolt_name') }}
                        </th>
                        <td>
                            {{ $driver->bolt_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.driver_license') }}
                        </th>
                        <td>
                            {{ $driver->driver_license }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.citizen_card') }}
                        </th>
                        <td>
                            {{ $driver->citizen_card }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.driver_vat') }}
                        </th>
                        <td>
                            {{ $driver->driver_vat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.payment_vat') }}
                        </th>
                        <td>
                            {{ $driver->payment_vat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.iban') }}
                        </th>
                        <td>
                            {{ $driver->iban }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.address') }}
                        </th>
                        <td>
                            {{ $driver->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.zip') }}
                        </th>
                        <td>
                            {{ $driver->zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.city') }}
                        </th>
                        <td>
                            {{ $driver->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.start_date') }}
                        </th>
                        <td>
                            {{ $driver->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.end_date') }}
                        </th>
                        <td>
                            {{ $driver->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.reason') }}
                        </th>
                        <td>
                            {{ $driver->reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.notes') }}
                        </th>
                        <td>
                            {{ $driver->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.documents') }}
                        </th>
                        <td>
                            @foreach($driver->documents as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.weekly_rent_value_low_season') }}
                        </th>
                        <td>
                            {{ $driver->weekly_rent_value_low_season }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.extra_km_value_low_season') }}
                        </th>
                        <td>
                            {{ $driver->extra_km_value_low_season }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.weekly_rent_value_high_season') }}
                        </th>
                        <td>
                            {{ $driver->weekly_rent_value_high_season }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.extra_km_value_high_season') }}
                        </th>
                        <td>
                            {{ $driver->extra_km_value_high_season }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.agreed_deposit') }}
                        </th>
                        <td>
                            {{ $driver->agreed_deposit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.driver_service_vat') }}
                        </th>
                        <td>
                            {{ $driver->driver_service_vat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.driver_withholding_tax') }}
                        </th>
                        <td>
                            {{ $driver->driver_withholding_tax }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.drivers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection