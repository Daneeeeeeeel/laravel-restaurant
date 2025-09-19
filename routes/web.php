<?php
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// How do we call the controller from the view?

Route::get('/', [CustomerController::class, 'showAllCustomers']);