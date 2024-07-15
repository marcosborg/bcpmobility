@extends('layouts.admin')
@section('content')
@can('carmanagement_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.carmanagements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.carmanagement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.carmanagement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Carmanagement">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.carmanagement.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.carmanagement.fields.car_item') }}
                        </th>
                        <th>
                            {{ trans('cruds.carItem.fields.license_plate') }}
                        </th>
                        <th>
                            {{ trans('cruds.carmanagement.fields.driver') }}
                        </th>
                        <th>
                            {{ trans('cruds.carmanagement.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.carmanagement.fields.end_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carmanagements as $key => $carmanagement)
                        <tr data-entry-id="{{ $carmanagement->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $carmanagement->id ?? '' }}
                            </td>
                            <td>
                                {{ $carmanagement->car_item->license_plate ?? '' }}
                            </td>
                            <td>
                                {{ $carmanagement->car_item->license_plate ?? '' }}
                            </td>
                            <td>
                                {{ $carmanagement->driver->name ?? '' }}
                            </td>
                            <td>
                                {{ $carmanagement->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $carmanagement->end_date ?? '' }}
                            </td>
                            <td>
                                @can('carmanagement_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.carmanagements.show', $carmanagement->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('carmanagement_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.carmanagements.edit', $carmanagement->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('carmanagement_delete')
                                    <form action="{{ route('admin.carmanagements.destroy', $carmanagement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('carmanagement_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.carmanagements.massDestroy') }}",
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
  let table = $('.datatable-Carmanagement:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection