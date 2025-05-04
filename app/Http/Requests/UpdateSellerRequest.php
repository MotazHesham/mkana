<?php

namespace App\Http\Requests;

use App\Models\Seller;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSellerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('seller_edit');
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
                'unique:users,email,' . request()->user_id,
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
            'user_id' => [
                'required',
                'integer',
            ],
            'phone' => [
                'required',
                'unique:users,phone,' . request()->user_id,
                'regex:/^05[0-9]{8}$/',
            ],
            'identity_number' => [
                'required',
                'string',
                'max:255',
                'regex:/^[12]\d{9}$/',
                'unique:users,identity_number,' . request()->user_id,
            ],
            'commercial_register' =>
                ['required', 'string', 'max:255',  'unique:users,commercial_register,' . request()->user_id],
        ];
    }
}
