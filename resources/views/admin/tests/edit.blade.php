@extends('layouts.admin')
@section('content')

<form method="POST" action="{{ route("admin.tests.update", [$test->id]) }}" enctype="multipart/form-data">
@method('PUT')
@csrf

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-test-result-tab"
                    data-toggle="tab" data-target="#nav-test-result" type="button"
                    role="tab" aria-controls="nav-test-result" aria-selected="true">{{ trans('cruds.test.title_edit_result') }}</button>
            <button class="nav-link" id="nav-test-user-tab"
                    data-toggle="tab" data-target="#nav-test-user" type="button"
                    role="tab" aria-controls="nav-test-user" aria-selected="false">{{ trans('cruds.test.title_edit_user') }}</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-test-result" role="tabpanel" aria-labelledby="nav-test-result-tab">@include('admin.tests.partials.test-result-info')</div>
        <div class="tab-pane fade" id="nav-test-user" role="tabpanel" aria-labelledby="nav-test-user-tab">@include('admin.tests.partials.test-user-info')</div>
    </div>
</form>
@endsection
@section('scripts')
@parent
    <script type="text/javascript">
        $(function () {
            var test_names = {!! collect(App\Models\Test::RESULT_TEST_NAME_SELECT)->toJson() !!};

            $('#result_test_manufacturer').on('change', function () {
                var val = $(this).val();
                var accepted_keys = Object.keys(test_names).filter(function(key) { return key.startsWith(val) });

                var $test_names_dropdown = $('#result_test_name');
                $test_names_dropdown.empty();
                $test_names_dropdown.append('<option disabled value="">{{ trans('global.pleaseSelect') }}</option>');
                accepted_keys.forEach(function(key) {
                    $test_names_dropdown.append('<option value="'+ key + '">'+ test_names[key] +'</option>');
                });

            });
            $('#result_test_manufacturer').trigger('change');
            $('#result_test_manufacturer').val('{{ $test->result_test_manufacturer }}');
            $('#result_test_name').val('{{ $test->result_test_name }}');
        });
    </script>
@endsection
