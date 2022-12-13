<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ControllerRegister extends Controller
{
    public  function register(Request $request){
        try{
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:24|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        if($user->save()){
            $user_d=new User_details();
            $user_d->user_id=$user->id;
            $user_d->company=$request->company;
            $user_d->address=$request->address;
            $user_d->city=$request->city;
            $user_d->save();

            return response()->json(['status'=>'success','message'=>'User created successfully']);

        }

            }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>$e->getmessage()]);
        }
    }
    public function login(Request $request)
    {
        $creds = $request->only(['email','password']);
        if (!$token=auth()->attempt($creds)){
            return response()->json([
                'success'=>false,
                'message'=>'information is not correct'
            ],Response::HTTP_UNAUTHORIZED);
        }
        return response()->json([
            'success'=>true,
            'token'=>$token,
            'user'=>Auth::user()
        ],Response::HTTP_OK);

    }

    public function logout(Request $request){
        try {
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                "success"=>true,
                "message"=>"logout success"
            ]);
        }catch (Exception $exception){
            return response()->json([
                "success"=>false,
                "message"=>"".$exception
            ]);
        }
    }
}
