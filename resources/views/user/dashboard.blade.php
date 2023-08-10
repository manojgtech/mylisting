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

           <ul class="list-item">
            <li class="list-item-group">Listings <span class="badge badge-secondary bg-primary pull-right">{{$clist}}</span></li>
            <li class="list-item-group">Leads</li>
            <li class="list-item-group">Messsage</li>

           </ul>
        
                </div>
     </div>
@endsection