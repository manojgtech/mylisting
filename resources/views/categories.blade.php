@extends('layouts.app')

@section('content')
       
<section class="py-5" id="categorypage">
      <div class="container py-5">
        <div class="row gy-5">
          <!-- Filter-->
          <div class="col-lg-3 order-2 order-lg-1">
            <h2 class="h3 mb-4 pb-1">Filter</h2>
            <form id="catfilter" onsubmit="return filtercat(event);">
              <div class="card border-0 shadow-sm mb-4 p-2">
                <div class="card-body">
                  <h2 class="h5 mb-4">Choose category</h2>
                  @foreach($cats as $cat)
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="cats[]" value="{{$cat->id}}" id="customCheck1">
                    <label class="form-check-label" for="customCheck1">{{$cat->name}}&nbsp;({{$cat->c}})</label>
                  </div>
                 @endforeach
                </div>
              </div>
              <div class="card border-0 shadow-sm mb-4 p-2">
                <div class="card-body">
                  <h2 class="h5 mb-4">Choose tag</h2>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="customCheckbox1">
                    <label class="form-check-label" for="customCheckbox1">Startup</label>
                  </div>
                  
                </div>
              </div>
              <button class="btn btn-primary w-100" type="submit"> <i class="fas fa-search me-2 small" id="cfilterbtn"></i>Search</button>
            </form>
          </div>
          <!-- Listing-->
          <div class="col-lg-9 order-1 order-lg-2" id="catlistview1">

          </div>
        </div>
      </div>
    </section>
    @endsection       