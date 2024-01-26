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
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/set1.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
	
        <style>
          .col-lg-3.px-lg-2 {
    margin-bottom: 19px;
}
#loginModal p.categories-item-number.small.mb-0,#RegModal p.categories-item-number.small.mb-0{
  background-color: #fef !important;
}
@media (min-width: 576px) {
  #loginModal .modal-dialog,#RegModal .modal-dialog{
    max-width: 400px;
  }
  #loginModal .modal-dialog .modal-content,#RegModal .modal-dialog .modal-content{
    padding: 1rem;
  }
}
#loginModal .modal-header .close,#RegModal.modal-header .close {
  margin-top: -1.5rem;
}

#loginModal .form-title,#RegModal .form-title{
  margin: -2rem 0rem 2rem;
}

#loginModal .btn-round,#RegModal .btn-round {
  border-radius: 3rem;
}

#loginModal .delimiter,#RegModal .signup-section {
  padding: 1rem;
}

#loginModal .social-buttons .btn,#RegModal .signup-section {
  margin: 0 0.5rem 1rem;
}

#loginModal .signup-section,#RegModal .signup-section {
  padding: 0.3rem 0rem;
}
        </style>
        
    </head>
    <body id="page-top" data-baseurl="{{env('APP_URL','https://finded.in')}}">

    <div class="nav-menu">
        <div class="bg transition">
            <div class="container-fluid fixed">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="{{url('/')}}">{{ config('app.name', 'Finded') }}</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-menu"></span>
              </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                   
                                <li class="nav-item active">
                                        <a class="nav-link" href="#">Categories</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Contact</a>
                                    </li>
                                  
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">About</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" data-toggle="modal" data-target="#loginModal">Login</a>
                                    </li>
                                    @guest
                            @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Free Listing</a></li>
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
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
   
		<!-- top-area End -->

        <!-- Navigation-->
       
        <main>
            @yield('content')
        </main>
  
        <footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Finded
          </h6>
          <p>
            Find you local business ,shop ,hotels and events
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Contact</a>
          </p>
          <p>
            <a href="#!" class="text-reset">About</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Why Us</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Services</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Privacy Policy</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Categories</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Cities</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact Us</h6>
          <p><i class="fas fa-home me-3"></i> Sector 22,Noida ,UP</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@finded.in
          </p>
          <p><i class="fas fa-phone me-3"></i> +91 8447311900</p>
          <p><i class="fas fa-print me-3"></i> +91 8351038570</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="https://finded.in/">finded.in</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Login</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form id="login_form" action="{{url('userlogin')}}">
            <div class="form-group">
              <input type="email" name="email" class="form-control" id="email1" placeholder="Your email address...">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" id="password1" placeholder="Your password...">
            </div>
            <button type="submit" class="btn btn-info btn-block btn-round">Login</button>
          </form>
          
          <div class="text-center text-muted delimiter">or use a social network</div>
          
      </div>
    </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Not a member yet? <a href="{{url('signup')}}" class="text-info"> Sign Up</a>.</div>
      </div>
  </div>
</div> 
</div>
<!-- register -->

<div class="modal fade" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Register</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form>
          <div class="form-group">
              <input type="text"  name="name" class="form-control" id="regename" placeholder="Your name...">
            </div>
            <div class="form-group">
              <input type="tel" class="form-control" id="reg_phone" placeholder="Your mobile address...">
            </div>
            <div class="form-group">
              <input type="email" name="reg_email" class="form-control" id="reg_email" placeholder="Your email address...">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" id="reg_password" placeholder="Your password...">
            </div>
            <button type="button" class="btn btn-info btn-block btn-round">Login</button>
          </form>
          
          <div class="text-center text-muted delimiter">or use a social network</div>
          <div class="d-flex justify-content-center social-buttons">
            <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
              <i class="fab fa-twitter"></i>
            </button>
            <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
              <i class="fab fa-facebook"></i>
            </button>
            <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
              <i class="fab fa-linkedin"></i>
            </button>
        </div>
      </div>
    </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div>
      </div>
  </div>
</div> 
</div>
		
		<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
        
        <!--modernizr.min.js-->
        <script  src="{{asset('assets/js/popper.min.js')}}"></script>

        <!-- counter js -->
		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.magnific-popup.js')}}"></script>
        <script src="{{asset('assets/js/swiper.min.js')}}"></script>
        <script>
        $(window).scroll(function() {
            // 100 = The point you would like to fade the nav in.

            if ($(window).scrollTop() > 100) {

                $('.fixed').addClass('is-sticky');

            } else {

                $('.fixed').removeClass('is-sticky');

            };
        });
    </script>
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
function openReg(){
  $("#loginModal").modal('hide');
  $("#RegModal").modal('show');
}
    </script>

    
    <script>
      
      function filtercat(e,t,p){
        //e.preventDefault();
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
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>
        if ($('.image-link').length) {
            $('.image-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
        if ($('.image-link2').length) {
            $('.image-link2').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }

        
        //loginnow
        $("#login_form").submit(function(e){
         e.preventDefault();

        var all =  new FormData(document.getElementById("login_form"));
        console.log("all",all);
        
          var f=document.getElementById("login_form");
          var action=f.getAttribute("action");
          let email=$("#email1").val();
          let password=$("#password1").val();
          var data={}
        $.ajax({
            url: action,
            type: "POST",
            data: {email,password},
            //processData: false,
            success: function(data){
                if (data.status==0) {
                    $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });
                }
                if(data == 1){
                    window.location.replace(
                     '{{url("/")}}'
                    );
                }else if(data == 2){
                    $("#show_error").hide().html("Invalid login details");
                }

            }
            });

        });

    </script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
  </body>
</html>
