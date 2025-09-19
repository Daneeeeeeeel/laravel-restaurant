<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // to disable audit timestamps
    public $timestamps = false;

    // table name
    protected $table = 'customers_table';

    //primary key
    protected $primarykey = 'cust_id';

    //Fillables are basically the columns that you can change, edit, or add into.
    protected $fillable = [
        'cust_name',
        'cust_address'
    ];
}
