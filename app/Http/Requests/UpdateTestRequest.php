<?php

namespace App\Http\Requests;

use App\Models\Test;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('test_edit');
    }

    public function rules()
    {
        return [
            'pinid' => [
                'string',
                'required',
            ],
            'pinrc' => [
                'string',
                'min:10',
                'max:11',
                'nullable',
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
            'symptoms' => [
                'required',
            ],
            'result_type' => [
                'required',
            ],
            'result_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'centre_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
