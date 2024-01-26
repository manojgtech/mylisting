<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\review;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class customer extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table="users";
    
    public $fillable=['name','password','role','phone','email'];
    public function reviews(){
        return $this->belongsTo(review::class);
    }

}

