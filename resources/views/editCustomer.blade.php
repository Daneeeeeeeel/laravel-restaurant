<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{dd ($customerDetails)}}
    <h1 class="customer-header">Edit Customer Details</h1>

    <form class="cf" action="{{ route('saveEditCustomer', $customerDetails->cust_id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Customer Name</label> <br>
        <input type="text" id="custName" name="custName" value="{{ $customerDetails->cust_name }}">
        
        <br>
        <label>Customer Address</label> <br>
        <input type="text" id="custAdd" name="custAdd" value="{{ $customerDetails->cust_address }}">

        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>