<?php

namespace App\Services\ContactService\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ContactService\Helpers\ResponseHelper;
use App\Services\ContactService\Models\Customer;
use App\Services\ContactService\Repository\CustomerServiceInterface;
use App\Services\ContactService\Requests\CustomerCreateRequest;
use App\Services\ContactService\Requests\FindCustomerRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(protected CustomerServiceInterface $customerService)
    {
    }

    public function index(): JsonResponse
    {
        $customers = $this->customerService->list();
        return ResponseHelper::retrieved($this->customerService->toJSON($customers));
    }

    public function create(CustomerCreateRequest $request): JsonResponse
    {
        $customer = $this->customerService->create($request->toArray());

        return ResponseHelper::created($this->customerService->toJSON($customer));
    }

    public function findByMobile(FindCustomerRequest $request): JsonResponse
    {
        $customer = $this->customerService->findByMobile($request->mobile);

        return ResponseHelper::retrieved($this->customerService->toJSON($customer));
    }
}
