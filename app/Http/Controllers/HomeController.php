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
use DB;
use App\Models\category;
use App\Models\city;
use App\Models\state;
use App\Models\image;
use App\Models\listing;
use App\Http\Traits\common;
class HomeController extends Controller
{
    use Common;
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
    public function index(Request $request)
    {
        //echo $ip='45.115.105.84';
        //$details = json_decode(file_get_contents("http://ipinfo.io/".$ip));

        //dd($details);
        $data['cities']=city::all();
        $data['cats']=category::leftJoin('listings',function($query){
            $query->on("categories.id",'=',"listings.category");
        })->select("category","name",'categories.id',DB::raw('count(listings.category) as c'))->groupBy("categories.id")->orderBy("c","desc")->limit(8)->get();
        $data['flist']=listing::where('featured',1)->get();
        $data['tlist']=listing::latest()->paginate(12);
        $data['theme']='theme2';
        return view('welcome',$data);
    }
    public function view(Request $request){
        $slug=isset($request->slug) ? trim($request->slug):'';
        if(!empty($slug)){
           $data['list']=listing::where('slug',$slug)->first();
           $data['user']=User::where('id',$data['list']->user_id)->first();
           $data['theme']='theme2';
           return view('listview',$data);
        }else{
            echo "no page";
            die;
        }
    }
    public function register(){
        $data['theme']='theme2';
        return view("auth.getstarted",$data);
    }
    public function register_step1(Request $request){
        $validatedData = $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'phone' => 'max:13|min:10',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
            ]);
        
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
    
    public function viewcategory(Request $request){
        $cat=isset($request->category) ? $request->category :'';
       $data['keyword']=$cat;
       $lists=[];
       if(!empty($cat)){
        $cat=str_replace("-"," ",$cat);
        $lcat=category::where("name",$cat)->first();
        if($lcat){
          $lists=listing::where('category',$lcat->id)->get();
        }else{
            $lists=listing::latest()->get(); 
        }
       }else{
        $lists=listing::latest()->get(); 
       }
       $data['catlist']=$lists;
       $data['cities']=city::all();
       $data['cats']=category::all();
       $data['flist']=listing::where('featured',1)->get();
       $data['tlist']=listing::latest()->paginate(12);
       $data['theme']='theme2';
       return view('categorylist',$data);
           
    }
    public function viewcity(Request $request){
       $cat=isset($request->city) ? $request->city:'';
       $data['keyword']=$cat;
       $lists=[];
       if(!empty($cat)){
        $cat=str_replace("-"," ",$cat);
        $lcat=city::where("city",$cat)->first();
        if($lcat){
          $lists=listing::where('city',$lcat->id)->get();
        }else{
            $lists=listing::latest()->get(); 
        }
       }else{
        $lists=listing::latest()->get(); 
       }
       
       $data['catlist']=$lists;
       $data['cities']=city::all();
       $data['cats']=category::all();
       $data['flist']=listing::where('featured',1)->get();
       $data['tlist']=listing::latest()->paginate(12);
       $data['theme']='theme2';
       return view('categorylist',$data);
    }

    public function search(Request $request){
        $key=$request->query("q");
        $lists=listing::where("title","like","%".strtolower($key)."%")->orWhere("description","like",$key)->orderBy('created_at','DESC')->get();
        $data['catlist']=$lists;
        $data['keyword']=$key;
        $data['theme']='theme2';
       $data['cities']=city::all();
       $data['cats']=category::all();
       $data['flist']=listing::where('featured',1)->get();
       $data['tlist']=listing::latest()->paginate(12);
       return view('search',$data);

    }

    
}
