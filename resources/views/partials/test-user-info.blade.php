<div class="card">
    <div class="card-header font-weight-bold">
        {{ trans('cruds.test.title_edit_user') }}
    </div>

    <div class="card-body">

        <div class="form-group">
            <label class="required" for="centre_id">{{ trans('cruds.test.fields.centre') }}</label>
            <div>{{ $test->centre->name }}</div>
            {{--            <select readonly class="form-control select2 {{ $errors->has('centre') ? 'is-invalid' : '' }}" name="centre_id" id="centre_id" required>--}}
            {{--                @foreach($centres as $id => $entry)--}}
            {{--                    <option value="{{ $id }}" {{ (old('centre_id') ? old('centre_id') : $test->centre->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>--}}
            {{--                @endforeach--}}
            {{--            </select>--}}
            @if($errors->has('centre'))
                <div class="invalid-feedback">
                    {{ $errors->first('centre') }}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label class="required" for="reservation_id_ref">{{ trans('cruds.test.fields.reservation_id_ref') }}</label>
            <div>{{ $test->reservation_id_ref }}</div>
            {{--            <input readonly class="form-control {{ $errors->has('reservation_id_ref') ? 'is-invalid' : '' }}" type="number" name="reservation_id_ref" id="reservation_id_ref" value="{{ old('reservation_id_ref', $test->reservation_id_ref) }}" step="1" required>--}}
            @if($errors->has('reservation_id_ref'))
                <div class="invalid-feedback">
                    {{ $errors->first('reservation_id_ref') }}
                </div>
            @endif

        </div>
        <div class="form-group">
            <label class="required" for="code_ref">{{ trans('cruds.test.fields.code_ref') }}</label>
            <div>{{ $test->code_ref }}</div>
            {{--            <input readonly class="form-control {{ $errors->has('code_ref') ? 'is-invalid' : '' }}" type="text" name="code_ref" id="code_ref" value="{{ old('code_ref', $test->code_ref) }}" required>--}}
            @if($errors->has('code_ref'))
                <div class="invalid-feedback">
                    {{ $errors->first('code_ref') }}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label class="required">{{ trans('cruds.test.fields.status') }}</label>
            <div class="font-weight-bold text-uppercase">{{ $test->status }}</div>
{{--            <select readonly class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>--}}
{{--                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>--}}
{{--                @foreach(App\Models\Test::STATUS_SELECT as $key => $label)--}}
{{--                    <option value="{{ $key }}" {{ old('status', $test->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
            @if($errors->has('status'))
                <div class="invalid-feedback">
                    {{ $errors->first('status') }}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label for="start">{{ trans('cruds.test.fields.start') }}</label>
            <div>{{ \Carbon\Carbon::parse($test->start)->format('d.m.Y H:i:s') }}</div>
{{--            <input readonly class="form-control datetime {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start', $test->start) }}">--}}
            @if($errors->has('start'))
                <div class="invalid-feedback">
                    {{ $errors->first('start') }}
                </div>
            @endif

        </div>
        <div class="form-group">
            <label for="end">{{ trans('cruds.test.fields.end') }}</label>
            <div>{{ $test->end }}</div>
{{--            <input readonly class="form-control datetime {{ $errors->has('end') ? 'is-invalid' : '' }}" type="text" name="end" id="end" value="{{ old('end', $test->end) }}">--}}
            @if($errors->has('end'))
                <div class="invalid-feedback">
                    {{ $errors->first('end') }}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label class="required" for="firstname">{{ trans('cruds.test.fields.firstname') }}</label>
            <input class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" type="text" name="firstname" id="firstname" value="{{ old('firstname', $test->firstname) }}" required>
            @if($errors->has('firstname'))
                <div class="invalid-feedback">
                    {{ $errors->first('firstname') }}
                </div>
            @endif

        </div>
        <div class="form-group">
            <label class="required" for="lastname">{{ trans('cruds.test.fields.lastname') }}</label>
            <input class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" type="text" name="lastname" id="lastname" value="{{ old('lastname', $test->lastname) }}" required>
            @if($errors->has('lastname'))
                <div class="invalid-feedback">
                    {{ $errors->first('lastname') }}
                </div>
            @endif

        </div>
        <div class="form-group">
            <label class="required" for="email">{{ trans('cruds.test.fields.email') }}</label>
            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $test->email) }}" required>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif

        </div>
        <div class="form-group">
            <label class="required" for="phone">{{ trans('cruds.test.fields.phone') }}</label>
            <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $test->phone) }}" required>
            @if($errors->has('phone'))
                <div class="invalid-feedback">
                    {{ $errors->first('phone') }}
                </div>
            @endif

        </div>
        <div class="form-group">
            <label class="required" for="dob">{{ trans('cruds.test.fields.dob') }}</label>
            <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob', $test->dob) }}" required>
            @if($errors->has('dob'))
                <div class="invalid-feedback">
                    {{ $errors->first('dob') }}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label for="pinrc">{{ trans('cruds.test.fields.pinrc') }}</label>
            <input class="form-control {{ $errors->has('pinrc') ? 'is-invalid' : '' }}" type="text" name="pinrc" id="pinrc" value="{{ old('pinrc', $test->pinrc) }}">
            @if($errors->has('pinrc'))
                <div class="invalid-feedback">
                    {{ $errors->first('pinrc') }}
                </div>
            @endif

        </div>
        <div class="form-group">
            <label class="required" for="pinid">{{ trans('cruds.test.fields.pinid') }}</label>
            <input class="form-control {{ $errors->has('pinid') ? 'is-invalid' : '' }}" type="text" name="pinid" id="pinid" value="{{ old('pinid', $test->pinid) }}" required>
            @if($errors->has('pinid'))
                <div class="invalid-feedback">
                    {{ $errors->first('pinid') }}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label class="required" for="street">{{ trans('cruds.test.fields.street') }}</label>
            <input class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" type="text" name="street" id="street" value="{{ old('street', $test->street) }}" required>
            @if($errors->has('street'))
                <div class="invalid-feedback">
                    {{ $errors->first('street') }}
                </div>
            @endif

        </div>
        <div class="form-group">
            <label class="required" for="city">{{ trans('cruds.test.fields.city') }}</label>
            <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $test->city) }}" required>
            @if($errors->has('city'))
                <div class="invalid-feedback">
                    {{ $errors->first('city') }}
                </div>
            @endif

        </div>
        <div class="form-group">
            <label class="required" for="postal">{{ trans('cruds.test.fields.postal') }}</label>
            <input class="form-control {{ $errors->has('postal') ? 'is-invalid' : '' }}" type="text" name="postal" id="postal" value="{{ old('postal', $test->postal) }}" required>
            @if($errors->has('postal'))
                <div class="invalid-feedback">
                    {{ $errors->first('postal') }}
                </div>
            @endif

        </div>
        <div class="form-group">
            <label class="required" for="country">{{ trans('cruds.test.fields.country') }}</label>
            <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', $test->country) }}" required>
            @if($errors->has('country'))
                <div class="invalid-feedback">
                    {{ $errors->first('country') }}
                </div>
            @endif

        </div>

        <div class="form-group">
            <button class="btn btn-danger" type="submit">
                {{ trans('global.save') }}
            </button>
        </div>
    </div>
</div>
