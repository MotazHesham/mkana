<?php

namespace App\Http\Requests;

use App\Models\Review;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('review_edit');
    }

    public function rules()
    {
        return [
            'rating' => [
                'numeric',
                'required',
            ],
            'comment' => [
                'string',
                'required',
            ],
            'published' => [
                'required',
            ],
            'user_review_id' => [
                'required',
                'integer',
            ],
            'product_review_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
