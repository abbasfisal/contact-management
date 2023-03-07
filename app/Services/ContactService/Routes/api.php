<?php

use App\Services\ContactService\Controllers\ContactController;
use App\Services\ContactService\Controllers\CustomerController;
use App\Services\ContactService\Models\Category;
use App\Services\ContactService\Models\Contact;
use App\Services\ContactService\Models\Operator;
use App\Services\ContactService\Models\Status;
use Illuminate\Support\Facades\Route;

Route::get('api/a', function () {

    return ['categories', Category::query()->get(), 'statues', Status::query()->get(), 'operators', Operator::query()->get()];

    dd('hi');
});


Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {

    Route::group(['prefix' => 'contact'], function () {

        Route::get('/list', [ContactController::class, 'index'])->name('contact.list');

        Route::delete('/delete/{contact}', [ContactController::class, 'delete'])->name('contact.delete');

        Route::post('/create', [ContactController::class, 'create'])->name('contact.create');

    });

    Route::group(['prefix' => 'customer'], function () {

        Route::get('/list', [CustomerController::class, 'index'])->name('customer.index');

        Route::post('/create', [CustomerController::class, 'create'])->name('customer.create');

        Route::post('/find', [CustomerController::class, 'findByMobile'])->name('customer.getby.mobile');
    });


});
