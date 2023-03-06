<?php

namespace App\Services\ContactService\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ContactService\Helpers\ResponseHelper;
use App\Services\ContactService\Models\Contact;
use App\Services\ContactService\Repository\ContactServiceInterface;
use App\Services\ContactService\Resources\ContactResourceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(protected ContactServiceInterface $contactRepository)
    {
    }

    public function index(): JsonResponse
    {
        $contacts = $this->contactRepository->list();

        return ResponseHelper::retrieved($this->contactRepository->toJSON($contacts));
    }

    public function delete(Request $request , Contact $contact): JsonResponse
    {
        $this->contactRepository->destroy($contact);
        return ResponseHelper::deleted();

    }
}
