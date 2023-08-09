@extends('layouts.app')

@section('content')

<header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Find Everything You Need.</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Unlock the Power of Connection: Discover, Connect, and Grow with Our Business Listing Directory.</p>
                        <form class="form-inline" id="localsearchForm">
                       <div class="row d-flex justify-content-center align-items-center">
                      <div class="col-md-12">
                        <div class="search">
                          <i class="fa fa-search"></i>
                          <input type="text" class="form-control" style="width: 68%; " placeholder="Have a question? Ask Now">
                          <select class="form-control" style="position: absolute;
    top: 0px;
    left: 470px;
    width: 31%; height:60px;">
                            <option>Select location..</option>
                            @foreach($cities as $city)
                            <option value="{{$city->city}}">{{$city->city}}</option>
                            @endforeach
                          </select>
                          <button class="btn btn-primary" style="left:682px;">Search</button>
                        </div>
                      </div>
                      
                    </div>      
                       </form>
                    </div>
                </div>
            </div>
        </header>


        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Featured Listings</h2>
                <hr class="divider" />
                <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        @if(count($flist)>0)
      <div id="news-slider" class="owl-carousel">
         @foreach($flist as $list)
        <div class="post-slide">
          <div class="post-img">
            <img src="{{!empty($list->images[0]) ? url($list->images[0]->image):url('/ldp.jpeg') }}" alt="">
            <a href="{{url('/list/'.$list->slug)}}" class="over-layer"><i class="fa fa-link"></i></a>
          </div>
          <div class="post-content">
            <h3 class="post-title">
              <a href="{{url('/list/'.$list->slug)}}">{{$list->title}}</a>
            </h3>
            <p class="post-description">{{$list->location}}</p>
            <span class="post-date"><i class="fa fa-clock-o"></i>{{date("d-m-y",strtotime($list->created_at))}}</span>
            <br/><span class="post-date"><i class="fa fa-phone"></i>{{$list->phone}}</span>
            <p><a href="{{url('/list/'.$list->slug)}}" class="read-more">view</a></p>
          </div>
        </div>
        @endforeach
      </div>
      @endif
    </div>
  </div>
</div>

                <!-- carousel -->

            </div>
        </section>

        <!-- list new -->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Recent Listings</h2>
                <hr class="divider" />
                <div class="container mb-3 mt-3">
  <button class="btn btn-primary btn-grid">Grid View</button>
  <button class="btn btn-danger btn-list">List View</button>
  
</div>
<div class="container grid-container">
  <div class="row">
    @if(count($tlist)>0)
      @foreach($tlist as $li)
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img-top" src="{{!empty($li->images[0]) ? url($li->images[0]->image):url('/ldp.jpeg') }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><a href="{{url('/list/'.$list->slug)}}">{{$li->title}}</a></h5>
          <p class="post-description">{{$list->location}}</p>
          <p class="card-text">
            <span class="post-date"><i class="fa fa-clock-o"></i>{{date("d-m-y",strtotime($list->created_at))}}</span>
            <br/><span class="post-date"><i class="fa fa-phone"></i>{{$list->phone}}</span></p>
           <p> <a href="{{url('/list/'.$list->slug)}}" class="read-more">view</a></p>
        </div>
      </div>
    </div>
     @endforeach
    @endif
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
                         <div class="col-md-3">
                            <div class="card bg-primary">
                                <div class="card-body text-info">{{$cat->name}}</div>
                            </div>
                         </div>
                            @endforeach
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio" class='d-none'>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/1.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/3.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/4.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="..." />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">List your business now!</h2>
                <a class="btn btn-light btn-xl" href="{{url("/login")}}">Get Started</a>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Ready to start your next project with us? Send us a messages and we will get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                        <div>+1 (555) 123-4567</div>
                    </div>
                </div>
            </div>
        </section>
        @endsection