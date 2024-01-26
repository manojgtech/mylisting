@extends('layouts.app')

@section('content')
<style>
    .fb-profile-block {
  margin: auto;
  position: relative;
  width: 100%;
}
/* .cover-container{
    background: #1E90FF;
    background: -webkit-radial-gradient(bottom, #73D6F5 12%, #1E90FF);
    background: radial-gradient(at bottom, #73D6F5 12%, #1E90FF)
} */
.fb-profile-block-thumb{
  display: block;
  height: 315px;
  overflow: hidden;
  position: relative;
  text-decoration: none;
}
.fb-profile-block-menu {
  border: 1px solid #d3d6db;
  border-radius: 0 0 3px 3px;
}
.profile-img a{
    bottom: 15px;
    box-shadow: none;
	display: block;
	left: 15px;
	padding:1px;
	position: absolute;
	height: 160px;
	width: 160px;
	background: rgba(0, 0, 0, 0.3) none repeat scroll 0 0;
	z-index:9;
}
.profile-img img {
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.07);
  height:158px;
  padding: 5px;
  width:158px;
}
.profile-name {
  bottom: 60px;
  left: 200px;
  position: absolute;
}
.profile-name h2 {
  color: #fff;
  font-size: 24px;
  font-weight: 600;
  line-height: 30px;
  max-width: 275px;
  position: relative;
  text-transform: uppercase;
}
.fb-profile-block-menu{
  height: 44px;
  position: relative;
  width:100%;
  overflow:hidden;
 }
.block-menu {
  clear: right;
  padding-left: 205px;
}
.block-menu ul{
	margin:0;
	padding:0;
}
.block-menu ul li{
	display:inline-block;
}
.block-menu ul li a {
  border-right: 1px solid #e9eaed;
  float: left;
  font-size: 14px;
  font-weight: bold;
  height: 42px;
  line-height: 3.0;
  padding: 0 17px;
  position: relative;
  vertical-align: middle;
  white-space: nowrap;
  color:#4b4f56;
  text-transform:capitalize;
}
.block-menu ul li:first-child a{
  border-left: 1px solid #e9eaed;
}
</style>
<div>
    @php 
      $st="";
     if($list->cover){
        $st='style="background-image:url('.url($list->cover).');"';
     }
    @endphp
    <div class="container-fluid" {!! $st !!}>
    <div class="row">
        <div class="col-md-12">
            <div class="fb-profile-block">
                <div class="fb-profile-block-thumb cover-container"></div>
                <div class="profile-img">
                    <a href="#">
                        <img src="{{$list->logo ? url($list->logo):''}}" alt="" title="{{$list->title}}">        
                    </a>
                </div>
                <div class="profile-name">
                    <h2>{{$list->title}}</h2>
                </div>
                
                <div class="fb-profile-block-menu ">
                    <div class="block-menu">
                        <ul>
                            <li><a href="#">Youtube</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Catelogue</a></li>
                            
                        </ul>
                    </div>
                    <div class="block-menu">
                        <ul>
                        <li><a href="#">Youtube</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Catelogue</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
    </div>
        <!-- Swiper -->
        <div class="swiper-container" style="margin-top: 20px;">
        <h2>Photo Gallery</h2>
            <div class="swiper-wrapper">
            @if(count($list->images))
            @foreach($list->images as $img)
                <div class="swiper-slide">
                    <a href="{{url($img->image)}}" class="grid image-link">
                        <img src="{{url($img->image)}}" class="img-fluid" alt="{{$list->title}}">
                    </a>
                </div>
                @endforeach
                @endif
                
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
    </div>
    <!--//END BOOKING -->
    <!--============================= RESERVE A SEAT =============================-->
    <section class="reserve-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>{{$list->title}}</h5>
                    @if(isset($list->price))
                    <p><span>Rs</span>{{$list->price}}</p>
                    @endif
                    <!-- <p class="reserve-description">Innovative cooking, paired with fine wines in a modern setting.</p> -->
                </div>
                <div class="col-md-6">
                    <div class="reserve-seat-block">
                        <div class="reserve-rating">
                            <span>9.5</span>
                        </div>
                        <div class="review-btn">
                            <a id="addReview" class="btn btn-outline-danger">WRITE A REVIEW</a>
                            <span>34 reviews</span>
                        </div>
                        <div class="reserve-btn">
                            <div class="featured-btn-wrap">
                                <a href="#" class="btn btn-danger">BOOK SERVICE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END RESERVE A SEAT -->
    <!--============================= BOOKING DETAILS =============================-->
    <section class="light-bg booking-details_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8 responsive-wrap">
                    <div class="booking-checkbox_wrap">
                        <div class="booking-checkbox">
                        {!! html_entity_decode($list->description) !!}
                            <hr>
                        </div>
                        <div class="row d-none">
                            <div class="col-md-4">
                                <label class="custom-checkbox">
                        <span class="ti-check-box"></span>
                        <span class="custom-control-description">Bike Parking</span>
                      </label> </div>
                            <div class="col-md-4">
                                <label class="custom-checkbox">
                       <span class="ti-check-box"></span>
                       <span class="custom-control-description">Wireless Internet  </span>
                     </label>
                            </div>
                            <div class="col-md-4">
                                <label class="custom-checkbox">
                     <span class="ti-check-box"></span>
                     <span class="custom-control-description">Smoking Allowed  </span>
                   </label> </div>
                            <div class="col-md-4">
                                <label class="custom-checkbox">
                    <span class="ti-check-box"></span>
                    <span class="custom-control-description">Street Parking</span>
                  </label>
                            </div>
                            <div class="col-md-4">
                                <label class="custom-checkbox">
                   <span class="ti-check-box"></span>
                   <span class="custom-control-description">Special</span>
                 </label> </div>
                            <div class="col-md-4">
                                <label class="custom-checkbox">
                  <span class="ti-check-box"></span>
                  <span class="custom-control-description">Accepts Credit cards</span>
                </label>
                            </div>
                        </div>
                    </div>
                    <div class="booking-checkbox_wrap mt-4">
                        <h5>{{count($list->reviews)}} Reviews</h5>
                        <hr>
                        @if(count($list->reviews)>0)
                         @foreach($list->reviews as $review)
                        <div class="customer-review_wrap">
                            <div class="customer-img">
                                <img src="{{$review->user->pic!='' ? url($review->user->pic) : url('images/dpuser.png') }}" class="img-fluid" alt="#" style="width:60px;">
                                <p>{{$review->user->name}}</p>
                                <!-- <span>Reviews</span> -->
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="customer-review">
                                        <h6>{{$review->title}}</h6>
                                        @for($i=1;$i<=$review->star;$i++)
                                        <span></span>
                                        @endfor
                                        @for($i=1;$i<=(5-$review->star);$i++)
                                        <span class="round-icon-blank"></span>
                                        @endfor
                                        
                                        <p>{{$review->created_at}}</p>
                                    </div>
                                    <!-- <div class="customer-rating">8.0</div> -->
                                </div>
                                <p class="customer-text">
                                    {{$review->comment}}
                                </p>
                               @if(count($review->pics))
                                <ul>
                                    @foreach($review->pics as $pic)
                                    <li><img src="{{url($pic->img)}}" class="img-fluid" alt="#"></li>
                                    @endforeach
                                </ul>
                                @endif
                                <span>{{$review->likes}} people marked this review as helpful</span>
                                <a onclick="markHelp(this);" style="cursor: pointer;" data-review="{{$review->id}}"><span class="icon-like"></span>Helpful</a>
                            </div>
                        </div>
                        <hr>
             @endforeach
             @endif
                        
                    </div>
                </div>
                <div class="col-md-4 responsive-wrap">
                    <div class="contact-info">
                        <!-- <img src="images/map.jpg" class="img-fluid" alt="#"> -->
                        <a href="https://maps.googleapis.com/maps/api/directions/json?destination={{urlencode($list->location)}}&origin=new+delhi" class="btn btn-primary text-center">Get Directions <i class="fa fa-map"></i></a>
                        <div class="address">
                            <span class="icon-location-pin"></span>
                            <p> {{$list->location}}<br> {{$list->cityname->city}},<br>{{$list->statename->state}} ,{{$list->zip}}</p>
                        </div>
                        <div class="address">
                            <span class="icon-screen-smartphone"></span>
                            <p> <a href="tel:{{$list->phone}}" target="_blank">{{$list->phone}}</a></p>
                        </div>
                        <div class="address">
                            <span class="icon-link"></span>
                            <p><a href="{{$list->website}}">{{$list->website}}</a></p>
                        </div>
                        <div class="address">
                            <span class="icon-clock"></span>
                            <p>Mon - Sun 09:30 am - 05:30 pm <br>
                                <span class="open-now">OPEN NOW</span></p>
                        </div>
                        <a href="#" class="btn btn-outline-danger btn-contact">SEND A MESSAGE</a>
                    </div>
                    <div class="follow">
                        <div class="follow-img">
                            <img src="{{$list->user->pic!='' ? url($list->user->pic) : url('images/dpuser.png') }}" class="img-fluid" alt="{{$list->user->name}}" style="width:80px;">
                            <h6>{{$list->user->name}}</h6>
                            <!-- <span>New York</span> -->
                        </div>
                        <ul class="social-counts">
                            <li>
                                <h6>26</h6>
                                <span>Listings</span>
                            </li>
                            <li>
                                <h6>326</h6>
                                <span>Followers</span>
                            </li>
                            <li>
                                <h6>12</h6>
                                <span>Followers</span>
                            </li>
                        </ul>
                        <a href="#">FOLLOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection