@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.season.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.seasons.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.season.fields.season') }}</label>
                @foreach(App\Models\Season::SEASON_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('season') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="season_{{ $key }}" name="season" value="{{ $key }}" {{ old('season', 'high') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="season_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('season'))
                    <span class="text-danger">{{ $errors->first('season') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.season.fields.season_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.season.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.season.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.season.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.season.fields.end_date_helper') }}</span>
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