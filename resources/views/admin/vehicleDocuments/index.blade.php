@extends('layouts.admin')
@section('content')
@can('vehicle_document_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.vehicle-documents.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.vehicleDocument.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.vehicleDocument.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-VehicleDocument">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.vehicleDocument.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleDocument.fields.car_item') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleDocument.fields.documents') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleDocument.fields.carta_verde') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleDocument.fields.condicoes_particulares') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleDocument.fields.dua') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleDocument.fields.dav') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleDocument.fields.tvde_license') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleDocument.fields.inspecao_tecnica_periodica') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($car_items as $key => $item)
                                <option value="{{ $item->license_plate }}">{{ $item->license_plate }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('vehicle_document_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vehicle-documents.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.vehicle-documents.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'car_item_license_plate', name: 'car_item.license_plate' },
{ data: 'documents', name: 'documents', sortable: false, searchable: false },
{ data: 'carta_verde', name: 'carta_verde' },
{ data: 'condicoes_particulares', name: 'condicoes_particulares' },
{ data: 'dua', name: 'dua' },
{ data: 'dav', name: 'dav' },
{ data: 'tvde_license', name: 'tvde_license' },
{ data: 'inspecao_tecnica_periodica', name: 'inspecao_tecnica_periodica' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-VehicleDocument').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection