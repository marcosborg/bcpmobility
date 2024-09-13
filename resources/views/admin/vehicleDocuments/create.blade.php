@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.vehicleDocument.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vehicle-documents.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="car_item_id">{{ trans('cruds.vehicleDocument.fields.car_item') }}</label>
                <select class="form-control select2 {{ $errors->has('car_item') ? 'is-invalid' : '' }}" name="car_item_id" id="car_item_id" required>
                    @foreach($car_items as $id => $entry)
                        <option value="{{ $id }}" {{ old('car_item_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('car_item'))
                    <span class="text-danger">{{ $errors->first('car_item') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleDocument.fields.car_item_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="documents">{{ trans('cruds.vehicleDocument.fields.documents') }}</label>
                <div class="needsclick dropzone {{ $errors->has('documents') ? 'is-invalid' : '' }}" id="documents-dropzone">
                </div>
                @if($errors->has('documents'))
                    <span class="text-danger">{{ $errors->first('documents') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleDocument.fields.documents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="carta_verde">{{ trans('cruds.vehicleDocument.fields.carta_verde') }}</label>
                <input class="form-control date {{ $errors->has('carta_verde') ? 'is-invalid' : '' }}" type="text" name="carta_verde" id="carta_verde" value="{{ old('carta_verde') }}">
                @if($errors->has('carta_verde'))
                    <span class="text-danger">{{ $errors->first('carta_verde') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleDocument.fields.carta_verde_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="condicoes_particulares">{{ trans('cruds.vehicleDocument.fields.condicoes_particulares') }}</label>
                <input class="form-control date {{ $errors->has('condicoes_particulares') ? 'is-invalid' : '' }}" type="text" name="condicoes_particulares" id="condicoes_particulares" value="{{ old('condicoes_particulares') }}">
                @if($errors->has('condicoes_particulares'))
                    <span class="text-danger">{{ $errors->first('condicoes_particulares') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleDocument.fields.condicoes_particulares_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dua">{{ trans('cruds.vehicleDocument.fields.dua') }}</label>
                <input class="form-control date {{ $errors->has('dua') ? 'is-invalid' : '' }}" type="text" name="dua" id="dua" value="{{ old('dua') }}">
                @if($errors->has('dua'))
                    <span class="text-danger">{{ $errors->first('dua') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleDocument.fields.dua_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dav">{{ trans('cruds.vehicleDocument.fields.dav') }}</label>
                <input class="form-control date {{ $errors->has('dav') ? 'is-invalid' : '' }}" type="text" name="dav" id="dav" value="{{ old('dav') }}">
                @if($errors->has('dav'))
                    <span class="text-danger">{{ $errors->first('dav') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleDocument.fields.dav_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tvde_license">{{ trans('cruds.vehicleDocument.fields.tvde_license') }}</label>
                <input class="form-control date {{ $errors->has('tvde_license') ? 'is-invalid' : '' }}" type="text" name="tvde_license" id="tvde_license" value="{{ old('tvde_license') }}">
                @if($errors->has('tvde_license'))
                    <span class="text-danger">{{ $errors->first('tvde_license') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleDocument.fields.tvde_license_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inspecao_tecnica_periodica">{{ trans('cruds.vehicleDocument.fields.inspecao_tecnica_periodica') }}</label>
                <input class="form-control date {{ $errors->has('inspecao_tecnica_periodica') ? 'is-invalid' : '' }}" type="text" name="inspecao_tecnica_periodica" id="inspecao_tecnica_periodica" value="{{ old('inspecao_tecnica_periodica') }}">
                @if($errors->has('inspecao_tecnica_periodica'))
                    <span class="text-danger">{{ $errors->first('inspecao_tecnica_periodica') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleDocument.fields.inspecao_tecnica_periodica_helper') }}</span>
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
    url: '{{ route('admin.vehicle-documents.storeMedia') }}',
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
@if(isset($vehicleDocument) && $vehicleDocument->documents)
          var files =
            {!! json_encode($vehicleDocument->documents) !!}
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