<?php

namespace App\Services\ContactService\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ContactService\Repository\ContactServiceInterface;

class ContactController extends Controller
{
    public function __construct(protected ContactServiceInterface $contactRepository)
    {
    }

    public function index()
    {
        return $this->contactRepository->list();
        dd($this->contactRepository->getModel());
    }
}
