<?php

namespace App\Services\ContactService\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ContactService\Helpers\ResponseHelper;
use App\Services\ContactService\Repository\ContactServiceInterface;
use App\Services\ContactService\Resources\ContactResourceCollection;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function __construct(protected ContactServiceInterface $contactRepository)
    {
    }

    public function index(): JsonResponse
    {
//        $a =  Contact::query()->create([
//            'customer_id'       => 1,
//            'status_id'         => 1,
//            'category_id'       => 1,
//            'operator_id'       => 1,
//            'satisfaction_rate' => 4,
//            'duration'          => Carbon::createFromTime(0, 0, 10)->toTimeString(),
//            'comment'           => 'this comment',
//            'called_number'     => '03648897987'
//        ]);
//
//        return new ContactResource($a);
        //ContactResource::collection($a)

        $contacts = $this->contactRepository->list();

        return ResponseHelper::retrieved($this->contactRepository->toJSON($contacts));

    }
}
