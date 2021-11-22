<?php

namespace App\Http\Requests;

use App\Models\Test;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('test_create');
    }

    public function rules()
    {
        return [
            'status' => [
                'required',
            ],
            'service_id' => [
                'required',
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
                'required',
            ],
            'firstname' => [
                'string',
                'required',
            ],
            'lastname' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'dob' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'street' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'postal' => [
                'string',
                'required',
            ],
            'country' => [
                'string',
                'required',
            ],
//            'symptoms' => [
//                'required',
//            ],
            'result_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'centre_id' => [
                'required',
                'integer',
            ],
            'note' => [
                'string',
                'nullable',
            ],
            'reservation_id_ref' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'code_ref' => [
                'string',
                'min:11',
                'max:11',
                'required',
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
