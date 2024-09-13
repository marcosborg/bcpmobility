@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.season.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.seasons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.season.fields.id') }}
                        </th>
                        <td>
                            {{ $season->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.season.fields.season') }}
                        </th>
                        <td>
                            {{ App\Models\Season::SEASON_RADIO[$season->season] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.season.fields.start_date') }}
                        </th>
                        <td>
                            {{ $season->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.season.fields.end_date') }}
                        </th>
                        <td>
                            {{ $season->end_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.seasons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection