@can('test_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.test.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.test.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-centreTests">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.test.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.service') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.start') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.end') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.pinrc') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.pinid') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.firstname') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.lastname') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.dob') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.street') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.postal') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.country') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.symptoms') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.result_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.result_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.result_test_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.result_test_manufacturer') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.result_diagnosis') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.centre') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.note') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.reservation_id_ref') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.code_ref') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.insurance_company') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tests as $key => $test)
                        <tr data-entry-id="{{ $test->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $test->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Test::STATUS_SELECT[$test->status] ?? '' }}
                            </td>
                            <td>
                                {{ $test->service->name ?? '' }}
                            </td>
                            <td>
                                {{ $test->start ?? '' }}
                            </td>
                            <td>
                                {{ $test->end ?? '' }}
                            </td>
                            <td>
                                {{ $test->pinrc ?? '' }}
                            </td>
                            <td>
                                {{ $test->pinid ?? '' }}
                            </td>
                            <td>
                                {{ $test->firstname ?? '' }}
                            </td>
                            <td>
                                {{ $test->lastname ?? '' }}
                            </td>
                            <td>
                                {{ $test->email ?? '' }}
                            </td>
                            <td>
                                {{ $test->phone ?? '' }}
                            </td>
                            <td>
                                {{ $test->dob ?? '' }}
                            </td>
                            <td>
                                {{ $test->street ?? '' }}
                            </td>
                            <td>
                                {{ $test->city ?? '' }}
                            </td>
                            <td>
                                {{ $test->postal ?? '' }}
                            </td>
                            <td>
                                {{ $test->country ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Test::SYMPTOMS_SELECT[$test->symptoms] ?? '' }}
                            </td>
                            <td>
                                {{ $test->result_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Test::RESULT_STATUS_SELECT[$test->result_status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Test::RESULT_TEST_NAME_SELECT[$test->result_test_name] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Test::RESULT_TEST_MANUFACTURER_SELECT[$test->result_test_manufacturer] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Test::RESULT_DIAGNOSIS_SELECT[$test->result_diagnosis] ?? '' }}
                            </td>
                            <td>
                                {{ $test->centre->name ?? '' }}
                            </td>
                            <td>
                                {{ $test->note ?? '' }}
                            </td>
                            <td>
                                {{ $test->reservation_id_ref ?? '' }}
                            </td>
                            <td>
                                {{ $test->code_ref ?? '' }}
                            </td>
                            <td>
                                {{ $test->insurance_company ?? '' }}
                            </td>
                            <td>
                                @can('test_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tests.show', $test->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('test_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tests.edit', $test->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('test_delete')
                                    <form action="{{ route('admin.tests.destroy', $test->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('test_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tests.massDestroy') }}",
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
  let table = $('.datatable-centreTests:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection