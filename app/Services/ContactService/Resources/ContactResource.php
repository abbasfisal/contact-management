<?php

namespace App\Services\ContactService\Resources;

use App\Services\ContactService\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        // dd($this->id  ,$this->comment , $this->status_id );
        // dd($this , $this->id , $this->status_id );
        return [
            'id'                => $this->id,
            'customer_id'       => $this->customer_id ? new CustomerResource($this->customer) : 'no identifed',
            'status_id'         => new StatusResource($this->status),
            'category_id'       => $this->category_id ? new CategoryResource($this->category) : ' no category',
            'operator_id'       => $this->operator_id ? new OperatorResource($this->operator) : 'no operator',
            'satisfaction_rate' => 4,
            'duration'          => Carbon::createFromTime(0, 0, 10)->toTimeString(),
            'comment'           => 'this comment',
            'called_number'     => '03648897987'
        ];
    }
}
