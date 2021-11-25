<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Mobile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add()
    {
        $user=new User();
        $user->name='Shiv';
        $user->email='Shiv@gmail.com';
        $user->password=Hash::make('123456789');

        $uprofile=new UserProfile();
        $uprofile->company='Unthinkable';
        $uprofile->salary=420000;
        
        $mobile=new Mobile();
        $mobile->model='Note 9';
        $mobile->company='Redmi';

        $user->save();
        $user->userprofile()->save($uprofile);
        $uprofile->mobile()->save($mobile);
    }
    public function show_users()
    {
        // $users = DB::table('users')
        //     ->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
        //     ->join('mobiles', 'user_profiles.id', '=', 'mobiles.user_profile_id')
        //     ->select('users.*', 'user_profiles.*', 'mobiles.*')
        //     ->orderBy('user_profiles.salary', 'desc')
        //     ->get();
        $users=User::select('users.*','user_profiles.*','mobiles.model')
        ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
        ->join('mobiles', 'user_profiles.id', '=', 'mobiles.user_profile_id')
        ->orderBy('user_profiles.salary', 'desc')
        ->get();
        //$users='abc';
        //return $users;
        return view('showuser',['data'=>$users]);
    }
}
