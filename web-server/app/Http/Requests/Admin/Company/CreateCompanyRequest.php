<?php

namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
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
            'contactEmail' => 'required|email',
            'contactPhone' => 'required|string',
            'contactAddress' => 'required|string',
            'image' => 'required|image:jpeg,png,jpg,gif,svg|max:2048',
            'foundedAt' => 'required|date',
            'description' => 'required|string',
        ];
    }
}
