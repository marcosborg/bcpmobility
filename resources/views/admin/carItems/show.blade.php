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
                            {{ trans('cruds.carItem.fields.docucments') }}
                        </th>
                        <td>
                            @foreach($carItem->docucments as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
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