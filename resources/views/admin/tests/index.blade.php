@extends('layouts.admin')

@include('admin.tests.partials.email-send-modal')

@section('content')

    <h3 class="page-title">{{ trans('cruds.test.title_singular') }}</h3>
    <div class="card">
        @can('test_create')
            <div class="card-header">
                <div class="text-right">
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

        <div class="card-body">
            <table class=" table table-striped table-hover ajaxTable datatable datatable-Test">
                <thead>
                <tr class="header-row">
                    {{--                    <th width="10">--}}

                    {{--                    </th>--}}
                    <th>
                        &nbsp;{{ trans('global.actions') }}
                    </th>
                <!--                    <th>
                        {{ trans('cruds.test.fields.id') }}
                    </th>-->
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
                        {{ trans('cruds.test.fields.created_at') }}
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
                <tr class="filter-row">
                    <td>
                        <button title="Zrušiť filtrovanie" class="btn btn-ghost-dark js-reset-filters" >
                        <svg aria-hidden="true" focusable="false" height="18px" data-icon="filter-circle-xmark" class="svg-inline--fa fa-filter-circle-xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M382.8 199.1l121.9-146.1C521.1 31.28 506.8 0 479.3 0H32.7C5.213 0-9.965 31.28 7.375 52.19L192 274.8V368c0 7.828 3.812 15.17 10.25 19.66l66.88 46.8C260.7 413.9 256 391.5 256 368C256 288.1 309.6 220.5 382.8 199.1zM432 224C352.5 224 288 288.5 288 368s64.47 144 144 144s144-64.47 144-144S511.5 224 432 224zM488.5 401.9c6.242 6.242 6.252 16.37 .0098 22.62c-6.24 6.242-16.37 6.231-22.62-.0113l-33.91-33.91l-33.91 33.91c-6.242 6.242-16.37 6.253-22.62 .0106s-6.232-16.37 .0098-22.62l33.91-33.91l-33.91-33.91c-6.242-6.242-6.251-16.37-.009-22.62s16.37-6.232 22.62 .0106l33.91 33.91l33.91-33.91c6.242-6.242 16.37-6.254 22.61-.0113s6.233 16.37-.009 22.62l-33.91 33.91L488.5 401.9z"></path></svg>
                        </button>
                    </td>

                    <td>
                        <input class="search form-control  form-control-sm" type="text"
                               placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search form-control  form-control-sm">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Test::STATUS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search form-control  form-control-sm">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($services as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <input class="search form-control  form-control-sm" type="text"
                               placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control  form-control-sm" type="text"
                               placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control  form-control-sm" type="text"
                               placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control  form-control-sm" type="text"
                               placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        {{--                        <input class="search form-control  form-control-sm" type="text" placeholder="{{ trans('global.search') }}">--}}
                    </td>
                    <td>
                        {{--                        <input class="search form-control  form-control-sm" type="text" placeholder="{{ trans('global.search') }}">--}}
                    </td>
                    <td>
                        {{--                        <input class="search form-control  form-control-sm" type="text" placeholder="{{ trans('global.search') }}">--}}
                    </td>
                    <td>
                        <input class="search form-control  form-control-sm" type="text"
                               placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control  form-control-sm " type="text"
                               placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search form-control  form-control-sm " type="text"
                               placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control  form-control-sm " type="text"
                               placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control  form-control-sm " type="text"
                               placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control  form-control-sm " type="text"
                               placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search form-control  form-control-sm">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Test::SYMPTOMS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        {{--                        <input class="search form-control  form-control-sm" type="text" placeholder="{{ trans('global.search') }}">--}}
                    </td>
                    <td>
                        <select class="search form-control  form-control-sm">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Test::RESULT_STATUS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search form-control  form-control-sm">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Test::RESULT_TEST_NAME_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search form-control  form-control-sm">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Test::RESULT_TEST_MANUFACTURER_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search form-control  form-control-sm">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Test::RESULT_DIAGNOSIS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search form-control  form-control-sm">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($centres as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search form-control  form-control-sm " type="text"
                               placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control  form-control-sm " type="text"
                               placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control  form-control-sm " type="text"
                               placeholder="{{ trans('global.search') }}">
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
                let deleteButton = {
                    text: '{{ trans('global.datatables.delete') }}',
                    url: "{{ route('admin.tests.massDestroy') }}",
                    className: 'btn-danger',
                    action: function (e, dt, node, config) {
                        let ids = $.map(dt.rows({selected: true}).data(), function (entry) {
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
                                data: {ids: ids, _method: 'DELETE'}
                            })
                                .done(function () {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                select: false,
                columnDefs: [],
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.tests.index') }}",
                columns: [
                    // { data: 'placeholder', name: 'placeholder' },
                    {data: 'actions', name: '{{ trans('global.actions') }}', searchable: false, orderable: false},
                    // { data: 'id', name: 'id' },
                    {
                        data: 'code_ref', name: 'code_ref',
                        @can('test_edit')
                        "render": function (data, type, row, meta) {
                            return '<a class="btn btn-outline-dark" href="/admin/tests/' + row.id + '/edit">' + row.code_ref + '</a>';
                        },
                        @endcan
                    },
                    {data: 'status', name: 'status'},
                    {data: 'service_name', name: 'service.name'},
                    {data: 'firstname', name: 'firstname'},
                    {data: 'lastname', name: 'lastname'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'created_at', name: 'created_at', searchable: false},
                    {data: 'start', name: 'start', searchable: false},
                    {data: 'end', name: 'end', searchable: false},
                    {data: 'pinrc', name: 'pinrc'},
                    {data: 'pinid', name: 'pinid'},
                    {data: 'dob', name: 'dob', searchable: false},
                    {data: 'street', name: 'street'},
                    {data: 'city', name: 'city'},
                    {data: 'postal', name: 'postal'},
                    {data: 'country', name: 'country'},
                    {data: 'symptoms', name: 'symptoms'},
                    {data: 'result_date', name: 'result_date'},
                    {data: 'result_status', name: 'result_status'},
                    {data: 'result_test_name', name: 'result_test_name'},
                    {data: 'result_test_manufacturer', name: 'result_test_manufacturer'},
                    {data: 'result_diagnosis', name: 'result_diagnosis'},
                    {data: 'centre_name', name: 'centre.name'},
                    {data: 'note', name: 'note'},
                    {data: 'reservation_id_ref', name: 'reservation_id_ref'},
                    {data: 'insurance_company', name: 'insurance_company'}
                ],
                orderCellsTop: true,
                order: [[8, 'desc']],
                pageLength: 100,

                "initComplete": function(settings, json) {

                    let table = settings.oInstance.api();
                    // let tableId = settings.sTableId;

                    $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                        $($.fn.dataTable.tables(true)).DataTable()
                            .columns.adjust();
                    });

                    let visibleColumnsIndexes = null;
                    table.on('column-visibility.dt', function (e, settings, column, state) {
                        visibleColumnsIndexes = []
                        table.columns(":visible").every(function (colIdx) {
                            visibleColumnsIndexes.push(colIdx);
                        });
                    })

                    $('.js-reset-filters').click(function () {
                        table.search("").columns().search("").draw();
                        $("thead .search").val("");
                    });

                    $('.datatable thead').on('input', '.search', function () {
                        let strict = $(this).get(0).tagName === 'SELECT' || $(this).attr('strict') || false
                        let value = strict && this.value ? "^" + this.value + "$" : this.value

                        visibleColumnsIndexes = []
                        table.columns(":visible").every(function (colIdx) {
                            visibleColumnsIndexes.push(colIdx);
                        });

                        let index = $(this).parent().index()
                        if (visibleColumnsIndexes !== null) {
                            index = visibleColumnsIndexes[index]
                        }

                        table
                            .column(index)
                            .search(value, strict)
                            .draw()
                    });



                    // Restore state
                    let state = table.state.loaded();
                    if ( state ) {
                        table.columns().every( function (idx) {
                            // search term
                            let colSearch = state.columns[idx].search;

                            visibleColumnsIndexes = []
                            table.columns(":visible").every(function (colIdx) {
                                visibleColumnsIndexes.push(colIdx);
                            });

                            // reverse index lookup based on ColReorder and ColVisibility
                            let inputIndex = state.ColReorder.findIndex(function(val) {return val === idx });
                            inputIndex = visibleColumnsIndexes.findIndex(function(val) {return val === inputIndex });

                            // search input/select
                            let searchElm = $('thead tr.filter-row td:eq(' + inputIndex + ') .search', $(table.table().container()));
                            if (searchElm.length) {
                                if (searchElm.get(0).tagName === 'SELECT') {
                                    searchElm.val(colSearch.search.slice(1, -1));
                                } else {
                                    searchElm.val(colSearch.search);
                                }
                            }

                            /*searchElm.each(function() {
                                if (this.tagName === 'SELECT') {
                                    this.value = colSearch.search.slice(1,-1);
                                } else {
                                    this.value = colSearch.search;
                                }
                            });*/

                        });
                    }

                }

            };

            // attach DataTable
            $('.datatable-Test').DataTable(dtOverrideGlobals);

        });
    </script>
@endsection
