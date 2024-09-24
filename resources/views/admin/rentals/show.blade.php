@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rental.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rentals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.id') }}
                        </th>
                        <td>
                            {{ $rental->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.weekly_rental') }}
                        </th>
                        <td>
                            {{ $rental->weekly_rental }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.extra_km') }}
                        </th>
                        <td>
                            {{ $rental->extra_km }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.driver') }}
                        </th>
                        <td>
                            {{ $rental->driver->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.week') }}
                        </th>
                        <td>
                            {{ $rental->week->from ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rentals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection