<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function getAllCustomers() {
        // In PHP, in order to initialize a variable, you have to start with a dollar sign $
        // Get all the customer data
        // [model_name]::[elonquent_model]
        $customerData = Customer::all();

        // dd() - do or die function is similar to console.log()
        // dd($customerData);
        return $customerData;
    }

    public function showAllCustomers(){
        // Call getAllCustomers function and return all data and initialize the customerData variable
        // $this-> basically means the function is inside of the same controller.
        $customerData = $this->getAllCustomers();

        return view('Home', compact('customerData'));
    }
}
