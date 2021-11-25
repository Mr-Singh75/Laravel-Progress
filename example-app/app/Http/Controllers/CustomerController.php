<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function add_customer()
    {
        $mobile=new Mobile();
        $mobile->model='Iphone 7';
        $mobile->company='Apple';

        $customer=new Customer();
        $customer->name='Sumit';
        $customer->email='sumit@gmail.com';
        $customer->save();

        $customer->mobile()->save($mobile);
    }
    public function show_mobile($id)
    {
        $mobile=Customer::find($id)->mobile;
        // return $mobile;
        //dd($mobile);
        return view('mobile',['mobile'=>$mobile]);
    }
}
