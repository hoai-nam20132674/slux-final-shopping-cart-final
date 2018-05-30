
<!DOCTYPE html>

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{!!$seo->title!!}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{!!$seo->seo_description!!}"/>
	<meta name="keywords" content="{!!$seo->seo_keyword!!}"/>
	<meta name="author" content="Cuong.vn"/>

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="{!!$seo->title!!}"/>
	<meta property="og:image" content="{!!$system->og_image!!}"/>
	<meta property="og:url" content="{!!url('/'.$seo->url)!!}"/>
	<meta property="og:site_name" content="{!!$system->site_name!!}"/>
	<meta property="og:description" content="{!!$seo->seo_description!!}"/>
	<meta name="twitter:title" content="{!!$seo->title!!}"/>
	<meta name="twitter:image" content="{!!$system->og_image!!}"/>
	<meta name="twitter:url" content="{!!url('/'.$seo->url)!!}"/>
	<meta name="twitter:card" content=""/>
	<link rel="canonical" href="{!!url()!!}"/>
	<meta property="og:locale" content="vi_VN"/>
	<meta property="fb:app_id" content="1629019750478837" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="{{$system->logo_title}}">

	
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<!--Add to cart-->
	<link rel="stylesheet" href="{{asset('addCart/css/style.css')}}"> 
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
	<script src="{{asset('js/serviceSlux.js')}}"></script>
	<script src="{{asset('js/sidebar.js')}}"></script>
	
	<script src="{{asset('js/respond.min.js')}}"></script>
	@yield('css')
	
	</head>
	<body>
		<div class="phonering-alo-phone phonering-alo-green phonering-alo-show " id="phonering-alo-phoneIcon" >
            <div class="phonering-alo-ph-circle"></div>
            <div class="phonering-alo-ph-circle-fill"></div>
            <a data-toggle="modal" data-target="#basicModal" href="#" class="pps-btn-img" title="09864.33333">
                <div class="phonering-alo-ph-img-circle"></div>
            </a>
        </div>
        

		<div id="fh5co-wrapper">

			<div id="fh5co-page">
				<div class="container" style="background: #60ea27; padding: 0px; margin: 0px;width: 100%;">
					<div class="row">
						<div class="col-md-12">
							@if( Session::has('flash_message'))
				                <div style="text-align: center; margin-bottom: 0px; background: #60ea27; color: green; border-color: #60ea27;font-weight: 700;" class="alert alert-{{ Session::get('flash_level')}}">
				                    {{ Session::get('flash_message')}}
				                </div>
				            @endif
						</div>
					</div>
				</div>

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
		
					@include('frontEndUser.page-content.information')

					
				</div>

				<div class="footer">
					@include('frontEndUser.layout.footer')
				</div>
			</div>
			<!-- END fh5co-page -->

		</div>
		<!-- END fh5co-wrapper -->
		<!-- Cart-->
		<!-- <a href="#0" class="cd-add-to-cart" data-price="25.99">Add To Cart</a> -->
		<div class="cd-cart-container">
			<a href="{{URL::route('getCart')}}">
				<div class="cd-cart-trigger">
					Cart
					@if($totalQuantity >0)
					<ul class="count"> 
						<li class="count-cart">{{$totalQuantity}}</li>
						<li >{{$totalQuantity+1}}</li>
					</ul>
					@endif
				</div>
			</a>
			<div class="cd-cart">
				<div class="wrapper">
					<header>
						<h2>Cart</h2>
						<span class="undo">Item removed. <a href="#0">Undo</a></span>
					</header>
					
					<div class="body">
						<ul>
							<!-- products added to the cart will be inserted here using JavaScript -->
							<li class="product">
								<div class="product-image"><a href="#0"><img src="img/product-preview.png" alt="placeholder"></a></div>
								<div class="product-details">
									<h3><a href="#0">Product Name</a></h3>
									<span class="price">$25.99</span>
									<div class="actions">
										<a href="#0" class="delete-item">Delete</a>
										<div class="quantity">
											<label for="cd-product-'+ productId +'">Qty</label>
											<span class="select">
												<select id="cd-product-'+ productId +'" name="quantity">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
												</select>
											</span>
										</div>
									</div>
								</div>
							</li>
							<li class="product">
								<div class="product-image"><a href="#0"><img src="img/product-preview.png" alt="placeholder"></a></div>
								<div class="product-details">
									<h3><a href="#0">Product Name</a></h3>
									<span class="price">$25.99</span>
									<div class="actions">
										<a href="#0" class="delete-item">Delete</a>
										<div class="quantity">
											<label for="cd-product-'+ productId +'">Qty</label>
											<span class="select">
												<select id="cd-product-'+ productId +'" name="quantity">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
												</select>
											</span>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>

					<footer>
						<a style="display: none;" href="#0" class="checkout btn"><em>Checkout - $<span>0</span></em></a>
					</footer>
				</div>
			</div> <!-- .cd-cart -->
		</div>
		<!--End Cart-->

		<!-- jQuery -->

		<!-- SwiperEffect Js-->
		

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
	    <script type="text/javascript" src="{{asset('js/support-views.js')}}"></script>
	    <script type="text/javascript">
	    	$(document.body).on('hide.bs.modal,hidden.bs.modal', function () {
			    $('body').css('padding-right','0');
			});
	    </script>
	    @yield('js')
	    {!!$system->script!!}
	</body>
</html>

