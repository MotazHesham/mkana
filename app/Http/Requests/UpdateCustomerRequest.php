<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ], 
            'personal_photo' => [
                'required',
            ],
            'phone' => [
                'string',
                'nullable',
                'unique:users,phone,' . $this->user_id,
                'regex:/^05[0-9]{8}$/',
            ],
            'country'=>[
                'required',
            ],
            'address' =>[
                'required',
            ],
        ];
    }
}