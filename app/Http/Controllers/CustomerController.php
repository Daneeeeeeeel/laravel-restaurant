<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function getAllCustomers() {
        // In PHP, in order to initialize a variable, you have to start with a dollar sign $
        // Get all the customer data
        // [model_name]::[elonquent_model]
            $customerData = Cache::remember('customer_cache', 600, function() {
            return Customer::all();
        });

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
        //dd($cust_id);


        //FIND THE INFORMATION INSIDE OF THE FUNCTION OF THIS DATABASE
        //AND THEN RETURN IT
        //BUT IF YOU CAN'T FIND THE INFORMATION IN THE DATABASE
        //THROW AN ERROR
          $customer = Customer::findOrFail($cust_id);

          $customer->delete();

          return redirect()->route('home');
    }

    public function editCustomerDetails() {
        $customerDetails = Customer::findOrFail($cust_id);

        return view('editCustomer', compact('customerDetails'));
    }

    public function saveEditCustomers(Request $request, $cust_id) {
        $customerDetails = Customer::findOrFail($cust_id);

        $customerDetails->cust_name = $request->input('custName');
        $customerDetails->cust_address = $request->input('custAdd');

        $customerDetails->save();

        //UPDATE table_name
        //SET column1 = value1, column2 = value2, ...
        //WHERE condition;
        return redirect()->route('home');
    }

//    public function saveCustomerDetailsUnsani(Request $request) {

       // $request->validate([
            //'custName' => 'required|string|max:45',
          //  'custAdd' => 'required|string|max:100'
        //]);

        //DB::unprepared("INSERT INTO customers_table (cust_name, cust_address) VALUES ('$request->custName', '$request->custAdd')");
    
      //  return redirect()->route('home');
    //}
}
