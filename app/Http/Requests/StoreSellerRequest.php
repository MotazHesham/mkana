<?php

namespace App\Http\Requests;

use App\Models\Seller;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use App\Rules\UniqueEmailRule;

class StoreSellerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('seller_create');
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
            ],
            'photo' => [
                'required',
            ],
            'store_name' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'phone' => [
                'required',
                'unique:users',
                'regex:/^05[0-9]{8}$/',
            ],
            'country' => [
                'required',
            ],
            'identity_number' => [
                'required',
                'string',
                'regex:/^[12]\d{9}$/',
                'unique:users',
            ],
            'commercial_register' =>
                ['required', 'string', 'max:255', 'unique:users'],
        ];
    }
}
