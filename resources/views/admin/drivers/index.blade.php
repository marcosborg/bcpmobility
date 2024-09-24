@extends('layouts.admin')
@section('content')
@can('driver_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.drivers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.driver.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.driver.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Driver">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.uber_uuid') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.bolt_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.driver_license') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.citizen_card') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.driver_vat') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.payment_vat') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.iban') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.zip') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.reason') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.documents') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.weekly_rent_value_low_season') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.extra_km_value_low_season') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.weekly_rent_value_high_season') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.extra_km_value_high_season') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.agreed_deposit') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.driver_service_vat') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.driver_withholding_tax') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.fuel_cards') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($drivers as $key => $driver)
                        <tr data-entry-id="{{ $driver->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $driver->id ?? '' }}
                            </td>
                            <td>
                                {{ $driver->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $driver->name ?? '' }}
                            </td>
                            <td>
                                {{ $driver->phone ?? '' }}
                            </td>
                            <td>
                                {{ $driver->uber_uuid ?? '' }}
                            </td>
                            <td>
                                {{ $driver->bolt_name ?? '' }}
                            </td>
                            <td>
                                {{ $driver->driver_license ?? '' }}
                            </td>
                            <td>
                                {{ $driver->citizen_card ?? '' }}
                            </td>
                            <td>
                                {{ $driver->driver_vat ?? '' }}
                            </td>
                            <td>
                                {{ $driver->payment_vat ?? '' }}
                            </td>
                            <td>
                                {{ $driver->iban ?? '' }}
                            </td>
                            <td>
                                {{ $driver->address ?? '' }}
                            </td>
                            <td>
                                {{ $driver->zip ?? '' }}
                            </td>
                            <td>
                                {{ $driver->city ?? '' }}
                            </td>
                            <td>
                                {{ $driver->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $driver->end_date ?? '' }}
                            </td>
                            <td>
                                {{ $driver->reason ?? '' }}
                            </td>
                            <td>
                                {{ $driver->notes ?? '' }}
                            </td>
                            <td>
                                @foreach($driver->documents as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $driver->weekly_rent_value_low_season ?? '' }}
                            </td>
                            <td>
                                {{ $driver->extra_km_value_low_season ?? '' }}
                            </td>
                            <td>
                                {{ $driver->weekly_rent_value_high_season ?? '' }}
                            </td>
                            <td>
                                {{ $driver->extra_km_value_high_season ?? '' }}
                            </td>
                            <td>
                                {{ $driver->agreed_deposit ?? '' }}
                            </td>
                            <td>
                                {{ $driver->driver_service_vat ?? '' }}
                            </td>
                            <td>
                                {{ $driver->driver_withholding_tax ?? '' }}
                            </td>
                            <td>
                                @foreach($driver->fuel_cards as $key => $item)
                                    <span class="badge badge-info">{{ $item->card_number }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('driver_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.drivers.show', $driver->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('driver_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.drivers.edit', $driver->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('driver_delete')
                                    <form action="{{ route('admin.drivers.destroy', $driver->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('driver_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.drivers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Driver:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection