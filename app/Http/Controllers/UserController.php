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
use App\Models\plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Session;
use Storage;
use App\Http\Traits\common;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function userdashboard(Request $request){
        $uid=$userid=Auth::id();
        $data['clist']=listing::where('user_id',$uid)->count();
        return view("user.dashboard",$data);
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
    public function uploadimg(Request $request)
    {
    $photos = [];
    foreach ($request->photos as $photo) {
        $filename = $photo->store('photos');
        $product_photo = image::create([
            'name' => $filename
        ]);

        $photo_object = new \stdClass();
        $photo_object->name = str_replace('photos/', '',$photo->getClientOriginalName());
        $photo_object->size = round(Storage::size($filename) / 1024, 2);
        $photo_object->fileID = $product_photo->id;
        $photos[] = $photo_object;
    }

    return response()->json(array('files' => $photos), 200);

}
 public function saveListing(Request $request){
        $validatedData = $this->validate($request, [
        'category' => 'required',
        'title' => 'required|min:3',
        'city'=>'required',
        'state'=>'required',
        'email'=>'email',
        'phone'=>'digits_between:10,13|numeric',
        'description'=>'required|min:50',
        'images.*' => ['image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
        'cover' => ['image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
        'logo' => ['image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
        'website'=>'nullable|url',
        'zip'=>'digits:6|numeric',
        'facebook'=>'nullable|url',
         'twitter'=>'nullable|url',
        'instagram'=>'nullable|url',
        'youtube'=>'nullable|url',
        'intro'=>'nullable|url'
        ]);

        $list=new listing();
        $list->category=$validatedData['category'];
        $list->title=$validatedData['title'];
        $list->city=$validatedData['city'];
        $list->state=$validatedData['state'];
        $list->email=$validatedData['email'];
        $list->phone=$validatedData['phone'];
        $list->website=$validatedData['website'];
        $list->zip=$validatedData['zip'];
        $list->facebook=isset($validatedData['facebook']) ? $validatedData['facebook']:'' ;
        $list->twitter=isset($validatedData['twitter']) ? $validatedData['twitter']:'' ;
        $list->youtube=isset($validatedData['youtube']) ? $validatedData['youtube']:'';
        $list->instagram=isset($validatedData['instagram']) ? $validatedData['instagram']:'';
        $list->description=htmlentities($validatedData['description']);
        $list->tags=$request->tags;
        $list->location=isset($request->location) ? $request->location:'';
        if($request->hasfile('cover'))
        {
               $path = $request->cover->store('/images', ['disk' =>   'my_files']);
               $list->cover=$path;
        }
        if($request->hasfile('logo'))
        {
               $path = $request->logo->store('/images', ['disk' =>   'my_files']);
               $list->logo=$path;
        }
       
        
        $list->intro=isset($request->intro) ? $request->intro:'';
        $list->user_id=Auth::id();
        $list->slug=$this->slugify($validatedData['title']);
        if($list->save()){
            $id=$list->id;
            if($request->hasfile('images'))
            {
               foreach($request->file('images') as $key => $file)
               {
                   
                   $path = $file->store('/images', ['disk' =>   'my_files']);
                   $image=new image();
                   $image->list_id=$id;
                   $image->image=$path;
                   $image->save();
               }
              
        }
        
         return Redirect("/user/listings")->withSuccess("Listing has been added successfully.");
            
         }else{
            return Redirect("/add-listing")->withWarning("There is an error."); 
         }
 }
 public  function listings(Request $request){
     $userid=Auth::id();
     $listings=listing::where(['user_id'=>$userid])->get();
    return view("user.listings",['lists'=>$listings]);
     
 }

 


 function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}
public function profile(Request $request){
    $user_id=Auth::id();
    $user=User::find($user_id);
    $plans=plan::all();
    return view('user.profile',['user'=>$user,'plans'=>$plans]);
    

} 
public function updateprofile(Request $request){
    $validatedData = $this->validate($request, [
        'name' => 'required|min:3|max:50',
        'phone' => 'max:13|min:10',
        //'password' => 'same:cpassword',
        'pic' => ['image','mimes:jpg,png,jpeg,gif,svg','max:1048'],
        'plan'=>'required',
        'user_id'=>'required'
        ]);
        $user=user::find($validatedData['user_id']);
        $user->name=$validatedData['name'];
        $user->phone=$validatedData['phone'];
        $user->plan=$validatedData['plan'];
        if(isset($validatedData['password']) && !empty($validatedData['password'])){
            $hashedPassword = Hash::make($validatedData['password']);
            $user->password=$hashedPassword;
        }
        if($request->hasfile('pic')){
            $path = $request->pic->store('/images', ['disk' =>   'my_files']);
            $user->pic=$path;
        }
        $user->save();
        return redirect()->back()->withSuccess("Profile updated successfully");
        
 }

 public function editlist(Request $request){
    $id=isset($request->id) ? Crypt::decrypt($request->id):'';
    $cats=category::all()->pluck("id",'name');
    $data['cats']=$cats;
    $states=state::all()->pluck("id",'name');
    $data['states']=$states;
    $city=city::all()->pluck("id",'city');
    $data['city']=$city;
    $data['list']=listing::find($id);
    $data['id']=$id;
    
    return view('user.editlist',$data);
 }
 public function updateListing(Request $request){
    $validatedData = $this->validate($request, [
        'category' => 'required',
        'title' => 'required|min:3',
        'city'=>'required',
        'state'=>'required',
        'email'=>'email',
        'phone'=>'digits_between:10,13|numeric',
        'description'=>'required|min:50',
        'images.*' => ['image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
        'cover' => ['image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
        'logo' => ['image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
        'website'=>'nullable|url',
        'zip'=>'digits:6|numeric',
        'facebook'=>'nullable|url',
        'twitter'=>'nullable|url',
        'instagram'=>'nullable|url',
        'youtube'=>'nullable|url',
        'intro'=>'nullable|url'
        ]);
        $id=base64_decode($request->id);
        $list=listing::find($id);
        $list->category=$validatedData['category'];
        $list->title=$validatedData['title'];
        $list->city=$validatedData['city'];
        $list->state=$validatedData['state'];
        $list->email=$validatedData['email'];
        $list->phone=$validatedData['phone'];
        $list->website=$validatedData['website'];
        $list->zip=$validatedData['zip'];
        $list->facebook=$validatedData['facebook'];
        $list->twitter=$validatedData['twitter'];
        $list->youtube=$validatedData['youtube'];
        $list->intro=$validatedData['intro'];
        $list->instagram=$validatedData['instagram'];
        $list->description=htmlentities($validatedData['description']);
        $list->location=isset($request->location) ? $request->location:'';
        if($request->hasfile('cover'))
        {
               $path = $request->cover->store('/images', ['disk' =>   'my_files']);
               $list->cover=$path;
        }
        if($request->hasfile('logo'))
        {
               $path = $request->logo->store('/images', ['disk' =>   'my_files']);
               $list->logo=$path;
        }
        if($validatedData['title']!=$list->title){
            $list->slug=$this->slugify($validatedData['title']);
        }
        $list->tags=$request->tags;
       
        if($list->save()){
            if($request->hasfile('images'))
            {
               foreach($request->file('images') as $key => $file)
               {
                   
                   $path = $file->store('/images', ['disk' =>   'my_files']);
                   $image=new image();
                   $image->list_id=$id;
                   $image->image=$path;
                   $image->save();
               }
              
        }
        
         return Redirect("/user/listings")->withSuccess("Listing has been updated successfully.");
            
         }else{
            return Redirect("/add-listing")->withWarning("There is an error."); 
         }
       
 }
 public function viewlist(Request $request){
    $id=isset($request->id) ? Crypt::decrypt($request->id):'';
    
 }
 public function deletelist(Request $request){
    $id=isset($request->id) ? Crypt::decrypt($request->id):'';
    if(!empty($id)){
        $list=listing::find($id);
        $list->delete();
        return Redirect("/user/listings")->withSuccess("Listing has been deleted successfully.");
    }
 }
}
