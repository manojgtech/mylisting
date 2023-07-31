<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\category;
use App\Models\city;
use App\Models\state;
use App\Models\image;
use App\Models\listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Session;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function userdashboard(Request $request){
        return view("auth.register_step2");
    } 
    public function addListing(Request $request){
        $cats=category::all()->pluck("id",'name');
        $data['cats']=$cats;

        $states=state::all()->pluck("id",'name');
        $data['states']=$states;
        $city=city::all()->pluck("id",'city');
        $data['city']=$city;
        
        return view("addlist",$data);
    }
}
