<?php

namespace App\Services\ContactService\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ContactService\Requests\CustomerCreateRequest;

class CustomerController extends Controller
{
    public function __construct()
    {
    }

    public function create(CustomerCreateRequest $request)
    {
        dd($request->toArray());
    }
}
