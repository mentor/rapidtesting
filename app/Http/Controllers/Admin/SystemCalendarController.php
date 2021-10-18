<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Test',
            'date_field' => 'start',
            'fields'      => 'code_ref,service.name,name',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.tests.edit',
            'scope'      => 'centre',
            'color_function'      => 'isTested'
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

                $titleList = [];
                foreach (explode(',', $source['fields']) as $field) {
                    $field = trim($field);
                    if (strpos($field, '.') !== false) {
                        list($one, $two) = explode('.', $field);
                        if ($model->{$one}->{$two}) {
                            $titleList[] = $model->{$one}->{$two};
                        }
                    } else {
                        if ($model->{$field}) {
                            $titleList[] = $model->{$field};
                        }
                    }
                }
                if (!$scoped) {
                    $titleList[] = $model->{$source['scope']}->name;
                }
               /* $title .=
                     ' | ' . $model->name
                    . ($scoped ?  '' : ' | ' . $model->{$source['scope']}->name) // only for admins
                    . ($scoped ?  '' :  ($model->isTested() ? ' | ' . Test::RESULT_STATUS_SELECT[$model->result_date]: ''))
                    . ($scoped ?  '' :  ($model->isTested() ? ' | ' . $model->result_date: ''))
                    . $source['suffix'];*/
                $title = implode(' | ', $titleList);
                $title = implode(' ', [$source['prefix'], $title, $source['suffix']]);

                if (!empty($source['color_function'])) {
                    $color = $model->{$source['color_function']}();
                    if (is_bool($color)) {
                        // default couloring
                        $color = $color ? 'green' : 'red';
                    }
                }
                $events[] = [
                    'title' => trim($title),
                    'backgroundColor' => $color,
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
