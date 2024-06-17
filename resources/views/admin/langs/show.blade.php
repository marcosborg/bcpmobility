@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lang.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.langs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lang.fields.id') }}
                        </th>
                        <td>
                            {{ $lang->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lang.fields.name') }}
                        </th>
                        <td>
                            {{ $lang->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lang.fields.code') }}
                        </th>
                        <td>
                            {{ $lang->code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.langs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection