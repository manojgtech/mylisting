@extends('layouts.app')

@section('content')
<section class="slider d-flex align-items-center">
        <!-- <img src="images/slider.jpg" class="img-fluid" alt="#"> -->
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <h1>Discover great places around yourself</h1>
                                    <h5>Let's uncover the best places to eat, drink, and shop nearest to you.</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <form class="form-wrap mt-4" action="{{url('search')}}" method="GET">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <input type="text" name="q"  placeholder="What are your looking for?" class="btn-group1">
                                        <!-- <input type="text" placeholder="All cities" class="btn-group2"> -->
                                        <select  name="city" id="selectcity" class="btn-group2">
                                            <option>All cities</option>
                                            @foreach($cities as $city)
<option value="{{$city->city}}">{{$city->city}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn-form"><span class="icon-magnifier search-icon"></span>SEARCH<i class="pe-7s-angle-right"></i></button>
                                    </div>
                                </form>
                                <div class="slider-link">
                                    <a href="#">Browse Popular</a><span>or</span> <a href="#">Recently Added</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Search Results for : <b>{{$keyword}}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
				@if(count($catlist)>0)
				@foreach($catlist as $list)
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap">
						@php
						$pimg=isset($list->images[0]) ? $list->images[0]->image:'';
						@endphp
                        <a href="{{url('list/'.$list->slug)}}">
                            <img src="{{asset($pimg)}}" class="img-fluid" alt="{{$list->title}}">
                            <span class="featured-rating-orange">6.5</span>
                            <div class="featured-title-box">
                                <h6>{{$list->title}}</h6>
                                <p>{{$list->categoryname->name}} </p> <span>•</span>
                                <!-- <p>3 Reviews</p> <span> • </span> -->
                                <!-- <p><span>$$$</span>$$</p> -->
                                <ul>
                                    <li><span class="icon-location-pin"></span>
                                        <p>{{$list->cityname->city}},{{$list->state}}&nbsp;{{$list->zip}}</p>
                                    </li>
                                    <li><span class="icon-screen-smartphone"></span>
                                        <p><a href="tel:{{$list->phone}}" target="_blank">{{$list->phone}}</a></p>
                                    </li>
                                    <li><span class="icon-link"></span>
                                        <p><a href="{{$list->website}}" target="_blank">{{$list->website}}</a></p>
                                    </li>

                                </ul>
                                @guest

                                @else
                                <div class="bottom-icons">
                                    <!-- <div class="closed-now">CLOSED NOW</div> -->
                                    <span class="ti-heart"></span>
                                    <span class="ti-bookmark"></span>
                                </div>
                                @endguest
                            </div>
                        </a>
                    </div>
                </div>
				@endforeach
                @endif
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="#" class="btn btn-danger">VIEW ALL</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-white mt-0 text-center">Business Categories</h2>
                        <hr class="divider divider-light" />
                        <!-- <p class="text-white-75 mb-4"></p> -->
                        <div class="row">
                            @foreach($cats as $cat)
                            @php
                              $cn=str_replace(" ","-",$cat->name);
                            @endphp
                         <div class="col-md-3">
                            <div class="card bg-primary">
                                <div class="card-body text-info"><a class="text-info" href={{url('category/'.$cn)}}>{{$cat->name}}</a></div>
                            </div>
                         </div>
                            @endforeach
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>
        
        @endsection