<?php

namespace App\Services\ContactService\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ContactService\Models\Contact;
use App\Services\ContactService\Repository\ContactServiceInterface;
use App\Services\ContactService\Resources\ContactResource;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function __construct(protected ContactServiceInterface $contactRepository)
    {
    }

    public function index()
    {
        $a =  Contact::query()->create([
            'customer_id'       => 1,
            'status_id'         => 1,
            'category_id'       => 1,
            'operator_id'       => 1,
            'satisfaction_rate' => 4,
            'duration'          => Carbon::createFromTime(0, 0, 10)->toTimeString(),
            'comment'           => 'this comment',
            'called_number'     => '03648897987'
        ]);

        return new ContactResource($a);
        //ContactResource::collection($a)

        return Carbon::createFromTime(0, 0, 10)->toTimeString();
        return $this->contactRepository->list();
        dd($this->contactRepository->getModel());
    }
}
