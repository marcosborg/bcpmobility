@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.driver.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.drivers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.driver.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.driver.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.driver.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="uber_uuid">{{ trans('cruds.driver.fields.uber_uuid') }}</label>
                <input class="form-control {{ $errors->has('uber_uuid') ? 'is-invalid' : '' }}" type="text" name="uber_uuid" id="uber_uuid" value="{{ old('uber_uuid', '') }}">
                @if($errors->has('uber_uuid'))
                    <span class="text-danger">{{ $errors->first('uber_uuid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.uber_uuid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bolt_name">{{ trans('cruds.driver.fields.bolt_name') }}</label>
                <input class="form-control {{ $errors->has('bolt_name') ? 'is-invalid' : '' }}" type="text" name="bolt_name" id="bolt_name" value="{{ old('bolt_name', '') }}">
                @if($errors->has('bolt_name'))
                    <span class="text-danger">{{ $errors->first('bolt_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.bolt_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="driver_license">{{ trans('cruds.driver.fields.driver_license') }}</label>
                <input class="form-control {{ $errors->has('driver_license') ? 'is-invalid' : '' }}" type="text" name="driver_license" id="driver_license" value="{{ old('driver_license', '') }}">
                @if($errors->has('driver_license'))
                    <span class="text-danger">{{ $errors->first('driver_license') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.driver_license_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="citizen_card">{{ trans('cruds.driver.fields.citizen_card') }}</label>
                <input class="form-control {{ $errors->has('citizen_card') ? 'is-invalid' : '' }}" type="text" name="citizen_card" id="citizen_card" value="{{ old('citizen_card', '') }}">
                @if($errors->has('citizen_card'))
                    <span class="text-danger">{{ $errors->first('citizen_card') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.citizen_card_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="driver_vat">{{ trans('cruds.driver.fields.driver_vat') }}</label>
                <input class="form-control {{ $errors->has('driver_vat') ? 'is-invalid' : '' }}" type="text" name="driver_vat" id="driver_vat" value="{{ old('driver_vat', '') }}">
                @if($errors->has('driver_vat'))
                    <span class="text-danger">{{ $errors->first('driver_vat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.driver_vat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_vat">{{ trans('cruds.driver.fields.payment_vat') }}</label>
                <input class="form-control {{ $errors->has('payment_vat') ? 'is-invalid' : '' }}" type="text" name="payment_vat" id="payment_vat" value="{{ old('payment_vat', '') }}">
                @if($errors->has('payment_vat'))
                    <span class="text-danger">{{ $errors->first('payment_vat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.payment_vat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iban">{{ trans('cruds.driver.fields.iban') }}</label>
                <input class="form-control {{ $errors->has('iban') ? 'is-invalid' : '' }}" type="text" name="iban" id="iban" value="{{ old('iban', '') }}">
                @if($errors->has('iban'))
                    <span class="text-danger">{{ $errors->first('iban') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.iban_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.driver.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zip">{{ trans('cruds.driver.fields.zip') }}</label>
                <input class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" type="text" name="zip" id="zip" value="{{ old('zip', '') }}">
                @if($errors->has('zip'))
                    <span class="text-danger">{{ $errors->first('zip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.zip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.driver.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date">{{ trans('cruds.driver.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}">
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.driver.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}">
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reason">{{ trans('cruds.driver.fields.reason') }}</label>
                <input class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" type="text" name="reason" id="reason" value="{{ old('reason', '') }}">
                @if($errors->has('reason'))
                    <span class="text-danger">{{ $errors->first('reason') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.driver.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes') }}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="documents">{{ trans('cruds.driver.fields.documents') }}</label>
                <div class="needsclick dropzone {{ $errors->has('documents') ? 'is-invalid' : '' }}" id="documents-dropzone">
                </div>
                @if($errors->has('documents'))
                    <span class="text-danger">{{ $errors->first('documents') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.documents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="weekly_rent_value_low_season">{{ trans('cruds.driver.fields.weekly_rent_value_low_season') }}</label>
                <input class="form-control {{ $errors->has('weekly_rent_value_low_season') ? 'is-invalid' : '' }}" type="number" name="weekly_rent_value_low_season" id="weekly_rent_value_low_season" value="{{ old('weekly_rent_value_low_season', '') }}" step="0.01">
                @if($errors->has('weekly_rent_value_low_season'))
                    <span class="text-danger">{{ $errors->first('weekly_rent_value_low_season') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.weekly_rent_value_low_season_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="extra_km_value_low_season">{{ trans('cruds.driver.fields.extra_km_value_low_season') }}</label>
                <input class="form-control {{ $errors->has('extra_km_value_low_season') ? 'is-invalid' : '' }}" type="number" name="extra_km_value_low_season" id="extra_km_value_low_season" value="{{ old('extra_km_value_low_season', '') }}" step="0.01">
                @if($errors->has('extra_km_value_low_season'))
                    <span class="text-danger">{{ $errors->first('extra_km_value_low_season') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.extra_km_value_low_season_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="weekly_rent_value_high_season">{{ trans('cruds.driver.fields.weekly_rent_value_high_season') }}</label>
                <input class="form-control {{ $errors->has('weekly_rent_value_high_season') ? 'is-invalid' : '' }}" type="number" name="weekly_rent_value_high_season" id="weekly_rent_value_high_season" value="{{ old('weekly_rent_value_high_season', '') }}" step="0.01">
                @if($errors->has('weekly_rent_value_high_season'))
                    <span class="text-danger">{{ $errors->first('weekly_rent_value_high_season') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.weekly_rent_value_high_season_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="extra_km_value_high_season">{{ trans('cruds.driver.fields.extra_km_value_high_season') }}</label>
                <input class="form-control {{ $errors->has('extra_km_value_high_season') ? 'is-invalid' : '' }}" type="number" name="extra_km_value_high_season" id="extra_km_value_high_season" value="{{ old('extra_km_value_high_season', '') }}" step="0.01">
                @if($errors->has('extra_km_value_high_season'))
                    <span class="text-danger">{{ $errors->first('extra_km_value_high_season') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.extra_km_value_high_season_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agreed_deposit">{{ trans('cruds.driver.fields.agreed_deposit') }}</label>
                <input class="form-control {{ $errors->has('agreed_deposit') ? 'is-invalid' : '' }}" type="number" name="agreed_deposit" id="agreed_deposit" value="{{ old('agreed_deposit', '') }}" step="0.01">
                @if($errors->has('agreed_deposit'))
                    <span class="text-danger">{{ $errors->first('agreed_deposit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.agreed_deposit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="driver_service_vat">{{ trans('cruds.driver.fields.driver_service_vat') }}</label>
                <input class="form-control {{ $errors->has('driver_service_vat') ? 'is-invalid' : '' }}" type="number" name="driver_service_vat" id="driver_service_vat" value="{{ old('driver_service_vat', '') }}" step="1">
                @if($errors->has('driver_service_vat'))
                    <span class="text-danger">{{ $errors->first('driver_service_vat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.driver_service_vat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="driver_withholding_tax">{{ trans('cruds.driver.fields.driver_withholding_tax') }}</label>
                <input class="form-control {{ $errors->has('driver_withholding_tax') ? 'is-invalid' : '' }}" type="number" name="driver_withholding_tax" id="driver_withholding_tax" value="{{ old('driver_withholding_tax', '') }}" step="1">
                @if($errors->has('driver_withholding_tax'))
                    <span class="text-danger">{{ $errors->first('driver_withholding_tax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.driver_withholding_tax_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedDocumentsMap = {}
Dropzone.options.documentsDropzone = {
    url: '{{ route('admin.drivers.storeMedia') }}',
    maxFilesize: 5, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="documents[]" value="' + response.name + '">')
      uploadedDocumentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentsMap[file.name]
      }
      $('form').find('input[name="documents[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($driver) && $driver->documents)
          var files =
            {!! json_encode($driver->documents) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="documents[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection