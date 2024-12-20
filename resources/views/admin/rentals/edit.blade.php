@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.rental.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rentals.update", [$rental->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="weekly_rental">{{ trans('cruds.rental.fields.weekly_rental') }}</label>
                <input class="form-control {{ $errors->has('weekly_rental') ? 'is-invalid' : '' }}" type="number" name="weekly_rental" id="weekly_rental" value="{{ old('weekly_rental', $rental->weekly_rental) }}" step="0.01">
                @if($errors->has('weekly_rental'))
                    <span class="text-danger">{{ $errors->first('weekly_rental') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.weekly_rental_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="extra_km">{{ trans('cruds.rental.fields.extra_km') }}</label>
                <input class="form-control {{ $errors->has('extra_km') ? 'is-invalid' : '' }}" type="number" name="extra_km" id="extra_km" value="{{ old('extra_km', $rental->extra_km) }}" step="0.01">
                @if($errors->has('extra_km'))
                    <span class="text-danger">{{ $errors->first('extra_km') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.extra_km_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="driver_id">{{ trans('cruds.rental.fields.driver') }}</label>
                <select class="form-control select2 {{ $errors->has('driver') ? 'is-invalid' : '' }}" name="driver_id" id="driver_id">
                    @foreach($drivers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('driver_id') ? old('driver_id') : $rental->driver->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                        <option value="{{ $id }}" {{ (old('week_id') ? old('week_id') : $rental->week->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('week'))
                    <span class="text-danger">{{ $errors->first('week') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.week_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.rental.fields.rental_type') }}</label>
                @foreach(App\Models\Rental::RENTAL_TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('rental_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="rental_type_{{ $key }}" name="rental_type" value="{{ $key }}" {{ old('rental_type', $rental->rental_type) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="rental_type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('rental_type'))
                    <span class="text-danger">{{ $errors->first('rental_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.rental_type_helper') }}</span>
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