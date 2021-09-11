@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.test.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.id') }}
                        </th>
                        <td>
                            {{ $test->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Test::STATUS_SELECT[$test->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.service') }}
                        </th>
                        <td>
                            {{ $test->service->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.start') }}
                        </th>
                        <td>
                            {{ $test->start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.end') }}
                        </th>
                        <td>
                            {{ $test->end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.pinrc') }}
                        </th>
                        <td>
                            {{ $test->pinrc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.pinid') }}
                        </th>
                        <td>
                            {{ $test->pinid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.firstname') }}
                        </th>
                        <td>
                            {{ $test->firstname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.lastname') }}
                        </th>
                        <td>
                            {{ $test->lastname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.email') }}
                        </th>
                        <td>
                            {{ $test->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.phone') }}
                        </th>
                        <td>
                            {{ $test->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.dob') }}
                        </th>
                        <td>
                            {{ $test->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.street') }}
                        </th>
                        <td>
                            {{ $test->street }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.city') }}
                        </th>
                        <td>
                            {{ $test->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.postal') }}
                        </th>
                        <td>
                            {{ $test->postal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.country') }}
                        </th>
                        <td>
                            {{ $test->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.symptoms') }}
                        </th>
                        <td>
                            {{ App\Models\Test::SYMPTOMS_SELECT[$test->symptoms] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.result_date') }}
                        </th>
                        <td>
                            {{ $test->result_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.result_status') }}
                        </th>
                        <td>
                            {{ App\Models\Test::RESULT_STATUS_SELECT[$test->result_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.result_test_name') }}
                        </th>
                        <td>
                            {{ App\Models\Test::RESULT_TEST_NAME_SELECT[$test->result_test_name] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.result_test_manufacturer') }}
                        </th>
                        <td>
                            {{ App\Models\Test::RESULT_TEST_MANUFACTURER_SELECT[$test->result_test_manufacturer] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.result_diagnosis') }}
                        </th>
                        <td>
                            {{ App\Models\Test::RESULT_DIAGNOSIS_SELECT[$test->result_diagnosis] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.centre') }}
                        </th>
                        <td>
                            {{ $test->centre->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.note') }}
                        </th>
                        <td>
                            {{ $test->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.reservation_id_ref') }}
                        </th>
                        <td>
                            {{ $test->reservation_id_ref }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.code_ref') }}
                        </th>
                        <td>
                            {{ $test->code_ref }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection