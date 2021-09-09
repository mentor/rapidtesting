<div class="m-3">
    @can('crag_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.crags.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.crag.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.crag.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-countryCrags">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.crag.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.crag.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.crag.fields.latitude') }}
                            </th>
                            <th>
                                {{ trans('cruds.crag.fields.longitude') }}
                            </th>
                            <th>
                                {{ trans('cruds.crag.fields.description') }}
                            </th>
                            <th>
                                {{ trans('cruds.crag.fields.cover_photo') }}
                            </th>
                            <th>
                                {{ trans('cruds.crag.fields.photos') }}
                            </th>
                            <th>
                                {{ trans('cruds.crag.fields.country') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($crags as $key => $crag)
                            <tr data-entry-id="{{ $crag->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $crag->id ?? '' }}
                                </td>
                                <td>
                                    {{ $crag->title ?? '' }}
                                </td>
                                <td>
                                    {{ $crag->latitude ?? '' }}
                                </td>
                                <td>
                                    {{ $crag->longitude ?? '' }}
                                </td>
                                <td>
                                    {{ $crag->description ?? '' }}
                                </td>
                                <td>
                                    @if($crag->cover_photo)
                                        <a href="{{ $crag->cover_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $crag->cover_photo->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @foreach($crag->photos as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $crag->country->name ?? '' }}
                                </td>
                                <td>
                                    @can('crag_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.crags.show', $crag->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('crag_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.crags.edit', $crag->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('crag_delete')
                                        <form action="{{ route('admin.crags.destroy', $crag->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('crag_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.crags.massDestroy') }}",
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
  let table = $('.datatable-countryCrags:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection