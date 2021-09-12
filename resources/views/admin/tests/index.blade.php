@extends('layouts.admin')
@section('content')
@can('test_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.test.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Test', 'route' => 'admin.tests.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.test.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Test">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        &nbsp;
                    </th>
                    <th>
                        {{ trans('cruds.test.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.test.fields.code_ref') }}
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
                        {{ trans('cruds.test.fields.insurance_company') }}
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Test::STATUS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($services as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Test::SYMPTOMS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Test::RESULT_STATUS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Test::RESULT_TEST_NAME_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Test::RESULT_TEST_MANUFACTURER_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Test::RESULT_DIAGNOSIS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($centres as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
@can('test_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tests.massDestroy') }}",
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
    ajax: "{{ route('admin.tests.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'actions', name: '{{ trans('global.actions') }}' },
{ data: 'id', name: 'id' },
{ data: 'code_ref',name: 'code_ref',
    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
        $(nTd).html("<a href='/admin/tests/"+oData.id+"'>"+oData.code_ref+"</a>");
    }
},
{ data: 'status', name: 'status' },
{ data: 'service_name', name: 'service.name' },
{ data: 'start', name: 'start' },
{ data: 'end', name: 'end' },
{ data: 'pinrc', name: 'pinrc' },
{ data: 'pinid', name: 'pinid' },
{ data: 'firstname', name: 'firstname' },
{ data: 'lastname', name: 'lastname' },
{ data: 'email', name: 'email' },
{ data: 'phone', name: 'phone' },
{ data: 'dob', name: 'dob' },
{ data: 'street', name: 'street' },
{ data: 'city', name: 'city' },
{ data: 'postal', name: 'postal' },
{ data: 'country', name: 'country' },
{ data: 'symptoms', name: 'symptoms' },
{ data: 'result_date', name: 'result_date' },
{ data: 'result_status', name: 'result_status' },
{ data: 'result_test_name', name: 'result_test_name' },
{ data: 'result_test_manufacturer', name: 'result_test_manufacturer' },
{ data: 'result_diagnosis', name: 'result_diagnosis' },
{ data: 'centre_name', name: 'centre.name' },
{ data: 'note', name: 'note' },
{ data: 'reservation_id_ref', name: 'reservation_id_ref' },
// { data: 'code_ref', name: 'code_ref' },

{ data: 'insurance_company', name: 'insurance_company' }

    ],
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Test').DataTable(dtOverrideGlobals);
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
