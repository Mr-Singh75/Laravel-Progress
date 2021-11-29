<?php

namespace App\Http\Controllers;
use App\Models\KYC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KYCController extends Controller
{
    public function kycAction(Request $request)
    {
        $check=KYC::where('user_id','=',Session::get('id'))->first();
        $kyc=null;
        if($check)
        {
            $kyc=$check;
        }
        else{
            $kyc=new KYC();
        }
        $kyc->aadhar_no=$request->aadhar_no;
        $kyc->pan_no=$request->pan_no;
        $kyc->status='pending';
        $kyc->user_id=Session::get('id');
        $kyc->save();
        // dd($kyc);
        if($kyc)
        {
            return redirect('user/pending')->with('data', $kyc);
        }
        return redirect()->back()->withSuccess('KYC Details not submitted! Please try after some time');
    }
    // public function updateKyc(Request $request)
    // {
    //     $kyc=KYC::where('user_id','=',Session::get('id'))->first();

    // }
}
