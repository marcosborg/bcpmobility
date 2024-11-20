@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.receipt.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.receipts.update", [$receipt->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="value">{{ trans('cruds.receipt.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="number" name="value" id="value" value="{{ old('value', $receipt->value) }}" step="0.01" required>
                @if($errors->has('value'))
                    <span class="text-danger">{{ $errors->first('value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receipt.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="file">{{ trans('cruds.receipt.fields.file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                </div>
                @if($errors->has('file'))
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receipt.fields.file_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('paid') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="paid" value="0">
                    <input class="form-check-input" type="checkbox" name="paid" id="paid" value="1" {{ $receipt->paid || old('paid', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="paid">{{ trans('cruds.receipt.fields.paid') }}</label>
                </div>
                @if($errors->has('paid'))
                    <span class="text-danger">{{ $errors->first('paid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receipt.fields.paid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="balance">{{ trans('cruds.receipt.fields.balance') }}</label>
                <input class="form-control {{ $errors->has('balance') ? 'is-invalid' : '' }}" type="number" name="balance" id="balance" value="{{ old('balance', $receipt->balance) }}" step="0.01">
                @if($errors->has('balance'))
                    <span class="text-danger">{{ $errors->first('balance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receipt.fields.balance_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('verified') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="verified" value="0">
                    <input class="form-check-input" type="checkbox" name="verified" id="verified" value="1" {{ $receipt->verified || old('verified', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="verified">{{ trans('cruds.receipt.fields.verified') }}</label>
                </div>
                @if($errors->has('verified'))
                    <span class="text-danger">{{ $errors->first('verified') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receipt.fields.verified_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verified_value">{{ trans('cruds.receipt.fields.verified_value') }}</label>
                <input class="form-control {{ $errors->has('verified_value') ? 'is-invalid' : '' }}" type="number" name="verified_value" id="verified_value" value="{{ old('verified_value', $receipt->verified_value) }}" step="0.01">
                @if($errors->has('verified_value'))
                    <span class="text-danger">{{ $errors->first('verified_value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receipt.fields.verified_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount_transferred">{{ trans('cruds.receipt.fields.amount_transferred') }}</label>
                <input class="form-control {{ $errors->has('amount_transferred') ? 'is-invalid' : '' }}" type="number" name="amount_transferred" id="amount_transferred" value="{{ old('amount_transferred', $receipt->amount_transferred) }}" step="0.01">
                @if($errors->has('amount_transferred'))
                    <span class="text-danger">{{ $errors->first('amount_transferred') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receipt.fields.amount_transferred_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.receipt.fields.company') }}</label>
                @foreach(App\Models\Receipt::COMPANY_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('company') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="company_{{ $key }}" name="company" value="{{ $key }}" {{ old('company', $receipt->company) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="company_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('company'))
                    <span class="text-danger">{{ $errors->first('company') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receipt.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.receipt.fields.iva') }}</label>
                @foreach(App\Models\Receipt::IVA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('iva') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="iva_{{ $key }}" name="iva" value="{{ $key }}" {{ old('iva', $receipt->iva) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="iva_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('iva'))
                    <span class="text-danger">{{ $errors->first('iva') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receipt.fields.iva_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.receipt.fields.retention') }}</label>
                @foreach(App\Models\Receipt::RETENTION_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('retention') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="retention_{{ $key }}" name="retention" value="{{ $key }}" {{ old('retention', $receipt->retention) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="retention_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('retention'))
                    <span class="text-danger">{{ $errors->first('retention') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receipt.fields.retention_helper') }}</span>
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
    Dropzone.options.fileDropzone = {
    url: '{{ route('admin.receipts.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="file"]').remove()
      $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($receipt) && $receipt->file)
      var file = {!! json_encode($receipt->file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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