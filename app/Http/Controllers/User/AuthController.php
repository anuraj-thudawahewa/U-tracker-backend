<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use JWTAuth;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //
    protected $user;

//class constructor
    public function __construct()
    {
        $this->user = new User;
    }


//user register function
    public function register(Request $request)
    {
        //before save check validation
        $validator = Validator::make($request->all(),
            [
                'vehicle'=>'required|string',
                'lastname'=>'required|string',
                'email'=>'required|email',
                'password'=>'required|string|min:6',
            ]);

//when validation fails,response
        if($validator->fails())
        {
            return response()->json([
                "success"=>false,
                "message"=>$validator->messages()->toArray(),
            ],400);
        }

        //before register check email is already available
        $check_email = $this->user->where("email",$request->email)->count();
        if($check_email > 0)
        {
            return response()->json([
                'success'=>false,
                'message'=>'this email already exist please try another email',
            ],200);

        }

//create user with details
        $registerComplete = $this->user::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);


        if($registerComplete)
        {
            return $this->login($request);
        }
    }



//user login function
    public function login(Request $request)
    {
        //email validation
        $validator = Validator::make($request->only('email','password'),
            [
                'email'=>'required|email',
                'password'=>'required|string|min:6',
            ]
        );

        //when validation fails
        if($validator->fails())
        {
            return response()->json([
                "success"=>false,

                "message"=>$validator->messages()->toArray(),
            ],400);
        }

        $jwt_token = null;

        $input = $request->only("email","password");

//check input and token
        if(!$jwt_token = auth('users')->attempt($input))
        {
            return response()->json([
                'success'=>false,
                'message'=>'invalid email or password'
            ]);

        }

//finally user successfully login & response
        return response()->json(array(
            'success'=>true,
            'firstname'=>$request->user()->firstname,
            'token'=>$jwt_token,
        ));
    }


    public function addUser(){

        $registerComplete = $this->user::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);


        return response()->json(array(
            'success'=>true,
            'firstname'=>$request->user()

        ));

    }



}
