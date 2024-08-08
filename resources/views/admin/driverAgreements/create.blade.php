@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.driverAgreement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.driver-agreements.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="driver_id">{{ trans('cruds.driverAgreement.fields.driver') }}</label>
                <select class="form-control select2 {{ $errors->has('driver') ? 'is-invalid' : '' }}" name="driver_id" id="driver_id" required>
                    @foreach($drivers as $id => $entry)
                        <option value="{{ $id }}" {{ old('driver_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('driver'))
                    <span class="text-danger">{{ $errors->first('driver') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driverAgreement.fields.driver_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="car_item_id">{{ trans('cruds.driverAgreement.fields.car_item') }}</label>
                <select class="form-control select2 {{ $errors->has('car_item') ? 'is-invalid' : '' }}" name="car_item_id" id="car_item_id" required>
                    @foreach($car_items as $id => $entry)
                        <option value="{{ $id }}" {{ old('car_item_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('car_item'))
                    <span class="text-danger">{{ $errors->first('car_item') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driverAgreement.fields.car_item_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.driverAgreement.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driverAgreement.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.driverAgreement.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}">
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driverAgreement.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="weekly_income_high">{{ trans('cruds.driverAgreement.fields.weekly_income_high') }}</label>
                <input class="form-control {{ $errors->has('weekly_income_high') ? 'is-invalid' : '' }}" type="number" name="weekly_income_high" id="weekly_income_high" value="{{ old('weekly_income_high', '') }}" step="0.01" required>
                @if($errors->has('weekly_income_high'))
                    <span class="text-danger">{{ $errors->first('weekly_income_high') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driverAgreement.fields.weekly_income_high_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="weekly_income_low">{{ trans('cruds.driverAgreement.fields.weekly_income_low') }}</label>
                <input class="form-control {{ $errors->has('weekly_income_low') ? 'is-invalid' : '' }}" type="number" name="weekly_income_low" id="weekly_income_low" value="{{ old('weekly_income_low', '') }}" step="0.01" required>
                @if($errors->has('weekly_income_low'))
                    <span class="text-danger">{{ $errors->first('weekly_income_low') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driverAgreement.fields.weekly_income_low_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="additional_km_value_high">{{ trans('cruds.driverAgreement.fields.additional_km_value_high') }}</label>
                <input class="form-control {{ $errors->has('additional_km_value_high') ? 'is-invalid' : '' }}" type="number" name="additional_km_value_high" id="additional_km_value_high" value="{{ old('additional_km_value_high', '') }}" step="0.01" required>
                @if($errors->has('additional_km_value_high'))
                    <span class="text-danger">{{ $errors->first('additional_km_value_high') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driverAgreement.fields.additional_km_value_high_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="additional_km_value_low">{{ trans('cruds.driverAgreement.fields.additional_km_value_low') }}</label>
                <input class="form-control {{ $errors->has('additional_km_value_low') ? 'is-invalid' : '' }}" type="number" name="additional_km_value_low" id="additional_km_value_low" value="{{ old('additional_km_value_low', '') }}" step="0.01" required>
                @if($errors->has('additional_km_value_low'))
                    <span class="text-danger">{{ $errors->first('additional_km_value_low') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driverAgreement.fields.additional_km_value_low_helper') }}</span>
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