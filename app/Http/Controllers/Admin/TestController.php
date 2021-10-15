<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTestRequest;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Mail\TestCompleted;
use App\Models\Centre;
use App\Models\Service;
use App\Models\Test;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TestController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('test_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Test::with(['service', 'centre'])->select(sprintf('%s.*', (new Test())->table));

            if ($request->user()->centre_id) {
                $query = $query->where('centre_id', $request->user()->centre_id);
            }

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'test_show';
                $editGate = 'test_edit';
                $deleteGate = 'test_delete';
                $crudRoutePart = 'tests';

                return view('admin.tests.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ?: '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Test::STATUS_SELECT[$row->status] : '';
            });
            $table->addColumn('service_name', function ($row) {
                return $row->service ? $row->service->name : '';
            });

            $table->editColumn('pinrc', function ($row) {
                return $row->pinrc ?: '';
            });
            $table->editColumn('pinid', function ($row) {
                return $row->pinid ?: '';
            });
            $table->editColumn('firstname', function ($row) {
                return $row->firstname ?: '';
            });
            $table->editColumn('lastname', function ($row) {
                return $row->lastname ?: '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ?: '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ?: '';
            });

            $table->editColumn('dob', function ($row) {
                return $row->dob ? Carbon::createFromFormat(
                    config('panel.date_format'),
                    $row->dob)->tz('Europe/Bratislava')->format('d/m/Y') : '';
            });

            $table->editColumn('created_at', function ($row) {
                return $row->created_at ? Carbon::createFromFormat(
                    config('panel.date_format') . ' ' . config('panel.time_format'),
                    $row->created_at)->tz('Europe/Bratislava')->format('d/m/Y H:i:s') : '';
            });

            $table->editColumn('start', function ($row) {
                return $row->start ? Carbon::createFromFormat(
                    config('panel.date_format') . ' ' . config('panel.time_format'),
                    $row->start)->tz('Europe/Bratislava')->format('d/m/Y H:i:s') : '';
            });

            $table->editColumn('end', function ($row) {
                return $row->end ? Carbon::createFromFormat(
                    config('panel.date_format') . ' ' . config('panel.time_format'),
                    $row->end)->tz('Europe/Bratislava')->format('d/m/Y H:i:s') : '';
            });

            $table->editColumn('street', function ($row) {
                return $row->street ?: '';
            });
            $table->editColumn('city', function ($row) {
                return $row->city ?: '';
            });
            $table->editColumn('postal', function ($row) {
                return $row->postal ?: '';
            });
            $table->editColumn('country', function ($row) {
                return $row->country ?: '';
            });
            $table->editColumn('symptoms', function ($row) {
                return $row->symptoms ? Test::SYMPTOMS_SELECT[$row->symptoms] : '';
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

            $table->editColumn('result_date', function ($row) {
                return $row->result_date ? Carbon::createFromFormat(
                    config('panel.date_format') . ' ' . config('panel.time_format'),
                    $row->result_date)->tz('Europe/Bratislava')->format('d/m/Y H:i:s') : '';
            });

            $table->addColumn('centre_name', function ($row) {
                return $row->centre ? $row->centre->name : '';
            });

            $table->editColumn('note', function ($row) {
                return $row->note ?: '';
            });
            $table->editColumn('reservation_id_ref', function ($row) {
                return $row->reservation_id_ref ?: '';
            });
            $table->editColumn('code_ref', function ($row) {
                return $row->code_ref ?: '';
            });
            $table->editColumn('insurance_company', function ($row) {
                return $row->insurance_company ?: '';
            });

            $table->rawColumns(['actions', 'placeholder', 'service', 'centre']);

            return $table->make(true);
        }

        $services = Service::get();
        $centres  = Centre::get();

        return view('admin.tests.index', compact('services', 'centres'));
    }

    public function create()
    {
        abort_if(Gate::denies('test_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $centres = Centre::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tests.create', compact('services', 'centres'));
    }

    public function store(StoreTestRequest $request)
    {
        $test = Test::create($request->all());

        return redirect()->route('admin.tests.index');
    }

    public function edit(Test $test)
    {
        abort_if(Gate::denies('test_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::pluck('name', 'id')/*->prepend(trans('global.pleaseSelect'), '')*/;

        $centres = Centre::pluck('name', 'id')/*->prepend(trans('global.pleaseSelect'), '')*/;

        $test->load('service', 'centre');

        return view('admin.tests.edit', compact('services', 'centres', 'test'));
    }

    public function update(UpdateTestRequest $request, Test $test)
    {
        $test->update($request->all());

        return redirect()->route('admin.tests.index');
    }

    public function show(Test $test)
    {
        abort_if(Gate::denies('test_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $test->load('service', 'centre');

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

    public function email(Request $request, $code_ref)
    {
        $test = Test::where('code_ref', $code_ref)->firstOrFail();
        abort_if(!$test->isTested(), Response::HTTP_FORBIDDEN,'403 Forbidden');

        Mail::to($test)->send(new TestCompleted($test));

        return view('admin.tests.email', compact('test'));
    }

    public function pdf(Request $request, $code_ref)
    {
        $test = Test::where('code_ref', $code_ref)->firstOrFail();
        abort_if(!$test->isTested(), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $qrcode = base64_encode(QrCode::format('png')->size(200)->generate(route('verify', $code_ref)));
        $pdf = PDF::loadView('certificate', compact('test', 'qrcode'));

        return $pdf->stream($code_ref . '.pdf');
    }
}
