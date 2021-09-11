<?php

namespace App\Http\Requests;

use App\Models\Service;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'service_id_ref' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:services,service_id_ref,' . request()->route('service')->id,
            ],
        ];
    }
}
