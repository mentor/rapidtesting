@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.centre.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.centres.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.centre.fields.id') }}
                        </th>
                        <td>
                            {{ $centre->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centre.fields.name') }}
                        </th>
                        <td>
                            {{ $centre->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centre.fields.street') }}
                        </th>
                        <td>
                            {{ $centre->street }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centre.fields.city') }}
                        </th>
                        <td>
                            {{ $centre->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centre.fields.postal') }}
                        </th>
                        <td>
                            {{ $centre->postal }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.centres.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection