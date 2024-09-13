@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vehicleDocument.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicle-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleDocument.fields.id') }}
                        </th>
                        <td>
                            {{ $vehicleDocument->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleDocument.fields.car_item') }}
                        </th>
                        <td>
                            {{ $vehicleDocument->car_item->license_plate ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleDocument.fields.documents') }}
                        </th>
                        <td>
                            @foreach($vehicleDocument->documents as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleDocument.fields.carta_verde') }}
                        </th>
                        <td>
                            {{ $vehicleDocument->carta_verde }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleDocument.fields.condicoes_particulares') }}
                        </th>
                        <td>
                            {{ $vehicleDocument->condicoes_particulares }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleDocument.fields.dua') }}
                        </th>
                        <td>
                            {{ $vehicleDocument->dua }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleDocument.fields.dav') }}
                        </th>
                        <td>
                            {{ $vehicleDocument->dav }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleDocument.fields.tvde_license') }}
                        </th>
                        <td>
                            {{ $vehicleDocument->tvde_license }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleDocument.fields.inspecao_tecnica_periodica') }}
                        </th>
                        <td>
                            {{ $vehicleDocument->inspecao_tecnica_periodica }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicle-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection