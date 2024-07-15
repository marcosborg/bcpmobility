@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.carItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.car-items.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="car_brand_id">{{ trans('cruds.carItem.fields.car_brand') }}</label>
                <select class="form-control select2 {{ $errors->has('car_brand') ? 'is-invalid' : '' }}" name="car_brand_id" id="car_brand_id" required>
                    @foreach($car_brands as $id => $entry)
                        <option value="{{ $id }}" {{ old('car_brand_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('car_brand'))
                    <span class="text-danger">{{ $errors->first('car_brand') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carItem.fields.car_brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="car_model_id">{{ trans('cruds.carItem.fields.car_model') }}</label>
                <select class="form-control select2 {{ $errors->has('car_model') ? 'is-invalid' : '' }}" name="car_model_id" id="car_model_id" required>
                    @foreach($car_models as $id => $entry)
                        <option value="{{ $id }}" {{ old('car_model_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('car_model'))
                    <span class="text-danger">{{ $errors->first('car_model') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carItem.fields.car_model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="year">{{ trans('cruds.carItem.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="number" name="year" id="year" value="{{ old('year', '') }}" step="1">
                @if($errors->has('year'))
                    <span class="text-danger">{{ $errors->first('year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carItem.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="license_plate">{{ trans('cruds.carItem.fields.license_plate') }}</label>
                <input class="form-control {{ $errors->has('license_plate') ? 'is-invalid' : '' }}" type="text" name="license_plate" id="license_plate" value="{{ old('license_plate', '') }}" required>
                @if($errors->has('license_plate'))
                    <span class="text-danger">{{ $errors->first('license_plate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carItem.fields.license_plate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="docucments">{{ trans('cruds.carItem.fields.docucments') }}</label>
                <div class="needsclick dropzone {{ $errors->has('docucments') ? 'is-invalid' : '' }}" id="docucments-dropzone">
                </div>
                @if($errors->has('docucments'))
                    <span class="text-danger">{{ $errors->first('docucments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carItem.fields.docucments_helper') }}</span>
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
    var uploadedDocucmentsMap = {}
Dropzone.options.docucmentsDropzone = {
    url: '{{ route('admin.car-items.storeMedia') }}',
    maxFilesize: 5, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="docucments[]" value="' + response.name + '">')
      uploadedDocucmentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocucmentsMap[file.name]
      }
      $('form').find('input[name="docucments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($carItem) && $carItem->docucments)
          var files =
            {!! json_encode($carItem->docucments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="docucments[]" value="' + file.file_name + '">')
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