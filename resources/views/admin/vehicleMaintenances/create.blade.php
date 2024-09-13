@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.vehicleMaintenance.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vehicle-maintenances.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="car_item_id">{{ trans('cruds.vehicleMaintenance.fields.car_item') }}</label>
                <select class="form-control select2 {{ $errors->has('car_item') ? 'is-invalid' : '' }}" name="car_item_id" id="car_item_id" required>
                    @foreach($car_items as $id => $entry)
                        <option value="{{ $id }}" {{ old('car_item_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('car_item'))
                    <span class="text-danger">{{ $errors->first('car_item') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMaintenance.fields.car_item_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reason">{{ trans('cruds.vehicleMaintenance.fields.reason') }}</label>
                <input class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" type="text" name="reason" id="reason" value="{{ old('reason', '') }}" required>
                @if($errors->has('reason'))
                    <span class="text-danger">{{ $errors->first('reason') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMaintenance.fields.reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_time_start">{{ trans('cruds.vehicleMaintenance.fields.date_time_start') }}</label>
                <input class="form-control datetime {{ $errors->has('date_time_start') ? 'is-invalid' : '' }}" type="text" name="date_time_start" id="date_time_start" value="{{ old('date_time_start') }}" required>
                @if($errors->has('date_time_start'))
                    <span class="text-danger">{{ $errors->first('date_time_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMaintenance.fields.date_time_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_time_end">{{ trans('cruds.vehicleMaintenance.fields.date_time_end') }}</label>
                <input class="form-control datetime {{ $errors->has('date_time_end') ? 'is-invalid' : '' }}" type="text" name="date_time_end" id="date_time_end" value="{{ old('date_time_end') }}">
                @if($errors->has('date_time_end'))
                    <span class="text-danger">{{ $errors->first('date_time_end') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMaintenance.fields.date_time_end_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observations">{{ trans('cruds.vehicleMaintenance.fields.observations') }}</label>
                <textarea class="form-control {{ $errors->has('observations') ? 'is-invalid' : '' }}" name="observations" id="observations">{{ old('observations') }}</textarea>
                @if($errors->has('observations'))
                    <span class="text-danger">{{ $errors->first('observations') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMaintenance.fields.observations_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="documents">{{ trans('cruds.vehicleMaintenance.fields.documents') }}</label>
                <div class="needsclick dropzone {{ $errors->has('documents') ? 'is-invalid' : '' }}" id="documents-dropzone">
                </div>
                @if($errors->has('documents'))
                    <span class="text-danger">{{ $errors->first('documents') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMaintenance.fields.documents_helper') }}</span>
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
    url: '{{ route('admin.vehicle-maintenances.storeMedia') }}',
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
@if(isset($vehicleMaintenance) && $vehicleMaintenance->documents)
          var files =
            {!! json_encode($vehicleMaintenance->documents) !!}
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