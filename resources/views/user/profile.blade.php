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

        
           <form method="POST" action="{{url('updateprofile')}}" files="true" enctype="multipart/form-data"  id="image-upload">
                        @csrf

                        <input type="hidden" name="user_id" value='{{$user->id}}' >
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
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Password') }} <sup>*</sup></label>

                            <div class="col-md-6">
                            <input type="password" id="password"   class="form-control @error('password') is-invalid @enderror" name="password" minlength="5"  autocomplete="password" autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }} <sup>*</sup></label>

                            <div class="col-md-6">
                            <input type="password" id="cpassword"   class="form-control @error('cpassword') is-invalid @enderror" name="cpassword" minlength="5"   autocomplete="cpassword" autofocus>

                                @error('cpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Pic') }}</label>

                            <div class="col-md-6">
                                <img src="{{url($user->pic)}}" class="image image-round" style="width: 120px;" alt="{{$user->name}}" />
                            <input type="file" id="pic" value="{{$user->pic}}"  class="form-control @error('pic') is-invalid @enderror" name="pic" minlength="5"  autofocus>

                                @error('pic')
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
                                <option value={{$plan->id}} {{ ($user->plan == $plan->id) ? 'selected' : '' }}>{{$plan->name}}</option>
                                @endforeach
                            </select>

                                @error('plan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<button type="submit" class="btn btn-primary btn-block">Submit</button>
           </form>

                </div>
     </div>
@endsection