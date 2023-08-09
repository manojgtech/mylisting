<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Scripts -->
        <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/user.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <!-- <link rel="styleshhet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"> -->
    </head>
    <body>
    <style>
   
</style>
<div class="px-0 bg-light">
    <div class="d-flex">
        <div class="d-flex align-items-center" id="navbar"> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button> <a class="text-decoration-none fs14 ps-2" href="#">{{ config('app.name', 'Laravel') }}</a> </div>
        <div id="navbar2" class="d-flex justify-content-end pe-4 m-1 navbar navbar-inverse">
        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item " href="{{ route('profile') }}"
                                     >
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
<!-- user -->
</div>
    </div>
    <div class="d-md-flex">
        <ul id="navbar-items" class="p-0">
            <li> <a href="{{url('/dashboard')}}"><span class="fa fa-dashboard"></span> <span class="ps-3 name">Dashboard</span> </a></li>
            <li> <a href="{{url('/user/listings')}}"><span class="fa fa-list"></span> <span class="ps-3 name">Listings</span> </a></li>
            
        </ul>
        <div id="topnavbar">
            
            <div class="d-flex align-items-center mb-3 px-md-3 px-2"> <span class="text-uppercase fs13 fw-bolder pe-3">search<span class="ps-1">by</span></span>
                <form class="example d-flex align-items-center"> <input type="text" placeholder="Type in Company Name Or Mid id" name="search"> <button type="submit"><i class="fa fa-search"></i></button> </form> &nbsp;&nbsp;<a href="{{url('/add-listing')}}" type="button" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i>&nbsp;Add Listing</a>
            </div>
            <div class="table-responsive px-2">
                <!--main  -->
                <main>
                 @yield('content')
              </main>

            </div>
            
        </div>
    </div>
</div>
      
<div class="modal" tabindex="-1" id="cmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary"  onclick="delList(this);">Yes</button>
      </div>
    </div>
  </div>
</div>
        
   <!-- Footer-->
   <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 - Company Name</div></div>
        </footer>
       
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#descriptioneditor' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
</script>  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script >
$(function() {
// Multiple images preview with JavaScript
var previewImages = function(input, imgPreviewPlaceholder) {
if (input.files) {
var filesAmount = input.files.length;
for (i = 0; i < filesAmount; i++) {
var reader = new FileReader();
reader.onload = function(event) {
$($.parseHTML('<img width="150">')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
}
reader.readAsDataURL(input.files[i]);
}
}
};
$('#images').on('change', function() {
previewImages(this, 'div.images-preview-div');
});
});

$(document).ready(function () {
    if($('#tablelisting').length){
    $('#tablelisting').DataTable();;
}
});  
function delList(th){
    var id=$(th).data("id");
    $("#cmodal .modal-title").html("Confirm alert");
    $("#cmodal .modal-body").html("Are you sure to want to delete it?");
    var myModal = new bootstrap.Modal(document.getElementById('cmodal'))
    myModal.show()


}

</script>


 
</body>
</html>

