@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.parkingTicket.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.parking-tickets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.parkingTicket.fields.id') }}
                        </th>
                        <td>
                            {{ $parkingTicket->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.parkingTicket.fields.driver') }}
                        </th>
                        <td>
                            {{ $parkingTicket->driver->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.parkingTicket.fields.car_item') }}
                        </th>
                        <td>
                            {{ $parkingTicket->car_item->license_plate ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.parkingTicket.fields.document') }}
                        </th>
                        <td>
                            @if($parkingTicket->document)
                                <a href="{{ $parkingTicket->document->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.parkingTicket.fields.value') }}
                        </th>
                        <td>
                            {{ $parkingTicket->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.parkingTicket.fields.date_time') }}
                        </th>
                        <td>
                            {{ $parkingTicket->date_time }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.parking-tickets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection