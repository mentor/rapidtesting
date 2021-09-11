@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.test.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tests.update", [$test->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.test.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $test->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="service_id">{{ trans('cruds.test.fields.service') }}</label>
                <select class="form-control select2 {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service_id" id="service_id" required>
                    @foreach($services as $id => $entry)
                        <option value="{{ $id }}" {{ (old('service_id') ? old('service_id') : $test->service->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('service'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.service_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start">{{ trans('cruds.test.fields.start') }}</label>
                <input class="form-control datetime {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start', $test->start) }}">
                @if($errors->has('start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end">{{ trans('cruds.test.fields.end') }}</label>
                <input class="form-control datetime {{ $errors->has('end') ? 'is-invalid' : '' }}" type="text" name="end" id="end" value="{{ old('end', $test->end) }}">
                @if($errors->has('end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.end_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pinrc">{{ trans('cruds.test.fields.pinrc') }}</label>
                <input class="form-control {{ $errors->has('pinrc') ? 'is-invalid' : '' }}" type="text" name="pinrc" id="pinrc" value="{{ old('pinrc', $test->pinrc) }}">
                @if($errors->has('pinrc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pinrc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.pinrc_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pinid">{{ trans('cruds.test.fields.pinid') }}</label>
                <input class="form-control {{ $errors->has('pinid') ? 'is-invalid' : '' }}" type="text" name="pinid" id="pinid" value="{{ old('pinid', $test->pinid) }}" required>
                @if($errors->has('pinid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pinid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.pinid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="firstname">{{ trans('cruds.test.fields.firstname') }}</label>
                <input class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" type="text" name="firstname" id="firstname" value="{{ old('firstname', $test->firstname) }}" required>
                @if($errors->has('firstname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('firstname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.firstname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lastname">{{ trans('cruds.test.fields.lastname') }}</label>
                <input class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" type="text" name="lastname" id="lastname" value="{{ old('lastname', $test->lastname) }}" required>
                @if($errors->has('lastname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lastname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.lastname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.test.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $test->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.test.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $test->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dob">{{ trans('cruds.test.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob', $test->dob) }}" required>
                @if($errors->has('dob'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dob') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="street">{{ trans('cruds.test.fields.street') }}</label>
                <input class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" type="text" name="street" id="street" value="{{ old('street', $test->street) }}" required>
                @if($errors->has('street'))
                    <div class="invalid-feedback">
                        {{ $errors->first('street') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.street_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.test.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $test->city) }}" required>
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="postal">{{ trans('cruds.test.fields.postal') }}</label>
                <input class="form-control {{ $errors->has('postal') ? 'is-invalid' : '' }}" type="text" name="postal" id="postal" value="{{ old('postal', $test->postal) }}" required>
                @if($errors->has('postal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('postal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.postal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="country">{{ trans('cruds.test.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', $test->country) }}" required>
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.test.fields.symptoms') }}</label>
                <select class="form-control {{ $errors->has('symptoms') ? 'is-invalid' : '' }}" name="symptoms" id="symptoms" required>
                    <option value disabled {{ old('symptoms', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::SYMPTOMS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('symptoms', $test->symptoms) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('symptoms'))
                    <div class="invalid-feedback">
                        {{ $errors->first('symptoms') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.symptoms_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="result_date">{{ trans('cruds.test.fields.result_date') }}</label>
                <input class="form-control datetime {{ $errors->has('result_date') ? 'is-invalid' : '' }}" type="text" name="result_date" id="result_date" value="{{ old('result_date', $test->result_date) }}">
                @if($errors->has('result_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('result_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.result_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.test.fields.result_status') }}</label>
                <select class="form-control {{ $errors->has('result_status') ? 'is-invalid' : '' }}" name="result_status" id="result_status">
                    <option value disabled {{ old('result_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::RESULT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('result_status', $test->result_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('result_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('result_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.result_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.test.fields.result_test_name') }}</label>
                <select class="form-control {{ $errors->has('result_test_name') ? 'is-invalid' : '' }}" name="result_test_name" id="result_test_name">
                    <option value disabled {{ old('result_test_name', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::RESULT_TEST_NAME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('result_test_name', $test->result_test_name) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('result_test_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('result_test_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.result_test_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.test.fields.result_test_manufacturer') }}</label>
                <select class="form-control {{ $errors->has('result_test_manufacturer') ? 'is-invalid' : '' }}" name="result_test_manufacturer" id="result_test_manufacturer">
                    <option value disabled {{ old('result_test_manufacturer', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::RESULT_TEST_MANUFACTURER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('result_test_manufacturer', $test->result_test_manufacturer) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('result_test_manufacturer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('result_test_manufacturer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.result_test_manufacturer_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.test.fields.result_diagnosis') }}</label>
                <select class="form-control {{ $errors->has('result_diagnosis') ? 'is-invalid' : '' }}" name="result_diagnosis" id="result_diagnosis">
                    <option value disabled {{ old('result_diagnosis', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Test::RESULT_DIAGNOSIS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('result_diagnosis', $test->result_diagnosis) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('result_diagnosis'))
                    <div class="invalid-feedback">
                        {{ $errors->first('result_diagnosis') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.result_diagnosis_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="centre_id">{{ trans('cruds.test.fields.centre') }}</label>
                <select class="form-control select2 {{ $errors->has('centre') ? 'is-invalid' : '' }}" name="centre_id" id="centre_id" required>
                    @foreach($centres as $id => $entry)
                        <option value="{{ $id }}" {{ (old('centre_id') ? old('centre_id') : $test->centre->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('centre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('centre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.centre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.test.fields.note') }}</label>
                <input class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" type="text" name="note" id="note" value="{{ old('note', $test->note) }}">
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reservation_id_ref">{{ trans('cruds.test.fields.reservation_id_ref') }}</label>
                <input class="form-control {{ $errors->has('reservation_id_ref') ? 'is-invalid' : '' }}" type="number" name="reservation_id_ref" id="reservation_id_ref" value="{{ old('reservation_id_ref', $test->reservation_id_ref) }}" step="1" required>
                @if($errors->has('reservation_id_ref'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reservation_id_ref') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.reservation_id_ref_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="code_ref">{{ trans('cruds.test.fields.code_ref') }}</label>
                <input class="form-control {{ $errors->has('code_ref') ? 'is-invalid' : '' }}" type="text" name="code_ref" id="code_ref" value="{{ old('code_ref', $test->code_ref) }}" required>
                @if($errors->has('code_ref'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code_ref') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.code_ref_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="insurance_company">{{ trans('cruds.test.fields.insurance_company') }}</label>
                <input class="form-control {{ $errors->has('insurance_company') ? 'is-invalid' : '' }}" type="text" name="insurance_company" id="insurance_company" value="{{ old('insurance_company', $test->insurance_company) }}" required>
                @if($errors->has('insurance_company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('insurance_company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.test.fields.insurance_company_helper') }}</span>
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