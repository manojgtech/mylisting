<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\category;
use App\Models\city;
use App\Models\state;
use App\Models\image;
use App\Models\listing;
use App\Models\plan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Session;
use Storage;
use App\Http\Traits\common;
Use App\Models\customer;


class CustomerController extends Controller
{

    public function signup(){
        $data['cities']=city::all();
        $data['theme']='theme2';
        return view("auth.signup",$data);
         
     }
    public function signupnow(Request $request){
        $data= Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'min:10', 'max:11'],
        ]);
        if($data){
           
            $data=$data->validated();
            
               $cust=customer::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
                'role'=>'customer'
            ]);
            Auth::login($cust);
            return Redirect("/customer/account")->withSuccess("Account has been added successfully.");
        }
        
     }

     public function account(Request $request){
          $user=Auth::user();
     }

}
