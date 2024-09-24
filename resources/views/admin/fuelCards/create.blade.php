@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fuelCard.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fuel-cards.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="card_number">{{ trans('cruds.fuelCard.fields.card_number') }}</label>
                <input class="form-control {{ $errors->has('card_number') ? 'is-invalid' : '' }}" type="text" name="card_number" id="card_number" value="{{ old('card_number', '') }}" required>
                @if($errors->has('card_number'))
                    <span class="text-danger">{{ $errors->first('card_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fuelCard.fields.card_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.fuelCard.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fuelCard.fields.description_helper') }}</span>
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