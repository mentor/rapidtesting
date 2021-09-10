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
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.centre.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="street">{{ trans('cruds.centre.fields.street') }}</label>
                <input class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" type="text" name="street" id="street" value="{{ old('street', $centre->street) }}">
                @if($errors->has('street'))
                    <span class="text-danger">{{ $errors->first('street') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.centre.fields.street_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.centre.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $centre->city) }}">
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.centre.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="postal">{{ trans('cruds.centre.fields.postal') }}</label>
                <input class="form-control {{ $errors->has('postal') ? 'is-invalid' : '' }}" type="text" name="postal" id="postal" value="{{ old('postal', $centre->postal) }}">
                @if($errors->has('postal'))
                    <span class="text-danger">{{ $errors->first('postal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.centre.fields.postal_helper') }}</span>
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