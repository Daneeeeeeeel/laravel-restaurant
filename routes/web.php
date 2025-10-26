<?php
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// How do we call the controller from the view?

Route::redirect('/', '/home');

Route::get('/home', [CustomerController::class, 'showAllCustomers'])->name('home');

//Route::post('[subdirectory]'),[[Controller]::class, '[Controller Function]]')
Route::post('/saveCustomer', [CustomerController::class, 'saveCustomerDetails'])->name('saveCustomer');
//Route::post('[subdirectory]'),[[Controller]::class, '[Controller Function]]')
Route::Delete('/deleteCustomer/{cust_id}', [CustomerController::class, 'deleteCustomerDetails'])->name('customerDelete');