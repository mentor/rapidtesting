<?php

namespace App\Http\Requests;

use App\Models\Test;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateTestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('test_edit');
    }

    public function rules()
    {
        return [
            'status' => [
                'string',
            ],
            'service_id' => [
                'integer',
            ],
            'start' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'end' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'pinrc' => [
                'string',
                'min:10',
                'max:11',
                'nullable',
            ],
            'pinid' => [
                'string',
            ],
            'firstname' => [
                'string',
            ],
            'lastname' => [
                'string',
            ],
            'email' => [
                'email',
            ],
            'phone' => [
                'string',
            ],
            'dob' => [
                'date_format:' . config('panel.date_format'),
            ],
            'street' => [
                'string',
            ],
            'city' => [
                'string',
            ],
            'postal' => [
                'string',
            ],
            'country' => [
                'string',
            ],
//            'symptoms' => [
//                'string',
//            ],
            'result_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'centre_id' => [
                'integer',
            ],
            'note' => [
                'string',
                'nullable',
            ],
            'reservation_id_ref' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'code_ref' => [
                'string',
                'min:11',
                'max:11',
            ],
            'insurance_company' => [
                'string',
            ],
            'presence' => [
                'boolean',
            ],
        ];
    }
}
