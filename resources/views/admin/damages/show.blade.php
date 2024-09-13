@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.damage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.damages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.damage.fields.id') }}
                        </th>
                        <td>
                            {{ $damage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.damage.fields.photos') }}
                        </th>
                        <td>
                            @foreach($damage->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.damage.fields.description') }}
                        </th>
                        <td>
                            {{ $damage->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.damage.fields.cost') }}
                        </th>
                        <td>
                            {{ $damage->cost }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.damages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection