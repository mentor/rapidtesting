@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.centre.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.centres.update", [$centre->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.centre.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $centre->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label class="required" for="street">{{ trans('cruds.centre.fields.street') }}</label>
                <input class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" type="text" name="street" id="street" value="{{ old('street', $centre->street) }}" required>
                @if($errors->has('street'))
                    <div class="invalid-feedback">
                        {{ $errors->first('street') }}
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.centre.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $centre->city) }}" required>
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label class="required" for="postal">{{ trans('cruds.centre.fields.postal') }}</label>
                <input class="form-control {{ $errors->has('postal') ? 'is-invalid' : '' }}" type="text" name="postal" id="postal" value="{{ old('postal', $centre->postal) }}" required>
                @if($errors->has('postal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('postal') }}
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label class="required" for="place_id_ref">{{ trans('cruds.centre.fields.place_id_ref') }}</label>
                <input class="form-control {{ $errors->has('place_id_ref') ? 'is-invalid' : '' }}" type="number" name="place_id_ref" id="place_id_ref" value="{{ old('place_id_ref', $centre->place_id_ref) }}" step="1" required>
                @if($errors->has('place_id_ref'))
                    <div class="invalid-feedback">
                        {{ $errors->first('place_id_ref') }}
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label class="required" for="country">{{ trans('cruds.centre.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', $centre->country) }}" required>
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif

            </div>

            <div class="form-group">
                <label>{{ trans('cruds.test.fields.result_test_manufacturer') }}</label>
                <select class="form-control select2 {{ $errors->has('result_test_manufacturer') ? 'is-invalid' : '' }}" name="result_test_manufacturer" id="result_test_manufacturer">
                    <option value disabled {{ old('result_test_manufacturer', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::RESULT_TEST_MANUFACTURER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('result_test_manufacturer', $centre->result_test_manufacturer) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('result_test_manufacturer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('result_test_manufacturer') }}
                    </div>
                @endif

            </div>

            <div class="form-group">
                <label>{{ trans('cruds.test.fields.result_test_name') }}</label>
                <select class="form-control select2 {{ $errors->has('result_test_name') ? 'is-invalid' : '' }}" name="result_test_name" id="result_test_name">
                    <option value disabled {{ old('result_test_name', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::RESULT_TEST_NAME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('result_test_name', $centre->result_test_name) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('result_test_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('result_test_name') }}
                    </div>
                @endif

            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    @parent
    <script type="text/javascript">
        $(function () {
            var test_names = {!! collect(App\Models\Test::RESULT_TEST_NAME_SELECT)->toJson() !!};

            $('#result_test_manufacturer').val('{{ $centre->result_test_manufacturer }}');
            $('#result_test_name').val('{{ $centre->result_test_name }}');

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

        });
    </script>
@endsection
