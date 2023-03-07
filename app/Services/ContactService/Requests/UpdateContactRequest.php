<?php

namespace App\Services\ContactService\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id' => 'required|exists:contacts,id',
            'customer_id' => 'nullable|exists:customers,id',
            'status_id' => 'nullable|exists:statues,id',
            'category_id' => 'nullable|exists:categories,id',
            'satisfaction_rate' => 'nullable|integer|between:1,5',
            'duration' => 'nullable',
            'comment' => 'nullable',
            'called_number' => 'nullable|digits:11'
        ];
    }
}
