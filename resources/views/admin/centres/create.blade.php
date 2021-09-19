@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.centre.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.centres.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.centre.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label class="required" for="street">{{ trans('cruds.centre.fields.street') }}</label>
                <input class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" type="text" name="street" id="street" value="{{ old('street', '') }}" required>
                @if($errors->has('street'))
                    <div class="invalid-feedback">
                        {{ $errors->first('street') }}
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.centre.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}" required>
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label class="required" for="postal">{{ trans('cruds.centre.fields.postal') }}</label>
                <input class="form-control {{ $errors->has('postal') ? 'is-invalid' : '' }}" type="text" name="postal" id="postal" value="{{ old('postal', '') }}" required>
                @if($errors->has('postal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('postal') }}
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label class="required" for="place_id_ref">{{ trans('cruds.centre.fields.place_id_ref') }}</label>
                <input class="form-control {{ $errors->has('place_id_ref') ? 'is-invalid' : '' }}" type="number" name="place_id_ref" id="place_id_ref" value="{{ old('place_id_ref', '') }}" step="1" required>
                @if($errors->has('place_id_ref'))
                    <div class="invalid-feedback">
                        {{ $errors->first('place_id_ref') }}
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label class="required" for="country">{{ trans('cruds.centre.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}" required>
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
        </form>
    </div>
</div>



@endsection
