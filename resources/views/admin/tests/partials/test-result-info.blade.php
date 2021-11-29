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

{{--                    <div class="form-group">--}}
{{--                        <label class="required">{{ trans('cruds.test.fields.symptoms') }}</label>--}}
{{--                        <select class="form-control select2 {{ $errors->has('symptoms') ? 'is-invalid' : '' }}"--}}
{{--                                name="symptoms"--}}
{{--                                id="symptoms" required>--}}
{{--                            <option value--}}
{{--                                    disabled {{ old('symptoms', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>--}}
{{--                            @foreach(App\Models\Test::SYMPTOMS_SELECT as $key => $label)--}}
{{--                                <option--}}
{{--                                    value="{{ $key }}" {{ old('symptoms', $test->symptoms) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        @if($errors->has('symptoms'))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{ $errors->first('symptoms') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                    </div>--}}

                    <div class="form-group">
                        <label class=""
                               for="insurance_company">{{ trans('cruds.test.fields.insurance_company') }}</label>
                        <input class="form-control {{ $errors->has('insurance_company') ? 'is-invalid' : '' }}"
                               type="text"
                               name="insurance_company" id="insurance_company"
                               value="{{ old('insurance_company', $test->insurance_company) }}" >
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
                    <div class="form-group {{ $errors->has('presence') ? 'is-invalid' : '' }}">
                        <label>{{ trans('cruds.test.fields.presence') }}</label>
                        <div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-outline-success {{ $test->presence === 1 ? 'active' : ''}}">
                                    <input type="radio" name="presence" id="presence-true" value="1" {{ $test->presence === 1 ? 'checked' : ''}} />
                                    <span class="btn-icon fa fa-check"></span>
                                    {{ trans('cruds.test.fields.presence_true') }}
                                </label>
                                <label class="btn btn-outline-danger {{ $test->presence === 0 ? 'active' : ''}}">
                                    <input type="radio" name="presence" id="presence-false" value="0" {{ $test->presence === 0 ? 'checked' : ''}} />
                                    <span class="btn-icon fa fa-times"></span>
                                    {{ trans('cruds.test.fields.presence_false') }}
                                </label>
                            </div>
                        </div>
                        @if($errors->has('presence'))
                            <div class="invalid-feedback">
                                {{ $errors->first('presence') }}
                            </div>
                        @endif
                    </div>

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
                        <div>
                            <div class="btn-group btn-group-toggle {{ $errors->has('result_status') ? 'is-invalid' : '' }}" data-toggle="buttons">
                                @foreach(array_reverse(App\Models\Test::RESULT_STATUS_SELECT) as $key => $label)
                                    <label class="btn btn-outline-{{ $key == 'negative' ? 'success' : 'danger' }} {{ $test->result_status === $key ? 'active' : ''}}">
                                        <input type="radio" name="result_status" id="result_status-{{ $key }}" value="{{ $key }}"
                                            {{ $test->result_status === $key ? 'checked' : ''}} />
                                        @if($key === 'negative')
                                            <span class="btn-icon fas fa-heart"></span>
                                        @else
                                            <svg aria-hidden="true" height="16px" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M483.55,227.55H462c-50.68,0-76.07-61.27-40.23-97.11L437,115.19A28.44,28.44,0,0,0,396.8,75L381.56,90.22c-35.84,35.83-97.11,10.45-97.11-40.23V28.44a28.45,28.45,0,0,0-56.9,0V50c0,50.68-61.27,76.06-97.11,40.23L115.2,75A28.44,28.44,0,0,0,75,115.19l15.25,15.25c35.84,35.84,10.45,97.11-40.23,97.11H28.45a28.45,28.45,0,1,0,0,56.89H50c50.68,0,76.07,61.28,40.23,97.12L75,396.8A28.45,28.45,0,0,0,115.2,437l15.24-15.25c35.84-35.84,97.11-10.45,97.11,40.23v21.54a28.45,28.45,0,0,0,56.9,0V462c0-50.68,61.27-76.07,97.11-40.23L396.8,437A28.45,28.45,0,0,0,437,396.8l-15.25-15.24c-35.84-35.84-10.45-97.12,40.23-97.12h21.54a28.45,28.45,0,1,0,0-56.89ZM224,272a48,48,0,1,1,48-48A48,48,0,0,1,224,272Zm80,56a24,24,0,1,1,24-24A24,24,0,0,1,304,328Z"></path></svg>
                                        @endif

                                        {{ trans('cruds.test.fields.result_status_' . $key) }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
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
            @include('admin.tests.partials.footer-buttons', compact('test'))
        </div>
    </form>
</div>
