@extends('layouts.app')

@section('content')
<style>
    #mainNav{
        background-color: black !important;
    }
</style>
<header class="masthead d-none" style="background:green;">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">{{$list->title}}</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Unlock the Power of Connection: Discover, Connect, and Grow with Our Business Listing Directory.</p>
                        
                    </div>
                </div>
            </div>
        </header>

<div class="container" style="margin-top: 100px;">
         <!-- end share -->
    <div class="row">
         <div class="col-md-7">
            <h1 class="text-left">
               {{$list->title}}
            </h1>
            <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{$list->location}}
            <p><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;{{$list->created_at}}
        </p>

        <hr/>
        <div class="detail">
         <h3>Business Details</h3>
         <div class="m-1">
         <div class="aligner">
<div class="container">
  <div class="owl-carousel owl-theme">
    @foreach($list->images as $img)
    <div class="item">
      <a href="{{url($img->image)}}" data-lightbox="gallery">
        <img src="{{url($img->image)}}" alt="{{$list->title}}" style="width:120px;">
      </a>
    </div>
    @endforeach
  </div>
</div>
</div>
         </div>
          <p>{{$list->description}}</p>
        </div>
         </div>
         <!-- 2ndcol -->
         <div class="col-md-4">

         <ul class="list-group">
            <li class="list-group-item bg-primary">Contact Detail</li>
            <li class="list-group-item"><i class="fa fa-chrome"></i> &nbsp;&nbsp;</i><a href="{{$list->website}}" target="_blank">{{$list->website}}</a></li>
            <li class="list-group-item"><i class="fa fa-envelope-o"></i> &nbsp;&nbsp;</i><a href="mailto:{{$list->email}}" target="_blank">{{$list->email}}</a></li>
            <li class="list-group-item"><i class="fa fa-phone"></i> &nbsp;&nbsp;</i><a href="tel:{{$list->phone}}" target="_blank">{{$list->phone}}</a></li>
            <li class="list-group-item"><i class="fa fa-mail-reply"></i> &nbsp;&nbsp;</i>Contact Us</li>
            

         </ul>
         <br/>
         <p>
            <button class="btn btn-block btn-lg btn-info">Write a review</button>
            <button class="btn btn-block btn-lg btn-warning">Report listing</button>
         </p>
         <div class="card">
            
             <div class="card-body">
                <p class="text-center"><i style="font-size:40px;" class="fa fa-user"></i></p>
                <p class="text-center">{{$user->name}}</p>
                <p class="text-center">{{$user->created_at}}</p>
             </div>   
         </div>
         </div>

    </div>

</div>

@endsection