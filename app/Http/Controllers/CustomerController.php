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

    public function saveCustomerDetails(Request $request) {
        $request->validate([
            'custName' => 'required|string|max:45',
            'custAdd' => 'required|string|max:100'
        ]);

        //INSERT INFO INTO DATABASE
        Customer::create([
            'cust_name' => $request->custName,
            'cust_address' => $request->custAdd
        ]);

        //AFTER INSERTING INFORMATION
        //REDIRECT USER INTO THE HOME ROUTE
        return redirect()->route('home');
    }

    public function deleteCustomerDetails($cust_id) {
        //dd($cust_id)

        //FIND THE INFORMATION INSIDE OF THE FUNCTION OF THIS DATABASE
        //AND THEN RETURN IT
        //BUT IF YOU CAN'T FIND THE INFORMATION IN THE DATABASE
        //THROW AN ERROR
        $customer = Customer::findOrFail($cust_id);

        $customer->delete();

        return redirect()->route('home');
    }
}
