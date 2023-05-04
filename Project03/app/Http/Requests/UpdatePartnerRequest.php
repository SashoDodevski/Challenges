<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'image' => ['required', 'mimes:png,jpg'],
            'partner_url' => ['required', 'string'],
            'partner_type_id' => ['required', 'integer', 'min:1'],
        ];
    }
    
    public function messages()
    {
        return [
            'partner_type_id.min' => 'Please select partner type.'
        ];
    }
}
