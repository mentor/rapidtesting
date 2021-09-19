@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.service.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.services.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.service.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label class="required" for="service_id_ref">{{ trans('cruds.service.fields.service_id_ref') }}</label>
                <input class="form-control {{ $errors->has('service_id_ref') ? 'is-invalid' : '' }}" type="number" name="service_id_ref" id="service_id_ref" value="{{ old('service_id_ref', '') }}" step="1" required>
                @if($errors->has('service_id_ref'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service_id_ref') }}
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
