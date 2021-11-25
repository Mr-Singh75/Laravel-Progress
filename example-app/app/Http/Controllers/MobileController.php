<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mobile;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    //
    public function show_customer($id)
    {
        $customer=Mobile::where('customer_id','>',0)->first()->customer;
        // return $customer;
        return view('customer',['customer'=>$customer]);
    }
}
