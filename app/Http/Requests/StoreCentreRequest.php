<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreCentreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('centre_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:centres',
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
            'place_id_ref' => [
                'required',
                'integer',
                'unique:centres,place_id_ref',
            ],
            'country' => [
                'string',
                'required',
            ],
            'result_test_manufacturer' => [
                'string',
            ],
            'result_test_name' => [
                'string',
            ],
        ];
    }
}
