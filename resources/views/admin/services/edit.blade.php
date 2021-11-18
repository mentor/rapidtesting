@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.service.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.services.update", [$service->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.service.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $service->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label class="required" for="service_id_ref">{{ trans('cruds.service.fields.service_id_ref') }}</label>
                <select class="form-control select2 {{ $errors->has('service_id_ref') ? 'is-invalid' : '' }}" name="service_id_ref" id="service_id_ref" required>
                    @foreach(app(\App\Services\ReenioService::class)->getServices()->json('list') as $reenioService)
                        <option value="{{ $reenioService['id'] }}" {{ old('service_id_ref', $service->service_id_ref) == $reenioService['id'] ? 'selected' : '' }}>{{ $reenioService['id'] . ' | ' .  $reenioService['name'] }}</option>
                    @endforeach
                </select>
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
