<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
   public function store(Request $request){

    $input = $request->all();
   $user = User::create($input);
     
    return response()->json(['user'=>$user]);

   }


   public function c_store(Request $request){

    $input = $request->all();
   $category = Category::create($input);
     
    return response()->json(['category'=>$category]);

   }

   public function p_store(Request $request){

    $input = $request->all();
   $product = Product::create($input);
     
    return response()->json(['product'=>$product]);

   }

   public function show(){
    // $category = Category::find(2);
    $products = Category::with('products')->where('id', 4)->get();
    return response()->json(['data'=>$products]);

    // return $products;

   }

   public function register(Request $request){

    $validator = Validator::make($request->all(),[

        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required',

    ]);

    if($validator->fails()){
        return response()->json(['status'=>'fail','$validation_errors'=>$validator->errors()]);

    }
    $request->password = bcrypt($request->password);

    $data = $request->all();
    // $data = [...$request->except(['password']), 'password' => bcrypt($request->password)];

    $user = User::Create($data);
    if($user){
        return response()->json(['status'=>'success','message'=>'User Create Successfully','data'=>$user]);
    
       }
       return response()->json(['status'=>'fail','message'=>'User Create fail']);
   }

   public function login(Request $request){
    $validator = Validator::make($request->all(),[

       
        'email'=>'required|email',
        'password'=>'required',

    ]);

    if($validator->fails()){
        return response()->json(['status'=>'fail','$validation_errors'=>$validator->errors()]);

    }

    if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        $user = Auth::user();
        $token['token'] = $user->createToken('usertoken')->accessToken;

        return response()->json(['status'=>'success','login'=>true,'token'=>$token, 'data'=>$user]);
    }else{
        return response()->json(['status'=>'fail','message'=>'fails']);
    }

   }
   
}
