@extends('layouts.app')

@section('content')

    
    
		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">
			<div class="container">
				<div class="welcome-hero-txt">
					<h2>best place to find and explore <br> that all you need </h2>
					<p>
						Find Best Place, Restaurant, Hotel, Real State and many more think in just One click 
					</p>
				</div>
				<div class="welcome-hero-serch-box">
					<div class="welcome-hero-form">
						<div class="single-welcome-hero-form">
							<h3>what?</h3>
							<form action="{{url('/search')}}">
								<input type="text" name="q" placeholder="Ex: palce, resturent, food, automobile" />
							
							<div class="welcome-hero-form-icon">
								<i class="flaticon-list-with-dots"></i>
							</div>
						</div>
						<div class="single-welcome-hero-form">
							<h3>location</h3>
						
								<input type="text" name="loc" placeholder="Ex: delhi, noida, mumbai.." />
							
							<div class="welcome-hero-form-icon">
								<i class="flaticon-gps-fixed-indicator"></i>
							</div>
						</div>
					</div>
					<div class="welcome-hero-serch">
						<button class="welcome-hero-btn" type="submit" onclick="">
							 search  <i data-feather="search"></i> 
						</button>
						</form>
					</div>
				</div>
			</div>

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!--list-topics start -->
		<section id="list-topics" class="list-topics">
			<div class="container">
				<div class="list-topics-content" style="font-size: 9px;">
					<ul>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-restaurant"></i>
								</div>
								<h2><a href="{{url('category/restaurants')}}">Resturents</a></h2>
								<p>150 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-travel"></i>
								</div>
								<h2><a href="{{url('category/travel-and-tourism')}}">Travel</a></h2>
								<p>214 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-building"></i>
								</div>
								<h2><a href="{{url('category/hotels')}}">Hotels</a></h2>
								<p>185 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-pills"></i>
								</div>
								<h2><a href="{{url('category/healthcare')}}">Healthcare</a></h2>
								<p>200 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-transport"></i>
								</div>
								<h2><a href="{{url('category/transport')}}">Transport</a></h2>
								<p>120 listings</p>
							</div>
						</li>
					</ul>
				</div>
			</div><!--/.container-->

		</section><!--/.list-topics-->
		<!--list-topics end-->
<!--works start -->
<section id="works" class="works">
			<div class="container">
				<div class="section-header">
					<h2>how it works</h2>
					<p>Creating an effective business listing is crucial for attracting potential customers and providing them with the information they need to understand how your business works. A well-written business listing should be informative, engaging, and clear.</p>
				</div><!--/.section-header-->
				<div class="works-content">
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<i class="flaticon-lightbulb-idea"></i>
								</div>
								<h2><a href="#">choose <span> what to</span> do</a></h2>
								<p>
								Start with a catchy and relevant business name that reflects your brand identity. Follow it with a brief overview of your business that highlights what you do and what sets you apart from your competitors.






 
								</p>
								<button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
									read more
								</button>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<i class="flaticon-networking"></i>
								</div>
								<h2><a href="#">find <span> what you want</span></a></h2>
								<p>
								Specify who your target audience is. This helps potential customers quickly determine if your business caters to their needs.
								</p>
								<button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
									read more
								</button>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<i class="flaticon-location-on-road"></i>
								</div>
								<h2><a href="#">explore <span> amazing</span> place</a></h2>
								<p>
								Include your business's physical location, contact details (phone number, email), and website link. This information helps customers find and reach you easily.


								</p>
								<button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
									read more
								</button>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.container-->
		
		</section><!--/.works-->
		<!--works end -->

		<!--explore start -->
		<section id="explore" class="explore">
			<div class="container">
				<div class="section-header">
					<h2>Featured Listings</h2>
					<p>Explore New place, food, culture around the world and many more</p>
				</div><!--/.section-header-->
				<div class="explore-content">
					<div class="row">
					@if(count($flist)>0)
      @foreach($flist as $list)
						<div class=" col-md-4 col-sm-6">
							<div class="single-explore-item" style="max-height: 120px;">
								<div class="single-explore-img" style="max-height: 167px;">
									<img src="{{!empty($list->images[0]) ? url($list->images[0]->image):url('/ldp.jpeg') }}" alt="{{$list->title}}">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='{{url('/list/'.$list->slug)}}'">best rated</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-1">
									<h2><a href="{{url('/list/'.$list->slug)}}">{{$list->title}}</a></h2>
									<p class="explore-rating-price">
										<span class="explore-rating">5.0</span>
										<a href="{{url('/list/'.$list->slug)}}"> 10 ratings</a> 
										<span class="explore-price-box">
											form
											<span class="explore-price">5$-300$</span>
										</span>
										 <a href="{{url('/category/'.str_replace(" ","-",isset($list->category->slug) ? $list->category->slug :''))}}">{{isset($list->category->name) ? $list->category->name : ''}}</a>
									</p>
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="{{url('/')}}">
														<img src="{{url($list->user->pic)}}" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
												<p>
													{{$list->getShortDesc()}}
												</p>
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn" onclick="window.location.href='{{url('/list/'.$list->slug)}}'">close now</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        @endforeach
    @else
 <div class="col-md-8 text-center text-danger">No Listing for category </div>
    @endif
						
					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.explore-->
		<!--explore end -->


		<section id="explore" class="explore">
			<div class="container">
				<div class="section-header">
					<h2>Recent Listings</h2>
					<p>Explore recent listings</p>
				</div><!--/.section-header-->
				<div class="explore-content">
					<div class="row">
					@if(count($tlist)>0)
      @foreach($tlist as $list)
						<div class=" col-md-4 col-sm-6">
							<div class="single-explore-item" style="max-height: 120px;">
								<div class="single-explore-img" style="max-height: 167px;">
									<img src="{{!empty($list->images[0]) ? url($list->images[0]->image):url('/ldp.jpeg') }}" alt="{{$list->title}}">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='{{url('/list/'.$list->slug)}}'">best rated</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-1">
									<h2><a href="{{url('/list/'.$list->slug)}}">{{$list->title}}</a></h2>
									<p class="explore-rating-price">
										<span class="explore-rating">5.0</span>
										<a href="{{url('/list/'.$list->slug)}}"> 10 ratings</a> 
										<span class="explore-price-box">
											form
											<span class="explore-price">5$-300$</span>
										</span>
										 <a href="{{url('/category/'.str_replace(" ","-",isset($list->category->slug) ? $list->category->slug :''))}}">{{isset($list->category->name) ? $list->category->name : ''}}</a>
									</p>
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="{{url('/')}}">
														<img src="{{url($list->user->pic)}}" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
												<p>
													{{$list->getShortDesc()}}
												</p>
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn" onclick="window.location.href='{{url('/list/'.$list->slug)}}'">close now</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        @endforeach
    @else
 <div class="col-md-8 text-center text-danger">No Listing for category </div>
    @endif
						
					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.explore-->
		<!--explore end -->


		<!--reviews start -->
		<section id="reviews" class="reviews" style="display: none;">
			<div class="section-header">
				<h2>clients reviews</h2>
				<p>What our client say about us</p>
			</div><!--/.section-header-->
			<div class="reviews-content">
				<div class="testimonial-carousel">
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c1.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c2.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>monirul islam</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c3.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Shohrab Hossain</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c4.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c1.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c2.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>monirul islam</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c3.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Shohrab Hossain</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="assets/images/clients/c4.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				</div>
			</div>

		</section><!--/.reviews-->
		<!--reviews end -->
        
		<section id="explore" class="explore">
			<div class="container">
				<div class="section-header">
					<h2>Explore Cities</h2>
					<p>Explore New place, food, culture around the world and many more</p>
				</div><!--/.section-header-->
				<div class="explore-content">
					<div class="row" id="uil">
                    <div class="col-md-2">
						<div class="card">
                           <div class="card-body">
							 <img src="{{url('images/delhi.jpeg')}}" class="img-thumbnail" />
							 <div class="card-title"><h3 class="text-center">Delhi</h3></div>
						   </div>
						   
						</div>
					</div>
					<div class="col-md-2">
						<div class="card">
                           <div class="card-body">
							 <img src="{{url('images/mumbai.jpeg')}}" class="img-thumbnail" />
							 <div class="card-title"><h3 class="text-center">Mumbai</h3></div>
						   </div>
						   
						</div>
					</div>
					<div class="col-md-2">
						<div class="card">
                           <div class="card-body">
							 <img src="{{url('images/hyd.jpeg')}}" class="img-thumbnail" />
							 <div class="card-title"><h3 class="text-center">Heyderabad</h3></div>
						   </div>
						   
						</div>
					</div>
					<div class="col-md-2">
						<div class="card">
                           <div class="card-body">
							 <img src="{{url('images/chennai.jpeg')}}" class="img-thumbnail" />
							 <div class="card-title"><h3 class="text-center">Chennai</h3></div>
						   </div>
						   
						</div>
					</div>
					<div class="col-md-2">
						<div class="card">
                           <div class="card-body">
							 <img src="{{url('images/noida.jpeg')}}" class="img-thumbnail" />
							 <div class="card-title"><h3 class="text-center">Noida</h3></div>
						   </div>
						   
						</div>
					</div>
					<div class="col-md-2">
						<div class="card">
                           <div class="card-body">
							 <img src="{{url('images/bang.jpeg')}}" class="img-thumbnail" />
							 <div class="card-title"><h3 class="text-center">Bangalore</h3></div>
						   </div>
						   
						</div>
					</div>

					<div class="col-md-2">
						<div class="card">
                           <div class="card-body">
							 <img src="{{url('images/lucknow.jpeg')}}" class="img-thumbnail" />
							 <div class="card-title"><h3 class="text-center">Lucknow</h3></div>
						   </div>
						   
						</div>
					</div>
					<div class="col-md-2">
						<div class="card">
                           <div class="card-body">
							 <img src="{{url('images/pune.jpeg')}}" class="img-thumbnail" />
							 <div class="card-title"><h3 class="text-center">Pune</h3></div>
						   </div>
						   
						</div>
					</div>
					<div class="col-md-2">
						<div class="card">
                           <div class="card-body">
							 <img src="{{url('images/kanpur.jpeg')}}" class="img-thumbnail" />
							 <div class="card-title"><h3 class="text-center">Kanpur</h3></div>
						   </div>
						   
						</div>
					</div>
					<div class="col-md-2">
						<div class="card">
                           <div class="card-body">
							 <img src="{{url('images/guru.jpeg')}}" class="img-thumbnail" />
							 <div class="card-title"><h3 class="text-center">Gurugram</h3></div>
						   </div>
						   
						</div>
					</div>
					<div class="col-md-2">
						<div class="card">
                           <div class="card-body">
							 <img src="{{url('images/jaipur.jpeg')}}" class="img-thumbnail" />
							 <div class="card-title"><h3 class="text-center">Jaipur</h3></div>
						   </div>
						   
						</div>
					</div>
					<div class="col-md-2">
						<div class="card">
                           <div class="card-body">
							 <img src="{{url('images/patna.jpeg')}}" class="img-thumbnail" />
							 <div class="card-title"><h3 class="text-center">Patna</h3></div>
						   </div>
						   
						</div>
					</div>
                </div>
            </div>
        </section>
        <!-- cities -->
         <!-- About-->
        
       
       
        @endsection