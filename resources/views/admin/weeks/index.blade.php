@extends('layouts.admin')
@section('content')
@can('week_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.weeks.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.week.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.week.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Week">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.week.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.week.fields.from') }}
                        </th>
                        <th>
                            {{ trans('cruds.week.fields.to') }}
                        </th>
                        <th>
                            {{ trans('cruds.week.fields.month') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($weeks as $key => $week)
                        <tr data-entry-id="{{ $week->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $week->id ?? '' }}
                            </td>
                            <td>
                                {{ $week->from ?? '' }}
                            </td>
                            <td>
                                {{ $week->to ?? '' }}
                            </td>
                            <td>
                                {{ $week->month->name ?? '' }}
                            </td>
                            <td>
                                @can('week_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.weeks.show', $week->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('week_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.weeks.edit', $week->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('week_delete')
                                    <form action="{{ route('admin.weeks.destroy', $week->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('week_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.weeks.massDestroy') }}",
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
  let table = $('.datatable-Week:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection