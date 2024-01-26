<?php

namespace App\Models;

use App\Models\image;
use App\Models\category;
use App\Models\city;
use App\Models\state;
use App\Models\User;
use App\Models\Review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listing extends Model
{
    use HasFactory;
    protected $fillable=['category','title','city','state','description'];

    public function images(){
        return $this->hasMany(image::class,'list_id');
    }

    public function categoryname(){
        return $this->hasOne(category::class,'id','category');
    }
    public function cityname(){
        return $this->hasOne(city::class,'id','city');
    }
    public function statename(){
        return $this->hasOne(state::class,'id','state');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function reviews(){
        return $this->hasMany(Review::class,'list_id');
    }
    public  function getShortDesc(){
         $dec=strip_tags(htmlspecialchars_decode($this->description));
         return substr($dec,0,59).'...';
    }
    




    
    
}
