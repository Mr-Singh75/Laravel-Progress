<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repository\Implementation\DataImplementation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class UserConroller extends Controller
{
     private $user;
    // public function __construct(UserInterface $user)
    // {
    //     $this->user=$user;
    // }
    public function __construct()
    {
        $this->user=new DataImplementation();
        // $this->middleware('rolecheck')->only('loginAction');
        //$this->middleware('log', ['only' => ['loginAction']]);
    }
    public function getUsers()
    {
       // echo User::all();

        return User::all();
        //return redirect('accessor',['data'=>$data]);
    }
    public function index()
    {
        //return user::all();
        
        $data=$this->user->getAllData();
        // $data=$this->user->getAllData();
        return view("User",['data'=>$data]);
    }
    public function upload(Request $req)
    {
        $req->validate(
            ['fname'=>'required | max:10',
            'lname'=>'required | max:8',
            'salary'=>'required',
            'address'=>'required',
            'email'=>'required',
            'passward'=>'required'
            ]
        );
        $input = $req->all();
        return $this->user->addUser($input);
       
    }
    public function delete($id)
    {
        return $this->user->delete($id);
    }
    public function edit($id)
    {
        $data= $this->user->getById($id);
        return view("edit",['data'=>$data[0]]);
        // return $data[0]->FirstName;
    }
    public function update($id,Request $req)
    {
        $req->validate(
            ['fname'=>'required | max:10',
            'lname'=>'required | max:8',
            'salary'=>'required',
            'address'=>'required'
            ]
        );
        $input = $req->all();
        $this->user->update($input,$id);
        return redirect('user');
    }
    public function create(Request $req)
    {
        $req->validate(
            ['name'=>'required | max:10',
            'email'=>'required',
            'password'=>'required'
            ]
        );
        $input = $req->all();
        $this->user->addUser($input);
        return view('login');
    }
    public function loginAction(Request $req)
    {
        $input=$req->only('email','password');
        $data=User::where('email', '=', $input['email'])->first();
        // if($data!=null)
        // {
        //     if(Hash::check($input['password'],$data->password))
        //     {
        //         $req->session()->put('username',$data->name);
        //         return view('home',['data'=>$data]);
        //     }
        // }
        // return view('error');
        //echo 'I am in loginaction';
        if (Auth::attempt($input)) {
            Session::put('username',$data->name);
            Session::put('role',$req->input('role'));
            return redirect('user/home');
        }
  
        // return redirect("login")->withSuccess('Login details are not valid');
        //return redirect()->intended('user/login')->withSuccess('Login details are not valid');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('user/login');
    }
}
