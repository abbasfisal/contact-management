<?php

use App\Services\ContactService\Controllers\ContactController;
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
    });


});
