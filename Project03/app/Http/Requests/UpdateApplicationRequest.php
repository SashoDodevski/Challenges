<?php


namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'city' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique(Client::class)->ignore($this->client_id)],
            'phone_number' => ['required', 'string'],
            'equipment_type_id' => ['required', 'integer', 'min:1'],
            'doc1' => ['mimes:pdf,docx'],
            'doc2' => ['mimes:pdf,docx'],
            'comment' => ['required', 'string', 'max:1000'],
            'application_status_id' => ['required', 'integer', 'min:1'],
            'history_status_id' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'equipment_type_id.min' => 'Please select equipment.',
            'application_status_id.min' => 'Please select application status.',
            'history_status_id.min' => 'Please select history status.'

        ];
    }
}


