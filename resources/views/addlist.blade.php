@extends('layouts.user')

@section('content')
 <div class="container">
   <div class="row">
       <div class="col-md-9">
     <div class="card">
                <div class="card-header">{{ __('Add Your Listing') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('add-listing')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Business Categories') }}</label>

                            <div class="col-md-6">
                                <select id="category"  class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>
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
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Business Title') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="title"  class="form-control @error('title') is-invalid @enderror" name="title"  required autocomplete="name" autofocus>
                                  

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
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <select id="state"  class="form-control @error('state') is-invalid @enderror" name="state"  required autocomplete="name" autofocus>
                                    <option>Select Category</option>
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
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                            <div class="col-md-6">
                            <select id="city"  class="form-control @error('city') is-invalid @enderror" name="city"  required autocomplete="name" autofocus>
                                    <option>Select Category</option>
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
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

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
                                <input type="tel" id="phone"  class="form-control @error('phone') is-invalid @enderror" name="phone"  required autocomplete="phone" autofocus>
                                  

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
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea type="description" id="description"  class="form-control @error('description') is-invalid @enderror" name="description"  required autocomplete="description" autofocus>
                                </textarea>

                                @error('description')
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