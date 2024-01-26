<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        $data['theme']='theme2';
        return view('auth.login',$data);
    }
    protected function authenticated($request, $user)
    {
        if($user->role=="user"){
            return redirect()->to(RouteServiceProvider::HOME);
        }else{
            return redirect()->to("/");
        }
    }

    public function userlogin(Request $request){
        $validator = Validator::make($request->all(), [
        'email' =>    'required',
        'password' => 'required',
      ]);
       // validate all requests and it sends output to your 
          

       if(!$validator->passes()){
          return response()->json([
             'status'=>0, 
             'error'=>$validator->errors()->toArray()
          ]);
        }

       $user_cred = $request->only('email', 'password');
        if (Auth::attempt($user_cred)) {

             //if user is logged in and the role is user
            if(Auth()->user()->role=='user'){  
               return response()->json([ [1] ]);
            }else{
                return response()->json([ [2] ]);
            }  

        }else{
             //if user isn't logged in
                return response()->json([ [3] ]);
        }
        //return redirect("/");
     }
  


    
}
