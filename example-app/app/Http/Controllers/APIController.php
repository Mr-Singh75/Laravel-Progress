<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Transformers\ApiTransformer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use UserInterface;
use Illuminate\Support\Facades\Validator;
class APIController extends Controller
{
    public function getData()
    {
        $user=User::all();
        return (new ApiTransformer())->transform($user);
        //return ['name'=>'Yogi'];
        //return response()->collection($user,new ApiTransformer());
    }
    public function add(Request $req)
    {
        $user=new User();
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $data=null;
        try
        {
            $data=$user->save();
        }
        catch(QueryException $exception)
        {
            // dd($result);
        }
        //dd($result);
        return (new ApiTransformer)->addDataResult($data);
        // $result=null;
        // if($data instanceof User)
        // {
        //     //return ['Result'=>'Your data is added successfully'];
        //     $result='Your data is added successfully';
        // }
        // else{
        //     //return ['Result'=>'Operation Failed'];
        //     $result='Operation Failed';
        // }

    }
    public function update(Request $req)
    {
        $user=User::find($req->id);
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $result=$user->save();
        if($result)
        {
            return ['Result'=>'Your data is Updated successfully'];
        }
        else{
            return ['Result'=>'Operation Failed'];

        }

    }




    ////// PASSPORT LOGIN & REGISTER /////////////

    public function register(Request $request){ 

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $responseArray = [];
        $responseArray['token'] = $user->createToken('MyApp')->accessToken;
        $responseArray['name'] = $user->name;
        
        return response()->json($responseArray,200);  
    }

    /// login //////

    public function login(Request $request){ 
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            $responseArray = [];
            $responseArray['token'] = $user->createToken('MyApp');
            $responseArray['name'] = $user->name;
            
            return response()->json($responseArray,200);

        }else{
            return response()->json(['error'=>'Unauthenticated'],203);
        }
    }
}
