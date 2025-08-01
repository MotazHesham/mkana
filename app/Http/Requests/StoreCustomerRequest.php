<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueEmailRule;
use Illuminate\Http\Response;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_create');
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
                new UniqueEmailRule
            ],
            'password' => [
                'required',
                'max:8',
            ],
            'personal_photo' => [
                'required',
            ],
            'phone' => [
                'string',
                'nullable', 
                'unique:users',
                'regex:/^05[0-9]{8}$/',
            ],
            'address' =>[
                'required',
            ],
        ];
    }
}