<?php

namespace App\Services\ContactService\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'name' => $this->first_name . ' ' . $this->last_name,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'is_active' => $this->is_active ? 'Active' : "DeActive"
        ];
    }
}
