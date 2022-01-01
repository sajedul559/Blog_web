<!DOCTYPE html>
<html lang="en">
<head>
	@include('layouts.head')

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
     @include('layouts.header')

	<!-- home page slider -->
	 @include('layouts.slider')
	<!-- end home page slider -->

	<!-- latest news -->
	@yield('main_content')
	<!-- end latest news -->



	@include('layouts.footer')
	 
    @include('layouts.scripts') 

</body>
</html>