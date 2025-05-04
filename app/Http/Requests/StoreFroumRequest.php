<?php

namespace App\Http\Requests;

use App\Models\Froum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFroumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('froum_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:3',
                'nullable',
            ],
        ];
    }
}
