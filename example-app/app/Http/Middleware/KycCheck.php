<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\KYC;
use Illuminate\Support\Facades\Session;

class KycCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session::get('username'))
        {
            return redirect('user/login');
        }
        $id=Session::get('id');
        $data=KYC::where('user_id',"=",$id)->first();
        //dd($data);
        if(!$data==null && $data->first()->status=='success')
        {
            return $next($request);
        }
        //return $next($request);
        else if(!$data==null && $data->first()->status=='pending')
        {
            return redirect('user/pending')->with('data',$data);
        }
        else{
            return redirect('user/kycform');
        }
    }
}
