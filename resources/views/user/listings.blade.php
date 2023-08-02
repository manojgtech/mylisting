@extends('layouts.user')

@section('content')
 <div class="container">
   <div class="row">
   @if( Session::has( 'success' ))
     {{ Session::get( 'success' ) }}
@elseif( Session::has( 'warning' ))
     {{ Session::get( 'warning' ) }} 
@endif
    @if(count($lists)>0)
       @foreach($lists as $list)
       <div class="col-md-4">
     <div class="card">
                <div class="card-header">{{$list->title}}</div>
                
                <div class="card-body">
      
                    
                </div>
            </div>
     </div>
     @endforeach
     @else
     <p>No listing exists.</p>

     @endif
   </div>
 </div>

@endsection