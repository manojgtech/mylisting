<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class Listings extends Controller
{
    public function categories(){
        $cats=category::all();
        return ['status'=>true,'data'=>$cats];
    }
}
