<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDestinactionScheduleRequest extends FormRequest
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
            "destination" => "required",
            "bus" => "required",
            "hour" => "required",
            "driver" => "required",
            "isRepeatable" => "required",
            "days" => "required",
            "weekDays" => "required"
        ];
    }
}
