<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function register(){
        return view("auth.getstarted");
    }
    public function register_step1(Request $request){
        $validatedData = $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'phone' => 'max:13|min:10',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
            ]);
            print_r($validatedData);
           $user=new User;
           $hashedPassword = Hash::make($validatedData['password']);
           $user->name=$validatedData['name'];
           $user->phone=$validatedData['phone'];
           $user->email=$validatedData['email'];
           $user->password=$hashedPassword;
           $user->remember_token=Str::random(30);
           if($user->save()){
             $id=Crypt::encryptString($user->id);
             return Redirect("/register_step2/".$id);
           }
          

        
    }

    
}
