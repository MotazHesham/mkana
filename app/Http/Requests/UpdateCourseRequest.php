<?php

namespace App\Http\Requests;

use App\Models\Course;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCourseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'trainer' => [
                'string',
                'required',
            ],
            'start_at' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'type' => [
                'required',
            ],
        ];
    }
}
