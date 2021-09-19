@extends('layouts.admin')
@section('content')

<form method="POST" action="{{ route("admin.tests.update", [$test->id]) }}" enctype="multipart/form-data">
@method('PUT')
@csrf
    <div class="row">
        <div class="col-md-6">
            @include('partials.test-result-info')
        </div>
        <div class="col-md-6">
            @include('partials.test-user-info')
        </div>
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
                $test_names_dropdown.append('<option value="">{{ trans('global.pleaseSelect') }}</option>');
                accepted_keys.forEach(function(key) {
                    $test_names_dropdown.append('<option value="'+ key + '">'+ test_names[key] +'</option>');
                });
                //console.log(res);

                // $('#result_test_name').empty();
                // $('#result_test_name').append(`<option value="${optionValue}">
                //                        ${optionText}
                //                   </option>`);

            });
            $('#result_test_manufacturer').trigger('change');
            //console.log(manufacturers, test_names);
        });
    </script>
@endsection
