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
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Business Categories') }} <sup>*</sup></label>

                            <div class="col-md-6">
                                <select id="category"  class="form-control @error('category') is-invalid @enderror" name="category"  required  autofocus>
                                    <option>Select Category</option>
                                  @foreach($cats as $key => $val)
                                    <option value={{$val}}>{{$key}}</option>
                                  @endforeach
                                </select>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Business Title') }} <sup>*</sup></label>

                            <div class="col-md-6">
                                <input type="text" id="title"  class="form-control @error('title') is-invalid @enderror" name="title" minlength="5"  required autocomplete="name" autofocus>
                                  

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="location"  class="form-control @error('location') is-invalid @enderror" name="location"  required autocomplete="name" autofocus>
                                  

                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('State') }} <sup>*</sup></label>

                            <div class="col-md-6">
                                <select id="state" onchange="fetchcity(this);"  class="form-control @error('state') is-invalid @enderror" name="state"  required autofocus>
                                    <option>Select State</option>
                                  @foreach($states as $key => $val)
                                    <option value={{$val}}>{{$key}}</option>
                                  @endforeach
                                </select>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('City') }} <sup>*</sup></label>

                            <div class="col-md-6">
                            <select id="city"  class="form-control @error('city') is-invalid @enderror" name="city"  required autocomplete="name" autofocus>
                                    <option>Select City</option>
                                  @foreach($city as $key => $val)
                                    <option value={{$val}}>{{$key}}</option>
                                  @endforeach
                                </select>
                                  

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Zipcode') }} <sup>*</sup></label>

                            <div class="col-md-6">
                                <input type="text" minlength="6" maxlength="6" id="zip"  class="form-control @error('zip') is-invalid @enderror" name="zip"  required autofocus>
                                  

                                @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Email') }} <sup>*</sup></label>

                            <div class="col-md-6">
                                <input type="email" id="email"  class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                                  

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input type="tel" id="phone"  class="form-control @error('phone') is-invalid @enderror" name="phone"  autocomplete="phone" autofocus>
                                  

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        


                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Website') }}</label>

                            <div class="col-md-6">
                                <input type="url" id="website"  class="form-control @error('website') is-invalid @enderror" name="website"  required autocomplete="website" autofocus>
                                  

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}<p>*(min 50 chars)</p></label>

                            <div class="col-md-6">
                                 <textarea type="description" id="descriptioneditor"  class="form-control @error('description') is-invalid @enderror" name="description"  required autocomplete="description" autofocus>
                                </textarea> 
                                                             
                                
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Logo') }}</label>
                            <div class="col-md-6">
                            <input type="file" id="logo"  class="form-control @error('logo') is-invalid @enderror" name="logo" autofocus>
            
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Page Cover Pic') }}</label>
                            <div class="col-md-6">
                            <input type="file" id="cover"  class="form-control @error('logo') is-invalid @enderror" name="cover" autofocus>
            
                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Gallery Images') }}</label>
                            <div class="col-md-6">
                            <input type="file" id="images"  class="form-control @error('images') is-invalid @enderror" name="images[]" autofocus multiple>
            
                                @error('images')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="mt-1 text-center">
                    <div class="images-preview-div"> </div>
                        </div>
                            </div>
                        </div>

                        <!-- cover -->

<!-- social link -->
<div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Facebook') }}</label>

                            <div class="col-md-6">
                                <input type="url" id="facebook"  class="form-control @error('facebook') is-invalid @enderror" name="facebook"  autofocus>
                                  

                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Business Video Url') }}</label>

                            <div class="col-md-6">
                                <input type="url" id="intro"  class="form-control @error('intro') is-invalid @enderror" name="intro"  required autocomplete="intro" autofocus>
                                  

                                @error('intro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Twitter') }}</label>

                            <div class="col-md-6">
                                <input type="url" id="twitter"  class="form-control @error('twitter') is-invalid @enderror" name="twitter" autofocus>
                                  

                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="instagram" class="col-md-4 col-form-label text-md-end">{{ __('Instagram') }}</label>

                            <div class="col-md-6">
                                <input type="url" id="instagram"  class="form-control @error('instagram') is-invalid @enderror" name="intagram"  required autocomplete="intagram" autofocus>
                                  

                                @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Youtube') }}</label>

                            <div class="col-md-6">
                                <input type="url" id="youtube"  class="form-control @error('youtube') is-invalid @enderror" name="youtube"   autofocus>
                                  

                                @error('youtube')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Tags') }}</label>

                            <div class="col-md-6">
                                <div class="tagsdiv"></div>
                                <input type="hidden" id="tagdataa" name="tags" value="" />
                                <br/>
                                <input type="text" id="business_tags" onkeydown="maketags(event);"  class="form-control @error('tags') is-invalid @enderror"    autofocus>
                                  

                                @error('youtube')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                       

                       

                       

                       

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
     </div>
   </div>
 </div>

@endsection