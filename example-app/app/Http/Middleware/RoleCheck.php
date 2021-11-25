<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class RoleCheck
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
        //echo 'hahsshs';
        //dd($request);
        // if($request->role='admin')
        // {
        //     return redirect('/');
        // }
        if(Auth::check())
        {
            $data=$request->session()->get('role');
            if($data=='admin')
            {
                return redirect('user/admindashboard');
            }
            else if($data=='user')
            {
                return redirect('user/userdashboard');
            }
            else{
                return redirect('user/guestdashboard');
            }
        }
        return $next($request);
    }
}
