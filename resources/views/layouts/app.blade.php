<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      
    
        <link rel="stylesheet" href="{{ asset('asset/vendor/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/swiper/swiper-bundle.min.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700&amp;display=swap">
<!-- 
    <link rel="stylesheet" href="{{ asset('asset/vendor/glightbox/css/glightbox.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('asset/css/style.default.css') }}" id="theme-stylesheet">
    
    <link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/vendor/swiper/swiper-bundle.min.css') }}"> -->

        <!--linear icon css-->
        <!-- <link rel="stylesheet" href="{{ asset('asset/css/style.default.css') }}" id="theme-stylesheet"/> -->
		<link rel="stylesheet" href="{{ asset('assets/css/linearicons.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700&amp;display=swap">

<link rel="stylesheet" href="{{ asset('asset/vendor/glightbox/css/glightbox.min.css') }}">
	
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
        <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">

		<!--slick.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootsnav.css') }}" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <style>
          .col-lg-3.px-lg-2 {
    margin-bottom: 19px;
}
p.categories-item-number.small.mb-0{
  background-color: #fef !important;
}
        </style>
        
    </head>
    <body id="page-top" data-baseurl="{{env('APP_URL','https://finded.in')}}">

    <header id="header-top" class="header-top" style="display:none;">
			<ul class="d-none">
				<li>
					<div class="header-top-left">
						<ul style="display: none;">
							<li class="select-opt">
								<select name="language" id="language">
									<option value="default">EN</option>
									<option value="Bangla">BN</option>
									<option value="Arabic">AB</option>
								</select>
							</li>
							<li class="select-opt">
								<select name="currency" id="currency">
									<option value="usd">USD</option>
									<option value="euro">Euro</option>
									<option value="bdt">BDT</option>
								</select>
							</li>
							<li class="select-opt">
								<a href="#"><span class="lnr lnr-magnifier"></span></a>
							</li>
						</ul>
					</div>
				</li>
				<li class="head-responsive-right pull-right">
					<div class="header-top-right">
						<ul>
							<li class="header-top-contact">
								+1 222 777 6565
							</li>
              @guest
                            @if (Route::has('login'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('getstarted') }}">Signup</a></li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                        <li class="nav-item">  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{url('/dashboard')}}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a></li>

                                

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li class="nav-item"> <a class="dropdown-item" href="{{url('/dashboard')}}">
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
             
						</ul>
					</div>
				</li>
			</ul>
					
		</header><!--/.header-top-->
	
    <!-- top-area Start -->
		<section class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
			    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

			        <div class="container">

			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
			                <a class="navbar-brand" href="{{url('/')}}">{{ config('app.name', 'Laravel') }}</a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
			                    <li class="nav-item active"><a href="{{url('/')}}">Home</a></li>
			                    <li class="nav-item"><a href="{{url('/categories')}}">Categories</a></li>
			                    <!-- <li class="nav-item"><a href="{{url('explore')}}">Listings</a></li> -->
			                    <!-- <li class="scroll"><a href="#reviews">review</a></li> -->
			                    <li class="nav-item"><a href="{{url('blog')}}">Blogs</a></li>
                                @guest
                            @if (Route::has('login'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('getstarted') }}">Signup</a></li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                                <li class="nav-item"><a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{url('/dashboard')}}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li class="nav-item"> <a class="dropdown-item" href="{{url('/dashboard')}}">
                                        {{ __('Dashboard') }}
                                    </a></li>
                                    <li class="nav-item"> <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
			                    <!-- <li class="scroll"><a href="#contact">contact</a></li> -->
			                </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->
		    <div class="clearfix"></div>

		</section><!-- /.top-area-->
		<!-- top-area End -->

        <!-- Navigation-->
       
        <main>
            @yield('content')
        </main>
   <!-- Footer-->
   
		<!--subscription strat -->

        <section class="pb-5">
      <div class="container pb-5">
        <header class="text-center mb-5">
          <h2 class="mb-1">Explore our categories</h2>
          <!-- <p class="text-muted text-sm">Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p> -->
        </header>
        <div class="row text-center gy-4">
          <div class="col-lg-3 px-lg-2">
            <div class="categories-item card border-0 shadow hover-transition">
              <div class="card-body px-4 py-5">
                    <svg class="svg-icon mb-3">
                      <use xlink:href="#!stack-1"> </use>
                    </svg>
                <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="#!">Marketing</a></h2>
                <p class="categories-item-number small mb-0">2 Items</p>
              </div>
            </div>
          </div>
          
          <div class="col-lg-12 text-center pt-4"><a class="btn btn-primary" href="#!">Show more categories</a></div>
        </div>
      </div>
    </section>
		<section id="contact"  class="subscription">
			<div class="container">
				<div class="subscribe-title text-center">
					<h2>
						do you want to add your business listing with us?
					</h2>
					<p>
						Listrace offer you to list your business with us and we very much able to promote your Business.
					</p>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="subscription-input-group">
							<form action="{{url('registernow')}}" method="post">
                                @csrf
								<input type="email" name="email" required class="subscription-input-form" placeholder="Enter your email here">
								<button class="appsLand-btn subscribe-btn" type="submit">
									creat account
								</button>
							</form>
						</div>
					</div>	
				</div>
			</div>

		</section><!--/subscription-->	
		<!--subscription end -->

		<!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
				<div class="footer-menu">
		           	<div class="row">
			           	<div class="col-sm-3">
			           		 <div class="navbar-header">
				                <a class="navbar-brand" href="{{url('/')}}">{{ config('app.name', 'Laravel') }}</a>
				            </div><!--/.navbar-header-->
			           	</div>
			           	<div class="col-sm-9">
			           		<ul class="footer-menu-item">
			                    <li class="scroll"><a href="#works">how it works</a></li>
			                    
			                </ul><!--/.nav -->
			           	</div>
		           </div>
				</div>
				<div class="hm-footer-copyright">
					<div class="row">
						<div class="col-sm-5">
							<p>
								&copy;copyright. designed and developed by <a href="https://www.finded,in.com/">Finded.in</a>
							</p>
						</div>
						<div class="col-sm-7">
							<div class="footer-social">
								<span><i class="fa fa-phone"> +1  (222) 777 8888</i></span>
								<a href="#"><i class="fa fa-facebook"></i></a>	
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
					</div>
					
				</div><!--/.hm-footer-copyright-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.footer-->
		<!--footer end-->
		
		<script src="{{asset('assets/js/jquery.js')}}"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
		
		
		<script src="{{asset('assets/js/bootsnav.js')}}"></script>

    
        <script  src="{{asset('assets/js/feather.min.js')}}"></script>

        <!-- counter js -->
		<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
		<script src="{{asset('assets/js/waypoints.min.js')}}"></script>

        <!--slick.min.js-->
        <script src="{{asset('assets/js/slick.min.js')}}"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script  src="{{ asset('asset/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <!--Custom JS-->
        <script src="{{asset('assets/js/custom.js')}}"></script>
        <script src="{{asset('asset/vendor/glightbox/js/glightbox.min.js')}}"></script>
        <script src="{{asset('assets/js/front.js')}}"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<script>
    $(document).ready(function(){
        getLocation();
    filtercat(event,2,1);
    if($("#catlinkid").length){
        $("#catlinkid a").each(function(el,elem){
       $(elem).removeAttr("href")
    });
    
        
       
        
    }
    
});
    function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  
  document.body.setAttribute("data-lat",position.coords.latitude);
  document.body.setAttribute("data-lang",position.coords.longitude);
}
    </script>

    
    <script>
      
      function filtercat(e,t,p){
        e.preventDefault();
        var form=$("#catfilter");
        const formData = new FormData();
        var burl=$("body").data('baseurl');
        $(".spinner-border").css("display",'block');
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
     });
     
     let c= t==1 ? form.serialize():null;
     $("#catpagemeta").attr("data-page",p)
    $("#catpagemeta").attr("data-cats",c);
        var saveData = $.ajax({
      type: 'GET',
      url: burl+"/categoriesdata",
      data: "c="+c+"&page="+p,
      dataType: "text",
      success: function(resultData) { 
        var res=JSON.parse(resultData);
        $(".spinner-border").css("display",'none');
        $("#catlistview1").html(res.html);
        setTimeout(() => {
            $("#catlinkid a").each(function(el,elem){
            $(elem).removeAttr("href")
            $(elem).click(function(){
              var p=$(this).html();
              $("#catpagemeta").attr("data-cat",c)
              var x=c==null ? 2:1;
              
              filtercat(e,x,p);
           });

          });
        $("#catlinkid").css("display","block");
        }, 1000);
        
         }
});
return false;

      }

     
    </script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
    </script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
  </body>
</html>
