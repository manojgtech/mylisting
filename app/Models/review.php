<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customer;
use App\Models\review_image;
class review extends Model
{
    use HasFactory;
    protected $table="review";
    public $timestamps=false;
    public function user(){
        return $this->hasOne(customer::class,'id');
    }
    public function pics(){
        return $this->hasMany(review_image::class,'review_id');
    }

}
