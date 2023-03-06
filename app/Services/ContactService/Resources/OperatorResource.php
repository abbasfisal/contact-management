<?php

namespace App\Services\ContactService\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * @property int $id ,
 * @property string $first_name ,
 * @property string $last_name ,
 * @property Collection $categories ,
 *
 */
class OperatorResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->first_name . ' ' . $this->last_name,
            'categories' => new CategoryCollection($this->categories)
        ];
    }
}
