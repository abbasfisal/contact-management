<?php

namespace App\Services\ContactService\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactCreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'customer_id' => 'nullable',
            'status_id' => 'nullable',
            'category_id' => 'nullable',
            'satisfaction_rate' => 'nullable|integer|between:1,5',
            'duration' => 'nullable',
            'comment' => 'nullable',
            'called_number' => 'required|'
        ];
    }
}
