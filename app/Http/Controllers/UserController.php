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
use Storage;


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
        'title' => 'required|min:5',
        'city'=>'required',
        'state'=>'required',
        'email'=>'email',
        'description'=>'required|min:50',
        'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
        ]);
        $list=new listing();
        $list->category=$validatedData['category'];
        $list->title=$validatedData['title'];
        $list->city=$validatedData['city'];
        $list->state=$validatedData['state'];
        $list->email=$validatedData['email'];
        $list->description=htmlentities($validatedData['category']);
        $list->location=isset($request->location) ? $request->location:'';
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

}
