@extends('layouts.app')

@section('content')
  <!-- Hero section-->
  <section class="hero d-flex align-items-end py-5 bg-cover bg-center" style="background: url({{url($list->cover)}})">
      <div class="container z-index-20 py-5 py-lg-0">
        <div class="row align-items-end gy-4">
          <div class="col-lg-7">
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0"><img class="rounded-circle" src="{{url($list->logo)}}" alt="" width="80"></div>
              <div class="ms-3">
                <h1 class="text-white">{{$list->title}}</h1>
                <ul class="list-inline mb-0 text-small">
                  <li class="list-inline-item m-0"><i class="fas fa-star text-white"></i></li>
                  <li class="list-inline-item m-0"><i class="fas fa-star text-white 1"></i></li>
                  <li class="list-inline-item m-0"><i class="fas fa-star text-white 2"></i></li>
                  <li class="list-inline-item m-0"><i class="fas fa-star text-white 3"></i></li>
                  <li class="list-inline-item m-0"><i class="fas fa-star text-white 4"></i></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-5 text-lg-end">
            <ul class="list-inline mb-0">
              <li class="list-inline-item m-1"><a class="btn btn-primary" href="#!"> <i class="fas fa-link me-2"></i>Website</a></li>
              <li class="list-inline-item m-1"><a class="btn btn-outline-light px-3" href="#!" rel="tooltip" data-bs-placement="top" title="Bookmark"><i class="fas fa-heart"></i></a></li>
              <li class="list-inline-item m-1"><a class="btn btn-outline-light px-3" href="#!" rel="tooltip" data-bs-toggle="modal" data-bs-placement="top" title="Share" data-bs-target="#shareModal"><i class="fas fa-reply"></i></a></li>
              <li class="list-inline-item m-1"><a class="btn btn-outline-light px-3" href="#!" rel="tooltip" data-bs-placement="top" title="Report"><i class="fas fa-info-circle"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!--  Share modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-3">
          <button class="btn-close d-inline-block ms-auto px-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-header border-0 px-4 py-0">
            <h5 class="modal-title" id="exampleModalCenterTitle">Share this tool</h5>
          </div>
          <div class="modal-body px-4">
            <ul class="list-inline mb-0">
              <li class="list-inline-item me-1 mb-1"><a class="social-link facebook" href="#!"><i class="fa-fw fab fa-facebook-f"></i></a></li>
              <li class="list-inline-item me-1 mb-1"><a class="social-link twitter" href="#!"><i class="fa-fw fab fa-twitter"></i></a></li>
              <li class="list-inline-item me-1 mb-1"><a class="social-link tumblr" href="#!"><i class="fa-fw fab fa-tumblr"></i></a></li>
              <li class="list-inline-item me-1 mb-1"><a class="social-link linkedin" href="#!"><i class="fa-fw fab fa-linkedin-in"></i></a></li>
              <li class="list-inline-item me-1 mb-1"><a class="social-link whatsapp" href="#!"><i class="fa-fw fab fa-whatsapp"></i></a></li>
              <li class="list-inline-item me-1 mb-1"><a class="social-link pinterest" href="#!"><i class="fa-fw fab fa-pinterest"></i></a></li>
              <li class="list-inline-item me-1 mb-1"><a class="social-link fa-envelope" href="#!"><i class="fa-fw far "></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <section class="py-5">
      <div class="container py-5">
        <div class="row gy-5">
          <div class="col-lg-8">
            <!-- About-->
            <div class="card border-0 shadow-sm mb-4 mb-lg-5 p-2 p-lg-0">
              <div class="card-body p-lg-5">
                <h2 class="h3 mb-4">About Us</h2>
                <div>
                  {!! html_entity_decode($list->description) !!}
                </div>
              </div>
            </div>
            <!-- Gallery-->
            <div class="card border-0 shadow-sm mb-4 mb-lg-5 p-2 p-lg-0">
              <div class="card-body p-lg-5">
                <h2 class="h3 mb-4">Gallery</h2>
                <div class="rounded overflow-hidden mb-3">
                  <div class="swiper tool-gallery-slider">
                    <div class="swiper-wrapper">
                    @if(count($list->images))
                    @foreach($list->images as $img)
                      <div class="swiper-slide h-auto"><a class="glightbox d-block" href="{{url($img->image)}}" data-gallery="gallery2" data-glightbox="Product item 1"><img class="img-fluid" src="{{url($img->image)}}" alt="{{$list->title}}"></a></div>
                      @endforeach
                      @endif
                    </div>
                  </div>
                </div>
                <div class="swiper tool-gallery-slider-thumbs">
                  <div class="swiper-wrapper">
                  @if(count($list->images))
                    @foreach($list->images as $img)
                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="{{url($img->image)}}" alt="..."></div>
                    @endforeach
                      @endif
                  </div>
                </div>
              </div>
            </div>
            <!-- Video-->
            <div class="card border-0 shadow-sm mb-4 mb-lg-5 p-2 p-lg-0">
              <div class="card-body p-lg-5">
                <h2 class="h3 mb-4">Watch video</h2>
                <iframe class="w-100 border-0" height="315" src="{{$list->intro}}" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
            <!-- Reviews-->
            <div class="card border-0 shadow-sm p-2 p-lg-0 d-none">
              <div class="card-body p-lg-5">
                <h2 class="h3 mb-4">Reviews</h2>
                <div class="mb-4">
                      <div class="row mb-3">
                        <div class="col-lg-8">
                          <div class="d-flex align-items-center"><img class="rounded-circle" src="img/author-3.png" alt="" width="40">
                            <div class="ms-2">
                              <h6 class="mb-0">Yuval Halevi</h6>
                              <p class="small text-muted mb-0 fw-bold">1 March , 2019 at 3:08 pm</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                          <ul class="list-inline mb-0 small ms-5 ms-lg-0">
                            <li class="list-inline-item m-0"><i class="text-primary fas fa-star"></i></li>
                            <li class="list-inline-item m-0"><i class="text-primary fas fa-star"></i></li>
                            <li class="list-inline-item m-0"><i class="text-primary fas fa-star"></i></li>
                            <li class="list-inline-item m-0"><i class="text-primary fas fa-star"></i></li>
                            <li class="list-inline-item m-0"><i class="text-primary fas fa-star-half-alt"></i></li>
                          </ul>
                        </div>
                      </div>
                      <div class="row ps-5">
                        <div class="col-12">
                          <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                      </div>
                </div>
                <div class="mb-4">
                      <div class="row mb-3">
                        <div class="col-lg-8">
                          <div class="d-flex align-items-center"><img class="rounded-circle" src="img/author-2.png" alt="" width="40">
                            <div class="ms-2">
                              <h6 class="mb-0">Theodoros Moulos</h6>
                              <p class="small text-muted mb-0 fw-bold">2 April , 2019 at 10:10 am</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                          <ul class="list-inline mb-0 small ms-5 ms-lg-0">
                            <li class="list-inline-item m-0"><i class="text-primary fas fa-star"></i></li>
                            <li class="list-inline-item m-0"><i class="text-primary fas fa-star"></i></li>
                            <li class="list-inline-item m-0"><i class="text-primary fas fa-star"></i></li>
                            <li class="list-inline-item m-0"><i class="text-primary fas fa-star"></i></li>
                            <li class="list-inline-item m-0"><i class="text-primary fas fa-star-half-alt"></i></li>
                          </ul>
                        </div>
                      </div>
                      <div class="row ps-5">
                        <div class="col-12">
                          <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                      </div>
                </div><a class="btn btn-secondary" href="#reviewPanel" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-control="reviewPanel">Add a review</a>
                <div class="collapse" id="reviewPanel">
                  <div class="pt-4">
                    <form action="#!">
                      <div class="row gy-3">
                        <div class="col-lg-6">
                          <label class="form-label" for="firstName">First name</label>
                          <input class="form-control form-control-lg" id="firstName" type="text" name="first-name" placeholder="Your first name">
                        </div>
                        <div class="col-lg-6">
                          <label class="form-label" for="lastName">Last name</label>
                          <input class="form-control form-control-lg" id="firstName" type="text" name="last-name" placeholder="Your last name">
                        </div>
                        <div class="col-12 d-flex justify-content-start">
                          <div class="rating">
                            <input type="radio" name="rating-star" id="one">
                            <label class="small mb-0" for="one"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating-star" id="two">
                            <label class="small mb-0" for="two"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating-star" id="three">
                            <label class="small mb-0" for="three"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating-star" id="four">
                            <label class="small mb-0" for="four"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating-star" id="five">
                            <label class="small mb-0" for="five"><i class="fas fa-star"></i></label>
                          </div>
                        </div>
                        <div class="col-12">
                          <label class="form-label" for="reviewMessage">Your review</label>
                          <textarea class="form-control form-control-lg" id="reviewMessage" name="review-message" rows="5" placeholder="Add a small brief about your listing."></textarea>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary" type="submit">Post your review</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <!-- Social widget-->
            <div class="card border-0 shadow-sm mb-4 mb-lg-5 p-2 p-lg-0">
              <div class="card-body p-4 p-lg-5">
                <h2 class="h3 mb-4">Social links</h2>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item"><a class="social-link facebook" href="#!"><i class="fab fa-facebook-f"></i></a></li>
                  <li class="list-inline-item"><a class="social-link twitter" href="#!"><i class="fab fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a class="social-link vimeo" href="#!"><i class="fab fa-vimeo"></i></a></li>
                  <li class="list-inline-item"><a class="social-link instagram" href="#!"><i class="fab fa-instagram"></i></a></li>
                  <li class="list-inline-item"><a class="social-link youtube" href="#!"><i class="fab fa-youtube"></i></a></li>
                </ul>
              </div>
            </div>
            <!-- Categories widget-->
            <div class="card border-0 shadow-sm mb-4 mb-lg-5 p-2 p-lg-0">
              <div class="card-body p-4 p-lg-5">
                <h2 class="h3 mb-4">Categories</h2>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item m-1"><a class="btn btn-light" href="#!">Marketing</a></li>
                  <li class="list-inline-item m-1"><a class="btn btn-light" href="#!">CRM</a></li>
                  <li class="list-inline-item m-1"><a class="btn btn-light" href="#!">Sales</a></li>
                  <li class="list-inline-item m-1"><a class="btn btn-light" href="#!">Productivity</a></li>
                </ul>
              </div>
            </div>
            <!-- Tags widget-->
            <div class="card border-0 shadow-sm mb-4 mb-lg-5 p-2 p-lg-0">
              <div class="card-body p-4 p-lg-5">
                <h2 class="h3 mb-4">Tags</h2>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item m-1"><a class="btn btn-light" href="#!">Launch</a></li>
                  <li class="list-inline-item m-1"><a class="btn btn-light" href="#!">Planning</a></li>
                  <li class="list-inline-item m-1"><a class="btn btn-light" href="#!">Entrepreneur</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Related items-->
    <section class="pb-5">
      <div class="container pb-5">
        <header class="text-center mb-5">
          <h2>You May Also Be Interested In</h2>
        </header>
        <div class="row">
          <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 hover-transition"><a class="d-block dark-overlay card-img-top overflow-hidden tool-trending" href="#!">
                    <div class="tool-thumb rounded-circle" href="#!"><img class="img-fluid rounded-circle" src="img/tool-thumb-1.png" alt="..." width="40"></div>
                    <div class="featured-badge" rel="tooltip" data-placement="top" title="Featured"><i class="fas fa-bolt"></i></div>
                    <ul class="list-inline tool-rating mb-0">
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white 1"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white 2"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white 3"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white 4"></i></li>
                    </ul>
                    <div class="overlay-content"><img class="img-fluid" src="img/tool-bg-1.jpg" alt="..."></div></a>
                  <div class="card-body p-4">
                    <h3 class="h5"> <a class="stretched-link reset-anchor" href="#!">Curator</a></h3>
                    <p class="text-muted text-sm mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                  </div>
                </div>
          </div>
          <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 hover-transition"><a class="d-block dark-overlay card-img-top overflow-hidden tool-trending" href="#!">
                    <div class="tool-thumb rounded-circle" href="#!"><img class="img-fluid rounded-circle" src="img/tool-thumb-2.png" alt="..." width="40"></div>
                    <div class="featured-badge" rel="tooltip" data-placement="top" title="Featured"><i class="fas fa-bolt"></i></div>
                    <ul class="list-inline tool-rating mb-0">
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white 1"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white 2"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white 3"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white 4"></i></li>
                    </ul>
                    <div class="overlay-content"><img class="img-fluid" src="img/tool-bg-2.jpg" alt="..."></div></a>
                  <div class="card-body p-4">
                    <h3 class="h5"> <a class="stretched-link reset-anchor" href="#!">Elevatr</a></h3>
                    <p class="text-muted text-sm mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                  </div>
                </div>
          </div>
          <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 hover-transition"><a class="d-block dark-overlay card-img-top overflow-hidden tool-trending" href="#!">
                    <div class="tool-thumb rounded-circle" href="#!"><img class="img-fluid rounded-circle" src="img/tool-thumb-3.png" alt="..." width="40"></div>
                    <div class="featured-badge" rel="tooltip" data-placement="top" title="Featured"><i class="fas fa-bolt"></i></div>
                    <ul class="list-inline tool-rating mb-0">
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white 1"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white 2"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white 3"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star text-white 4"></i></li>
                    </ul>
                    <div class="overlay-content"><img class="img-fluid" src="img/tool-bg-3.jpg" alt="..."></div></a>
                  <div class="card-body p-4">
                    <h3 class="h5"> <a class="stretched-link reset-anchor" href="#!">Germ.io</a></h3>
                    <p class="text-muted text-sm mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                  </div>
                </div>
          </div>
        </div>
      </div>
    </section>
@endsection