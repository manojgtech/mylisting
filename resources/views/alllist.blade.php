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

<section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 responsive-wrap">
                    <div class="row detail-filter-wrap">
                    <div class="col-md-4 featured-responsive">
                            <div class="detail-filter-text">
                                <p>34 Results For <span>Restaurant</span></p>
                            </div>
                        </div>
                        <div class="col-md-8 featured-responsive">
                            <div class="detail-filter">
                                <p>Filter by</p>
                                <form class="filter-dropdown">
                                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                  <option selected>Best Match</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                                </form>
                                <form class="filter-dropdown">
                                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect1">
                  <option selected>Restaurants</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                                </form>
                                <div class="map-responsive-wrap">
                                    <a class="map-icon" href="#"><span class="icon-location-pin"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row detail-checkbox-wrap">
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">

                            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Bike Parking</span>
              </label>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Wireless Internet  </span>
              </label>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">

                            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Smoking Allowed  </span>
              </label>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Street Parking</span>
              </label>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">

                            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Special</span>
              </label>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Accepts Credit cards</span>
              </label>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">

                            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Pets Friendly</span>
              </label>

                        </div>
                    </div>
                    <div class="row light-bg detail-options-wrap">
                        @if(count($flist)>0)
                         @foreach($flist as $list)
                        <div class="col-sm-6 col-lg-12 col-xl-6 featured-responsive">
                            <div class="featured-place-wrap">
                                <a href="detail.html">
                                    <img src="images/featured1.jpg" class="img-fluid" alt="#">
                                    <span class="featured-rating-orange ">6.5</span>
                                    <div class="featured-title-box">
                                        <h6>{{$list->title}}</h6>
                                        <p>Restaurant </p> <span>• </span>
                                        <p>3 Reviews</p> <span> • </span>
                                        <p><span>$$$</span>$$</p>
                                        <ul>
                                            <li><span class="icon-location-pin"></span>
                                                <p>1301 Avenue, Brooklyn, NY 11230</p>
                                            </li>
                                            <li><span class="icon-screen-smartphone"></span>
                                                <p>+44 20 7336 8898</p>
                                            </li>
                                            <li><span class="icon-link"></span>
                                                <p>https://burgerandlobster.com</p>
                                            </li>

                                        </ul>
                                        <div class="bottom-icons">
                                            <div class="closed-now">CLOSED NOW</div>
                                            <span class="ti-heart"></span>
                                            <span class="ti-bookmark"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @endif
                       
                    </div>
                </div>
                <!-- <div class="col-md-5 responsive-wrap map-wrap">
                    <div class="map-fix">
                        <!-- data-toggle="affix" -->
                        <!-- Google map will appear here! Edit the Latitude, Longitude and Zoom Level below using data-attr-*  -->
                        <div id="map" data-lat="40.674" data-lon="-73.945" data-zoom="14"></div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- <script>
        $(".map-icon").click(function() {
            $(".map-fix").toggle();
        });
    </script>
    <script>
        // Want to customize colors? go to snazzymaps.com
        function myMap() {
            var maplat = $('#map').data('lat');
            var maplon = $('#map').data('lon');
            var mapzoom = $('#map').data('zoom');
            // Styles a map in night mode.
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: maplat,
                    lng: maplon
                },
                zoom: mapzoom,
                scrollwheel: false
            });
            var marker = new google.maps.Marker({
                position: {
                    lat: maplat,
                    lng: maplon
                },
                map: map,
                title: 'We are here!'
            });
        }
    </script>
    <!-- Map JS (Please change the API key below. Read documentation for more info) -->
    <script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyDMTUkJAmi1ahsx9uCGSgmcSmqDTBF9ygg"></script> -->
    @endsection