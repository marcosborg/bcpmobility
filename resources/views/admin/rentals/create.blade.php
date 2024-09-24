@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.rental.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rentals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="weekly_rental">{{ trans('cruds.rental.fields.weekly_rental') }}</label>
                <input class="form-control {{ $errors->has('weekly_rental') ? 'is-invalid' : '' }}" type="number" name="weekly_rental" id="weekly_rental" value="{{ old('weekly_rental', '') }}" step="0.01">
                @if($errors->has('weekly_rental'))
                    <span class="text-danger">{{ $errors->first('weekly_rental') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.weekly_rental_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="extra_km">{{ trans('cruds.rental.fields.extra_km') }}</label>
                <input class="form-control {{ $errors->has('extra_km') ? 'is-invalid' : '' }}" type="number" name="extra_km" id="extra_km" value="{{ old('extra_km', '') }}" step="0.01">
                @if($errors->has('extra_km'))
                    <span class="text-danger">{{ $errors->first('extra_km') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.extra_km_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="driver_id">{{ trans('cruds.rental.fields.driver') }}</label>
                <select class="form-control select2 {{ $errors->has('driver') ? 'is-invalid' : '' }}" name="driver_id" id="driver_id">
                    @foreach($drivers as $id => $entry)
                        <option value="{{ $id }}" {{ old('driver_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('driver'))
                    <span class="text-danger">{{ $errors->first('driver') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.driver_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="week_id">{{ trans('cruds.rental.fields.week') }}</label>
                <select class="form-control select2 {{ $errors->has('week') ? 'is-invalid' : '' }}" name="week_id" id="week_id">
                    @foreach($weeks as $id => $entry)
                        <option value="{{ $id }}" {{ old('week_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('week'))
                    <span class="text-danger">{{ $errors->first('week') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.week_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection