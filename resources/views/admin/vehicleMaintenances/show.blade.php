@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vehicleMaintenance.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicle-maintenances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMaintenance.fields.id') }}
                        </th>
                        <td>
                            {{ $vehicleMaintenance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMaintenance.fields.car_item') }}
                        </th>
                        <td>
                            {{ $vehicleMaintenance->car_item->year ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMaintenance.fields.reason') }}
                        </th>
                        <td>
                            {{ $vehicleMaintenance->reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMaintenance.fields.date_time_start') }}
                        </th>
                        <td>
                            {{ $vehicleMaintenance->date_time_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMaintenance.fields.date_time_end') }}
                        </th>
                        <td>
                            {{ $vehicleMaintenance->date_time_end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMaintenance.fields.observations') }}
                        </th>
                        <td>
                            {{ $vehicleMaintenance->observations }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMaintenance.fields.documents') }}
                        </th>
                        <td>
                            @foreach($vehicleMaintenance->documents as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicle-maintenances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection