<!DOCTYPE html>
<html lang="en">

  <head>

    <title>Admin | @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/assets/images/favicon/mortarboard.png')}}">
    @include("admin.partials.head")
  </head>

  <body>
   
    <div id="db-wrapper">
      <!-- navbar vertical -->
      @include('admin.partials.navbar-vertical')
       <!-- Page content -->
      <div id="page-content">
        @include("admin.partials.header")
        @yield('main-content')
    </div>
   
</div>

<!-- Scripts -->
@include("admin.partials.scripts")

<script>
	@if(Session::has('message'))

		var type="{{Session::get('alert-type')}}"
		var message="{{Session::get('message')}}"

		switch(type){
			case 'info':
		         toastr.info(message);
		         break;
	        case 'success':
	            toastr.success(message);
	            break;
         	case 'warning':
	            toastr.warning(message);
	            break;
	        case 'error':
		        toastr.error(message);
		        break;
		}
	@endif
</script>

</body>

</html>