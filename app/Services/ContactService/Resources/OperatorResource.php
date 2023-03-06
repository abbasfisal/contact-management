<?php

namespace App\Services\ContactService\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OperatorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id'         => $this->id,
            'name'       => $this->first_name . ' ' . $this->last_name,
            'categories' => new CategoryCollection($this->categories)
        ];
    }
}
