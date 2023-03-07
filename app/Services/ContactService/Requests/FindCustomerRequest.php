<?php

namespace App\Services\ContactService\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FindCustomerRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'mobile' => 'required|exists:customers,mobile'
        ];
    }
}
