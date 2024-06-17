@extends('layouts.admin')
@section('content')
@can('lang_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.langs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.lang.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.lang.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Lang">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.lang.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.lang.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.lang.fields.code') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($langs as $key => $lang)
                        <tr data-entry-id="{{ $lang->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $lang->id ?? '' }}
                            </td>
                            <td>
                                {{ $lang->name ?? '' }}
                            </td>
                            <td>
                                {{ $lang->code ?? '' }}
                            </td>
                            <td>
                                @can('lang_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.langs.show', $lang->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('lang_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.langs.edit', $lang->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('lang_delete')
                                    <form action="{{ route('admin.langs.destroy', $lang->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('lang_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.langs.massDestroy') }}",
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
  let table = $('.datatable-Lang:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection