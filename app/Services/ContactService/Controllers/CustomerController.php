<?php

namespace App\Services\ContactService\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ContactService\Helpers\ResponseHelper;
use App\Services\ContactService\Repository\CustomerServiceInterface;
use App\Services\ContactService\Requests\CustomerCreateRequest;

class CustomerController extends Controller
{
    public function __construct(protected  CustomerServiceInterface $customerService)
    {
    }

    public function index()
    {
        $customers = $this->customerService->list();
        return ResponseHelper::retrieved($this->customerService->toJSON($customers));
    }

    public function create(CustomerCreateRequest $request)
    {

        dd($request->toArray());
    }
}
