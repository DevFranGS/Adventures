<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="{{ config('app.locale') }}"> <!--<![endif]-->
<head>

	<!--- basic page needs
	================================================== -->
	<meta charset="utf-8">
	<title>{{ isset($post) && $post->seo_title ? $post->seo_title :  __(lcfirst('Title')) }}</title>
	<meta name="description" content="{{ isset($post) && $post->meta_description ? $post->meta_description : __('description') }}">
	<meta name="author" content="@lang(lcfirst ('Author'))">
	@if(isset($post) && $post->meta_keywords)
		<meta name="keywords" content="{{ $post->meta_keywords }}">
	@endif
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- mobile specific metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" href="{{ asset('css/base.css') }}">
	<link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	@yield('css')

	<style>
		.search-wrap .search-form::after {
			content: "@lang('Press Enter to begin your search.')";
		}
	</style>


	<!-- script
	================================================== -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>

	<!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

	<!-- header
   ================================================== -->
   <header class="short-header">

   	<div class="gradient-block"></div>

   	<div class="row header-content">

   		<div class="logo">
	    	<a href="{{ url('') }}">Francisco Garcia Sosa</a>
	    </div>

	   	<nav id="main-nav-wrap">
			<ul class="main-navigation sf-menu">
				<li>
					<a href=2/welcome">Home</a>
				</li>
				<li>
					<a href="/about">About</a>
				</li>
				<li>
					<a href="/contact">Contact</a>
				</li>
				<li>
					<a href="/adventure/index">Adventures</a>
				</li>
				<li>
					<a href="/adventure/create">New Adventure</a>
				</li>

			</ul>
		</nav>
		<div class="triggers">
			<a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
			<a class="menu-toggle" href="#"><span>Menu</span></a>
		</div> <!-- end triggers -->

   	</div>

   </header> <!-- end header -->

   @yield('main')

   <!-- footer
   ================================================== -->
   <footer>

   	<div class="footer-main">

   		<div class="row">

	      	<div class="col-six tab-full mob-full footer-info">

	            <h4>@lang('About Our Site')</h4>

	               <p>@lang('Through your colaboration, this web application is the way to provide you with the best experience of game at this specific web application.')</p>

		      </div> <!-- end footer-info -->

	      	<div class="col-three tab-1-2 mob-1-2 site-links">

	      		<h4>@lang('Site Links')</h4>

	      		<ul>
				  	<li><a href="#">@lang('About us')</a></li>
					<li><a href="{{ url('') }}">@lang('Blog')</a></li>
					<li><a href="#">@lang('Privacy Policy')</a></li>
				</ul>

	      	</div> <!-- end site-links -->

	      	<div class="col-three tab-1-2 mob-1-2 social-links">

	      		<h4>@lang('Social')</h4>

	      		<ul>
	      			<li><a href="#">Twitter</a></li>
					<li><a href="#">Facebook</a></li>
					<li><a href="#">Dribbble</a></li>
					<li><a href="#">Google+</a></li>
					<li><a href="#">Instagram</a></li>
				</ul>

	      	</div> <!-- end social links -->

	      </div> <!-- end row -->

   	</div> <!-- end footer-main -->

      <div class="footer-bottom">
      	<div class="row">

      		<div class="col-twelve">
	      		<div class="copyright">
		         	<span>© Copyright Abstract 2016</span>
		         	<span>Design by <a href="https://es.linkedin.com/in/franciscogarciasosa">FGS</a></span>
		         </div>

		         <div id="go-top">
		            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon icon-arrow-up"></i></a>
		         </div>
	      	</div>

      	</div>
      </div> <!-- end footer-bottom -->

   </footer>

   <div id="preloader">
    	<div id="loader"></div>
   </div>

   <!-- Java Script
   ================================================== -->
   <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
   <script src="{{ asset('js/plugins.js') }}"></script>
   <script src="{{ asset('js/main.js') }}"></script>
   <script>
	   $(function() {
		   $('#logout').click(function(e) {
			   e.preventDefault();
			   $('#logout-form').submit()
		   })
	   })
   </script>

   @yield('scripts')

</body>

</html>
