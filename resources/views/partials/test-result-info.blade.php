<div class="card">
    <div class="card-header">
        {{ trans('cruds.test.title_edit_result') }}
    </div>

    <div class="card-body">

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
            <label>{{ trans('cruds.test.fields.result_diagnosis') }}</label>
            <select class="form-control {{ $errors->has('result_diagnosis') ? 'is-invalid' : '' }}" name="result_diagnosis" id="result_diagnosis">
            <!--                    <option value disabled {{ old('result_diagnosis', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>-->
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
            <button class="btn btn-danger" type="submit">
                {{ trans('global.save') }}
            </button>
        </div>

    </div>
</div>