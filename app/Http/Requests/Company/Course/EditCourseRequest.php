<?php

namespace App\Http\Requests\Company\Course;

use Illuminate\Foundation\Http\FormRequest;

class EditCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'destination' => 'required',
            'bus' => 'required',
            'date' => 'required',
            'startTime' => 'required',
//            'endTime' => 'required',
            'price' => 'required'
        ];
    }
}
