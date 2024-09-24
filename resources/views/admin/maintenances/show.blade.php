@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.maintenance.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.maintenances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.id') }}
                        </th>
                        <td>
                            {{ $maintenance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.photos') }}
                        </th>
                        <td>
                            @foreach($maintenance->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.description') }}
                        </th>
                        <td>
                            {{ $maintenance->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.cost') }}
                        </th>
                        <td>
                            {{ $maintenance->cost }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.maintenances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection