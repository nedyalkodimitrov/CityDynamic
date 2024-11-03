<?php

namespace App\Http\Requests\Company\Bus;

use Illuminate\Foundation\Http\FormRequest;

class EditBusRequest extends FormRequest
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
            'name' => 'required|string',
            'model' => 'required|string',
            'seats' => 'required|numeric',
        ];
    }
}
