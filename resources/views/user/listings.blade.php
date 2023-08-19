@extends('layouts.user')

@section('content')
 <div class="container">
   <div class="row">
   @if( Session::has( 'success' ))
     <div class="alert alert-sucess">{{ Session::get( 'success' ) }}</div>
@elseif( Session::has( 'warning' ))
    <div class="alert alert-danger"> {{ Session::get( 'warning' ) }} </div>
@endif
    @if(count($lists)>0)
       
     <div class="card">
                <div class="card-header">Your Listings</div>
                
                <div class="card-body" style="overflow-x: scroll;">
      <table class="table" id="tablelisting">
        <thead>
          <tr>
          <th>SN</th>
            <th>Title</th>
            <th>Category</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>City</th>
            <th>Date</th>
            <th>Actions</th>

          </tr>
        </thead>
        <tbody>
        @foreach($lists as $list)
         <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$list->title}}</td>
          <td>{{$list->categoryname->name}}</td>
          <td>{{$list->email}}</td>
          <td>{{$list->phone}}</td>
          <td>{{$list->website}}</td>
          <td>{{$list->cityname->city}}</td>
          <td>{{ date("Y-m-d",strtotime($list->created_at))}}</td>
          <td>&nbsp;<a href="{{url("user/editlist/".Crypt::encrypt($list->id))}}" ><i class="fa fa-pencil"></i></a> &nbsp;<a data-id="{{Crypt::encrypt($list->id)}}" onclick="delList(this)"><i class="fa fa-trash"></i></a></td>
          
         </tr>
        @endforeach
        </tbody>
        

      </table>
                    
                </div>
            </div>
    
     
     @else
     <p>No listing exists.</p>

     @endif
   </div>
 </div>

@endsection