<?php
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// How do we call the controller from the view?

Route::redirect('/', '/home');

Route::get('/home', [CustomerController::class, 'showAllCustomers'])->name('home');

//Route::post('[subdirectory]'),[[Controller]::class, '[Controller Function]]')
Route::post('/saveCustomer', [CustomerController::class, 'saveCustomerDetails'])->name('saveCustomer');
Route::post('/saveCustomerUnsani', [CustomerController::class, 'saveCustomerDetailsUnsani'])->name('saveCustomerUnsanitized');

Route::get('/editCustomer/{cust_id}', [CustomerController::class, 'editCustomerDetails'])->name('customerEdit');

//Route::post('[subdirectory]'),[[Controller]::class, '[Controller Function]]')

Route::Delete('/deleteCustomer/{cust_id}', [CustomerController::class, 'deleteCustomerDetails'])->name('customerDelete');

Route::put('/saveEditCustomer/{cust_id}', [CustomerController::class, 'saveEditCustomers'])->name('saveEditCustomer');