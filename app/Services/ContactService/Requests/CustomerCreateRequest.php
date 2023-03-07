<?php

namespace App\Services\ContactService\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'mobile' => 'required|digits:11|unique:customers,mobile',
            'address' => 'required|string|min:4',
            'postal_code' => 'required|string|min:4'
        ];
    }
}
