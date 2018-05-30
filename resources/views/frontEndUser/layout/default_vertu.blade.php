
<!DOCTYPE html>

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{!!$seo->title!!}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{!!$seo->seo_description!!}" />
	<meta name="keywords" content="{!!$seo->seo_keyword!!}" />
	<meta name="author" content="Cuong.vn" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="{!!$seo->title!!}"/>
	<meta property="og:image" content="{!!$system->og_image!!}"/>
	<meta property="og:url" content="{!!url('/'.$seo->url)!!}"/>
	<meta property="og:site_name" content="{!!$system->site_name!!}"/>
	<meta property="og:description" content="{!!$seo->seo_description!!}"/>
	<meta name="twitter:title" content="{!!$seo->title!!}" />
	<meta name="twitter:image" content="{!!$system->og_image!!}" />
	<meta name="twitter:url" content="{!!url('/'.$seo->url)!!}" />
	<meta name="twitter:card" content="" />
	<link rel="canonical" href="{!!url()!!}" />
	<meta property="og:locale" content="vi_VN" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="{{$system->logo_title}}">
	
	<!-- Slide header-->
	<link rel="stylesheet" href="{{asset('css/slide-header/reset.css')}}"> <!-- CSS reset -->
	<link rel="stylesheet" href="{{asset('css/slide-header/style.css')}}"> <!-- Resource style -->
	<!---End slide header-->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="{{asset('css/simple-line-icons.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<!-- Superfish -->
	<link rel="stylesheet" href="{{asset('css/superfish.css')}}">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset('css/flexslider.css')}}">

	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/phone-ring.css')}}">

	<link rel="stylesheet" href="{{asset('css/styleProcedure.css')}}">
	<link rel="stylesheet" href="{{asset('css/blog-list.css')}}">
	<link rel="stylesheet" href="{{asset('css/recommend-product.css')}}">
	<link rel="stylesheet" href="{{asset('css/thumbnails.carousel.css')}}">
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<!--Add to cart-->
	<link rel="stylesheet" href="{{asset('addCart/css/style.css')}}"> 
	<!--End add to cart-->
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
	<script src="{{asset('js/serviceSlux.js')}}"></script>
	<script src="{{asset('js/sidebar.js')}}"></script>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=1629019750478837&autoLogAppEvents=1';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<![endif]-->
	@yield('css')
	<!-- css view-product-item -->
	<!-- css view-product-item -->
	
	</head>
	<body>
		<div class="phonering-alo-phone phonering-alo-green phonering-alo-show " id="phonering-alo-phoneIcon" style="display: none;">
            <div class="phonering-alo-ph-circle"></div>
            <div class="phonering-alo-ph-circle-fill"></div>
            <a data-toggle="modal" data-target="#basicModal" href="#" class="pps-btn-img" title="09864.33333">
                <div class="phonering-alo-ph-img-circle"></div>
            </a>
        </div>
        
		<div id="fh5co-wrapper">
			<div id="fh5co-page">
				<div id="fh5co-header">
					@include('frontEndUser.layout.header')
				</div>

				<!-- end:fh5co-header -->
				<div id="fh5co-slide-header">
					@yield('slide-header')
				</div>
				
				<div class="page-content">
					@yield('content')
					@yield('services')
				
					@yield('counter')
				
					@yield('procedure')

					@yield('why-choose')
					
					@yield('blog')

					@yield('feedback')

					@yield('blog-content')
					@yield('blog-list')
					@yield('product-list')
					@yield('contact')
					@yield('view-product-item')
					@yield('slux-talk')
				</div>
				<div class="footer">
					@include('frontEndUser.layout.footer')
				</div>
			</div>
			<!-- END fh5co-page -->

		</div>
		<!-- END fh5co-wrapper -->
		<!-- jQuery -->

		<!-- SwiperEffect Js-->
		@yield('js')
		<script src="{{asset('js/particles.js')}}"></script>
		<script src="{{asset('js/particles-app.js')}}"></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js'></script>
		<script type="text/javascript" src="{{asset('js/carousel.js')}}"></script>
		
		<!-- SwiperEffect Js-->
		<script src="{{asset('js/thumbnails.carousel.js')}}"></script>
		<script>
			$('.thumbnails-carousel').thumbnailsCarousel();
		</script>
		
		<!-- jQuery Easing -->
		<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
		<!-- Bootstrap -->
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<!-- Waypoints -->
		<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
		<!-- Superfish -->
		<script src="{{asset('js/hoverIntent.js')}}"></script>
		<script src="{{asset('js/superfish.js')}}"></script>
		<!-- Flexslider -->
		<script src="{{asset('js/jquery.flexslider-min.js')}}"></script>
		<!-- Stellar -->
		<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
		<!-- Counters -->
		<script src="{{asset('js/jquery.countTo.js')}}"></script>

		<!-- Main JS (Do not remove) -->
		<script src="{{asset('js/main.js')}}"></script>
		<script src="{{asset('js/procedure.js')}}"></script>


		<!--Add to cart-->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
		<script>
			if( !window.jQuery ) document.write('<script src="{{asset('addCart/js/jquery-3.0.0.min.js')}}"><\/script>');
		</script>
		<script src="{{asset('addCart/js/main.js')}}"></script> <!-- Resource jQuery -->
		<!--End add to cart-->
		<script type="text/javascript">
	    	$("div.alert").delay(2000).slideUp();
	    </script>
	    <script src="{{asset('js/slide-header/main.js')}}"></script> <!-- Resource JavaScrip -->
	    <script type="text/javascript" src="{{asset('js/support-views.js')}}"></script>
	    {!!$system->script!!}
	</body>
</html>

