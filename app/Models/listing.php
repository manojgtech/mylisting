<?php

namespace App\Models;

use App\Models\image;
use App\Models\category;
use App\Models\city;
use App\Models\state;

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



    
    
}
