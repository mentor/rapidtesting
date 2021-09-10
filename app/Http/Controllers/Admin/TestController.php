<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTestRequest;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Models\Centre;
use App\Models\Test;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TestController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('test_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Test::with(['centre'])->select(sprintf('%s.*', (new Test())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'test_show';
                $editGate = 'test_edit';
                $deleteGate = 'test_delete';
                $crudRoutePart = 'tests';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('pinid', function ($row) {
                return $row->pinid ? $row->pinid : '';
            });
            $table->editColumn('pinrc', function ($row) {
                return $row->pinrc ? $row->pinrc : '';
            });
            $table->editColumn('firstname', function ($row) {
                return $row->firstname ? $row->firstname : '';
            });
            $table->editColumn('lastname', function ($row) {
                return $row->lastname ? $row->lastname : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });

            $table->editColumn('street', function ($row) {
                return $row->street ? $row->street : '';
            });
            $table->editColumn('city', function ($row) {
                return $row->city ? $row->city : '';
            });
            $table->editColumn('postal', function ($row) {
                return $row->postal ? $row->postal : '';
            });
            $table->editColumn('country', function ($row) {
                return $row->country ? $row->country : '';
            });
            $table->editColumn('symptoms', function ($row) {
                return $row->symptoms ? Test::SYMPTOMS_SELECT[$row->symptoms] : '';
            });
            $table->editColumn('result_type', function ($row) {
                return $row->result_type ? Test::RESULT_TYPE_SELECT[$row->result_type] : '';
            });

            $table->editColumn('result_status', function ($row) {
                return $row->result_status ? Test::RESULT_STATUS_SELECT[$row->result_status] : '';
            });
            $table->editColumn('result_test_name', function ($row) {
                return $row->result_test_name ? Test::RESULT_TEST_NAME_SELECT[$row->result_test_name] : '';
            });
            $table->editColumn('result_test_manufacturer', function ($row) {
                return $row->result_test_manufacturer ? Test::RESULT_TEST_MANUFACTURER_SELECT[$row->result_test_manufacturer] : '';
            });
            $table->editColumn('result_diagnosis', function ($row) {
                return $row->result_diagnosis ? Test::RESULT_DIAGNOSIS_SELECT[$row->result_diagnosis] : '';
            });
            $table->addColumn('centre_name', function ($row) {
                return $row->centre ? $row->centre->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'centre']);

            return $table->make(true);
        }

        $centres = Centre::get();

        return view('admin.tests.index', compact('centres'));
    }

    public function create()
    {
        abort_if(Gate::denies('test_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centres = Centre::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tests.create', compact('centres'));
    }

    public function store(StoreTestRequest $request)
    {
        $test = Test::create($request->all());

        return redirect()->route('admin.tests.index');
    }

    public function edit(Test $test)
    {
        abort_if(Gate::denies('test_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centres = Centre::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $test->load('centre');

        return view('admin.tests.edit', compact('centres', 'test'));
    }

    public function update(UpdateTestRequest $request, Test $test)
    {
        $test->update($request->all());

        return redirect()->route('admin.tests.index');
    }

    public function show(Test $test)
    {
        abort_if(Gate::denies('test_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $test->load('centre');

        return view('admin.tests.show', compact('test'));
    }

    public function destroy(Test $test)
    {
        abort_if(Gate::denies('test_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $test->delete();

        return back();
    }

    public function massDestroy(MassDestroyTestRequest $request)
    {
        Test::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
