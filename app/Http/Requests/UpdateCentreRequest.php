<?php

namespace App\Http\Requests;

use App\Models\Centre;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCentreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('centre_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:centres,name,' . request()->route('centre')->id,
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
                'min:-2147483648',
                'max:2147483647',
                'unique:centres,place_id_ref,' . request()->route('centre')->id,
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
