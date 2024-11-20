@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.receipt.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.receipts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.receipt.fields.id') }}
                        </th>
                        <td>
                            {{ $receipt->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receipt.fields.value') }}
                        </th>
                        <td>
                            {{ $receipt->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receipt.fields.file') }}
                        </th>
                        <td>
                            @if($receipt->file)
                                <a href="{{ $receipt->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receipt.fields.paid') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $receipt->paid ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receipt.fields.balance') }}
                        </th>
                        <td>
                            {{ $receipt->balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receipt.fields.verified') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $receipt->verified ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receipt.fields.verified_value') }}
                        </th>
                        <td>
                            {{ $receipt->verified_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receipt.fields.amount_transferred') }}
                        </th>
                        <td>
                            {{ $receipt->amount_transferred }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receipt.fields.company') }}
                        </th>
                        <td>
                            {{ App\Models\Receipt::COMPANY_RADIO[$receipt->company] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receipt.fields.iva') }}
                        </th>
                        <td>
                            {{ App\Models\Receipt::IVA_RADIO[$receipt->iva] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receipt.fields.retention') }}
                        </th>
                        <td>
                            {{ App\Models\Receipt::RETENTION_RADIO[$receipt->retention] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.receipts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection