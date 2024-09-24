@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.activity.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.activities.update", [$activity->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="operator_code">{{ trans('cruds.activity.fields.operator_code') }}</label>
                <input class="form-control {{ $errors->has('operator_code') ? 'is-invalid' : '' }}" type="text" name="operator_code" id="operator_code" value="{{ old('operator_code', $activity->operator_code) }}" required>
                @if($errors->has('operator_code'))
                    <span class="text-danger">{{ $errors->first('operator_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.operator_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="week_id">{{ trans('cruds.activity.fields.week') }}</label>
                <select class="form-control select2 {{ $errors->has('week') ? 'is-invalid' : '' }}" name="week_id" id="week_id" required>
                    @foreach($weeks as $id => $entry)
                        <option value="{{ $id }}" {{ (old('week_id') ? old('week_id') : $activity->week->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('week'))
                    <span class="text-danger">{{ $errors->first('week') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.week_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="net">{{ trans('cruds.activity.fields.net') }}</label>
                <input class="form-control {{ $errors->has('net') ? 'is-invalid' : '' }}" type="number" name="net" id="net" value="{{ old('net', $activity->net) }}" step="0.01">
                @if($errors->has('net'))
                    <span class="text-danger">{{ $errors->first('net') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.net_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gross">{{ trans('cruds.activity.fields.gross') }}</label>
                <input class="form-control {{ $errors->has('gross') ? 'is-invalid' : '' }}" type="number" name="gross" id="gross" value="{{ old('gross', $activity->gross) }}" step="0.01">
                @if($errors->has('gross'))
                    <span class="text-danger">{{ $errors->first('gross') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.gross_helper') }}</span>
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