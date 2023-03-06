<?php

namespace App\Services\ContactService\Resources;

use App\Services\ContactService\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property int $satisfaction_rate
 * @property string $comment
 * @property string $called_number
 */
class ContactResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'customer_id'       => $this->customer_id ? new CustomerResource($this->customer) : 'no identifed',
            'status_id'         => new StatusResource($this->status),
            'category_id'       => $this->category_id ? new CategoryResource($this->category) : ' no category',
            'operator_id'       => $this->operator_id ? new OperatorResource($this->operator) : 'no operator',
            'satisfaction_rate' => $this->satisfaction_rate,
            'duration'          => Carbon::createFromTime(0, 0, 10)->toTimeString(),
            'comment'           => $this->comment,
            'called_number'     => $this->called_number
        ];
    }
}
