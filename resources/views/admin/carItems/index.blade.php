@extends('layouts.admin')
@section('content')
@can('car_item_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.car-items.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.carItem.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.carItem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CarItem">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.carItem.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.carItem.fields.car_brand') }}
                        </th>
                        <th>
                            {{ trans('cruds.carItem.fields.car_model') }}
                        </th>
                        <th>
                            {{ trans('cruds.carItem.fields.year') }}
                        </th>
                        <th>
                            {{ trans('cruds.carItem.fields.license_plate') }}
                        </th>
                        <th>
                            {{ trans('cruds.carItem.fields.motorization') }}
                        </th>
                        <th>
                            {{ trans('cruds.carItem.fields.chassis_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.carItem.fields.internal_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.carItem.fields.documents') }}
                        </th>
                        <th>
                            {{ trans('cruds.carItem.fields.cost_per_km') }}
                        </th>
                        <th>
                            {{ trans('cruds.carItem.fields.monthly_income') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carItems as $key => $carItem)
                        <tr data-entry-id="{{ $carItem->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $carItem->id ?? '' }}
                            </td>
                            <td>
                                {{ $carItem->car_brand->name ?? '' }}
                            </td>
                            <td>
                                {{ $carItem->car_model->name ?? '' }}
                            </td>
                            <td>
                                {{ $carItem->year ?? '' }}
                            </td>
                            <td>
                                {{ $carItem->license_plate ?? '' }}
                            </td>
                            <td>
                                {{ $carItem->motorization ?? '' }}
                            </td>
                            <td>
                                {{ $carItem->chassis_number ?? '' }}
                            </td>
                            <td>
                                {{ $carItem->internal_name ?? '' }}
                            </td>
                            <td>
                                @foreach($carItem->documents as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $carItem->cost_per_km ?? '' }}
                            </td>
                            <td>
                                {{ $carItem->monthly_income ?? '' }}
                            </td>
                            <td>
                                @can('car_item_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.car-items.show', $carItem->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('car_item_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.car-items.edit', $carItem->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('car_item_delete')
                                    <form action="{{ route('admin.car-items.destroy', $carItem->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('car_item_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.car-items.massDestroy') }}",
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
  let table = $('.datatable-CarItem:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection