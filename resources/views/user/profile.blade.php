@extends('layouts.user')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-9">
     <div class="card">
                <div class="card-header">{{ __('Add Your Listing') }}</div>

                <div class="card-body">
                @if( Session::has( 'success' ))
     {{ Session::get( 'success' ) }}
@elseif( Session::has( 'warning' ))
     {{ Session::get( 'warning' ) }} 
@endif

        
           <form method="POST" action="{{url('add-listing')}}" files="true" enctype="multipart/form-data"  id="image-upload">
                        @csrf

                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Name') }} <sup>*</sup></label>

                            <div class="col-md-6">
                            <input type="text" id="name" value="{{$user->name}}"  class="form-control @error('name') is-invalid @enderror" name="name" minlength="5"  required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Email') }} <sup>*</sup></label>

                            <div class="col-md-6">
                            <input type="email" id="email"  value="{{$user->email}}" readonly class="form-control @error('email') is-invalid @enderror" name="name" minlength="5"  required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }} <sup>*</sup></label>

                            <div class="col-md-6">
                            <input type="tel" id="phone" value="{{$user->phone}}"  class="form-control @error('phone') is-invalid @enderror" name="phone" minlength="5"  required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Plan Type') }} <sup>*</sup></label>

                            <div class="col-md-6">
                            <select class="form-control" name="plan">
                                @foreach($plans as $plan)
                                <option value={{$plan->id}}>{{$plan->name}}</option>
                                @endforeach
                            </select>

                                @error('plan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

           </form>

                </div>
     </div>
@endsection