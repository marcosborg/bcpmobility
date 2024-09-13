@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.week.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.weeks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.week.fields.id') }}
                        </th>
                        <td>
                            {{ $week->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.week.fields.from') }}
                        </th>
                        <td>
                            {{ $week->from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.week.fields.to') }}
                        </th>
                        <td>
                            {{ $week->to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.week.fields.month') }}
                        </th>
                        <td>
                            {{ $week->month->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.weeks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection