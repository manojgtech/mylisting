            <!-- Listing sorting-->
            <div class="row mb-4 align-items-center">
              <div class="col-md-7">
                <ul class="list-inline mb-0">
                  <li class="list-inline-item my-1 my-lg-0">
                    <select class="choices" data-customclass="btn btn-light bg-white shadow-xs border text-start d-flex align-items-center">
                      <option value>Sort By </option>
                      <option value="alphabetically"></option>
                      <option value="latest"></option>
                      <option value="top rated"></option>
                      <option value="random"></option>
                    </select>
                  </li>
                  <li class="list-inline-item my-1 my-lg-0">
                    <select class="choices" data-customclass="btn btn-light bg-white shadow-xs border text-start d-flex align-items-center">
                      <option value>Listing Type</option>
                      <option value="tools"></option>
                      <option value="resources"></option>
                    </select>
                  </li>
                </ul>
              </div>
              <div class="col-md-5 text-md-end">
                <p class="h6 mb-0 p-3 p-md-0">Show 8 results</p>
              </div>
            </div>
            <!-- Listing items-->
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
            <!-- Pagination-->
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-end mb-0">
                <li class="page-item mx-1"><a class="page-link rounded shadow-sm px-3" href="#!" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                <li class="page-item mx-1 active"><a class="page-link rounded shadow-sm px-3" href="#!">1</a></li>
                <li class="page-item mx-1"><a class="page-link rounded shadow-sm px-3" href="#!">2</a></li>
                <li class="page-item mx-1"><a class="page-link rounded shadow-sm px-3" href="#!">3</a></li>
                <li class="page-item mx-1"><a class="page-link rounded shadow-sm px-3" href="#!" aria-label="Next"><span aria-hidden="true">»</span></a></li>
              </ul>
            </nav>