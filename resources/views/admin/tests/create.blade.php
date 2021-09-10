@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.test.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tests.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="pinid">{{ trans('cruds.test.fields.pinid') }}</label>
                <input class="form-control {{ $errors->has('pinid') ? 'is-invalid' : '' }}" type="text" name="pinid" id="pinid" value="{{ old('pinid', '') }}" required>
                @if($errors->has('pinid'))
                    <span class="text-danger">{{ $errors->first('pinid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.pinid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pinrc">{{ trans('cruds.test.fields.pinrc') }}</label>
                <input class="form-control {{ $errors->has('pinrc') ? 'is-invalid' : '' }}" type="text" name="pinrc" id="pinrc" value="{{ old('pinrc', '') }}">
                @if($errors->has('pinrc'))
                    <span class="text-danger">{{ $errors->first('pinrc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.pinrc_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="firstname">{{ trans('cruds.test.fields.firstname') }}</label>
                <input class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" type="text" name="firstname" id="firstname" value="{{ old('firstname', '') }}" required>
                @if($errors->has('firstname'))
                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.firstname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lastname">{{ trans('cruds.test.fields.lastname') }}</label>
                <input class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" type="text" name="lastname" id="lastname" value="{{ old('lastname', '') }}" required>
                @if($errors->has('lastname'))
                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.lastname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.test.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.test.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dob">{{ trans('cruds.test.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob') }}" required>
                @if($errors->has('dob'))
                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="street">{{ trans('cruds.test.fields.street') }}</label>
                <input class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" type="text" name="street" id="street" value="{{ old('street', '') }}" required>
                @if($errors->has('street'))
                    <span class="text-danger">{{ $errors->first('street') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.street_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.test.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}" required>
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="postal">{{ trans('cruds.test.fields.postal') }}</label>
                <input class="form-control {{ $errors->has('postal') ? 'is-invalid' : '' }}" type="text" name="postal" id="postal" value="{{ old('postal', '') }}" required>
                @if($errors->has('postal'))
                    <span class="text-danger">{{ $errors->first('postal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.postal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="country">{{ trans('cruds.test.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}" required>
                @if($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.test.fields.symptoms') }}</label>
                <select class="form-control {{ $errors->has('symptoms') ? 'is-invalid' : '' }}" name="symptoms" id="symptoms" required>
                    <option value disabled {{ old('symptoms', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::SYMPTOMS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('symptoms', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('symptoms'))
                    <span class="text-danger">{{ $errors->first('symptoms') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.symptoms_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.test.fields.result_type') }}</label>
                <select class="form-control {{ $errors->has('result_type') ? 'is-invalid' : '' }}" name="result_type" id="result_type" required>
                    <option value disabled {{ old('result_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::RESULT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('result_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('result_type'))
                    <span class="text-danger">{{ $errors->first('result_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.result_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="result_date">{{ trans('cruds.test.fields.result_date') }}</label>
                <input class="form-control datetime {{ $errors->has('result_date') ? 'is-invalid' : '' }}" type="text" name="result_date" id="result_date" value="{{ old('result_date') }}">
                @if($errors->has('result_date'))
                    <span class="text-danger">{{ $errors->first('result_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.result_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.test.fields.result_status') }}</label>
                <select class="form-control {{ $errors->has('result_status') ? 'is-invalid' : '' }}" name="result_status" id="result_status">
                    <option value disabled {{ old('result_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::RESULT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('result_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('result_status'))
                    <span class="text-danger">{{ $errors->first('result_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.result_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.test.fields.result_test_name') }}</label>
                <select class="form-control {{ $errors->has('result_test_name') ? 'is-invalid' : '' }}" name="result_test_name" id="result_test_name">
                    <option value disabled {{ old('result_test_name', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::RESULT_TEST_NAME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('result_test_name', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('result_test_name'))
                    <span class="text-danger">{{ $errors->first('result_test_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.result_test_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.test.fields.result_test_manufacturer') }}</label>
                <select class="form-control {{ $errors->has('result_test_manufacturer') ? 'is-invalid' : '' }}" name="result_test_manufacturer" id="result_test_manufacturer">
                    <option value disabled {{ old('result_test_manufacturer', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::RESULT_TEST_MANUFACTURER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('result_test_manufacturer', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('result_test_manufacturer'))
                    <span class="text-danger">{{ $errors->first('result_test_manufacturer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.result_test_manufacturer_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.test.fields.result_diagnosis') }}</label>
                <select class="form-control {{ $errors->has('result_diagnosis') ? 'is-invalid' : '' }}" name="result_diagnosis" id="result_diagnosis">
                    <option value disabled {{ old('result_diagnosis', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::RESULT_DIAGNOSIS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('result_diagnosis', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('result_diagnosis'))
                    <span class="text-danger">{{ $errors->first('result_diagnosis') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.result_diagnosis_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="centre_id">{{ trans('cruds.test.fields.centre') }}</label>
                <select class="form-control select2 {{ $errors->has('centre') ? 'is-invalid' : '' }}" name="centre_id" id="centre_id" required>
                    @foreach($centres as $id => $entry)
                        <option value="{{ $id }}" {{ old('centre_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('centre'))
                    <span class="text-danger">{{ $errors->first('centre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.centre_helper') }}</span>
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