@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ctum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ctum.fields.id') }}
                        </th>
                        <td>
                            {{ $ctum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctum.fields.lang') }}
                        </th>
                        <td>
                            {{ $ctum->lang->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctum.fields.title') }}
                        </th>
                        <td>
                            {{ $ctum->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctum.fields.text') }}
                        </th>
                        <td>
                            {{ $ctum->text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctum.fields.button') }}
                        </th>
                        <td>
                            {{ $ctum->button }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctum.fields.link') }}
                        </th>
                        <td>
                            {{ $ctum->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctum.fields.image') }}
                        </th>
                        <td>
                            @if($ctum->image)
                                <a href="{{ $ctum->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $ctum->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection