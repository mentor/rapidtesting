<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Test',
            'date_field' => 'start',
            'field'      => 'code_ref',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.tests.edit',
            'scope'      => 'centre'
        ],
    ];

    public function index()
    {

        $events = [];
        foreach ($this->sources as $source) {
            $scoped = false;
            if (!empty($source['scope']) && (request()->user()->{$source['scope']})) {
                $scoped = true;
                $list = $source['model']
                    ::where($source['scope'].'_id', request()->user()->{$source['scope']}->id)
                    ->get();
            } else {
                $list = $source['model']::all();
            }
            foreach ($list as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix']
                        . ' ' . $model->{$source['field']}
                        . ' | ' . $model->name
                        . ($scoped ?  '' : ' | ' . $model->centre->name)
                        . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
