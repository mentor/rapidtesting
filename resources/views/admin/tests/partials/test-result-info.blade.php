<div class="card">

    <div class="card-header font-weight-bold">
        {{ $test->code_ref }} ({{ $test->firstname . ' ' . $test->lastname }})
    </div>

    <form method="POST" action="{{ route("admin.tests.update", [$test->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="required" for="service_id">{{ trans('cruds.test.fields.service') }}</label>
                        <select class="form-control select2 {{ $errors->has('service') ? 'is-invalid' : '' }}"
                                name="service_id"
                                id="service_id" required>
                            <option value
                                    disabled {{ old('service_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach($services as $id => $entry)
                                <option
                                    value="{{ $id }}" {{ (old('service_id') ? old('service_id') : $test->service->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('service'))
                            <div class="invalid-feedback">
                                {{ $errors->first('service') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>{{ trans('cruds.test.fields.result_diagnosis') }}</label>
                        <select class="form-control select2 {{ $errors->has('result_diagnosis') ? 'is-invalid' : '' }}"
                                name="result_diagnosis" id="result_diagnosis">
                        <!--                    <option value disabled {{ old('result_diagnosis', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>-->
                            @foreach(App\Models\Test::RESULT_DIAGNOSIS_SELECT as $key => $label)
                                <option
                                    value="{{ $key }}" {{ old('result_diagnosis', $test->result_diagnosis) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('result_diagnosis'))
                            <div class="invalid-feedback">
                                {{ $errors->first('result_diagnosis') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label class="required">{{ trans('cruds.test.fields.symptoms') }}</label>
                        <select class="form-control select2 {{ $errors->has('symptoms') ? 'is-invalid' : '' }}"
                                name="symptoms"
                                id="symptoms" required>
                            <option value
                                    disabled {{ old('symptoms', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Test::SYMPTOMS_SELECT as $key => $label)
                                <option
                                    value="{{ $key }}" {{ old('symptoms', $test->symptoms) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('symptoms'))
                            <div class="invalid-feedback">
                                {{ $errors->first('symptoms') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label class="required"
                               for="insurance_company">{{ trans('cruds.test.fields.insurance_company') }}</label>
                        <input class="form-control {{ $errors->has('insurance_company') ? 'is-invalid' : '' }}"
                               type="text"
                               name="insurance_company" id="insurance_company"
                               value="{{ old('insurance_company', $test->insurance_company) }}" required>
                        @if($errors->has('insurance_company'))
                            <div class="invalid-feedback">
                                {{ $errors->first('insurance_company') }}
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="note">{{ trans('cruds.test.fields.note') }}</label>
                        <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note"
                                  id="note">{{ old('note', $test->note) }}</textarea>
                        @if($errors->has('note'))
                            <div class="invalid-feedback">
                                {{ $errors->first('note') }}
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>{{ trans('cruds.test.fields.result_test_manufacturer') }}</label>
                        <select
                            class="form-control select2 {{ $errors->has('result_test_manufacturer') ? 'is-invalid' : '' }}"
                            name="result_test_manufacturer" id="result_test_manufacturer">
                            <option value
                                    disabled {{ old('result_test_manufacturer', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Test::RESULT_TEST_MANUFACTURER_SELECT as $key => $label)
                                <option
                                    value="{{ $key }}" {{ old('result_test_manufacturer', $test->result_test_manufacturer) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                        <select class="form-control select2 {{ $errors->has('result_test_name') ? 'is-invalid' : '' }}"
                                name="result_test_name" id="result_test_name">
                            <option value
                                    disabled {{ old('result_test_name', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Test::RESULT_TEST_NAME_SELECT as $key => $label)
                                <option
                                    value="{{ $key }}" {{ old('result_test_name', $test->result_test_name) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('result_test_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('result_test_name') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label for="result_date">{{ trans('cruds.test.fields.result_date') }}</label>
                        <input class="form-control datetime {{ $errors->has('result_date') ? 'is-invalid' : '' }}"
                               type="text"
                               name="result_date" id="result_date" value="{{ old('result_date', $test->result_date) }}">
                        @if($errors->has('result_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('result_date') }}
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>{{ trans('cruds.test.fields.result_status') }}</label>
                        <select class="form-control select2 {{ $errors->has('result_status') ? 'is-invalid' : '' }}"
                                name="result_status" id="result_status">
                            <option value
                                    disabled {{ old('result_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Test::RESULT_STATUS_SELECT as $key => $label)
                                <option
                                    value="{{ $key }}" {{ old('result_status', $test->result_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('result_status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('result_status') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>



    </div>
        <div class="card-footer">
            <div class="button-group">
                <div class="form-group">
                    <input type="hidden" name="redirect_back"
                           value="{{ old('redirect_back', url()->previous('admin.tests.index')) }}"/>
                    <a class="btn btn-outline-info"
                       href="{{ old('redirect_back', url()->previous('admin.tests.index')) }}">
                        {{ trans('global.back') }}
                    </a>
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                    @if($test->isTested())
                        <a style="color: white;" class="btn btn-success" data-toggle="modal"
                           data-target="#sendEmailModal" data-url="{{ route('admin.tests.email', $test->code_ref) }}"
                           data-email="{{ $test->email }}" data-ref="{{ $test->code_ref }}">
                            Email
                        </a>
                        <a class="btn btn-success" target="_blank"
                           href="{{ route('admin.tests.pdf', $test->code_ref) }}">
                            Vytlačiť
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
