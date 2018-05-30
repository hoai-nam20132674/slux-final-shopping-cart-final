<header id="fh5co-header-section">
	<!-- <div class="background-white" style="background: #fff;">
		<div class="copyright">
			<div class="container">
				<div class="row" >
					<div class="col-md-3">
						<div class="icon-social" style="text-align: center;">
							<ul class="social-icons">
								<li style="font-size: 20px;">
									<a href="#" style="color: #cb9400; "><i class="icon-twitter-with-circle"></i></a>
									<a href="#" style="color: #cb9400; "><i class="icon-facebook-with-circle"></i></a>
									<a href="#" style="color: #cb9400; "><i class="icon-instagram-with-circle"></i></a>
									<a href="#" style="color: #cb9400; "><i class="icon-linkedin-with-circle"></i></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-9">
						<div id="custom-search-input">
					        <div class="row">
					            <div class="col-md-12">
					                <input class="search-query form-control" placeholder="Search product" type="text">
					                <span class="input-group-btn">
					                <button class="btn btn-danger" type="button"> <span class=" glyphicon glyphicon-search"></span> </button>
					                </span>
					            </div>
					        </div>
					    </div>
				  	</div>
				  	<div class="col-md-3">
				  		<div class="cart-header" style="padding: 24px 0px; float: right;">
				  			<a href="{{URL::route('getCart')}}" style="color: #848484; font-size: 30px;"><i class="icon-shopping-cart"></i></a>
							<span class="badge badge-pill badge-primary" style="min-width: 16px; background-color: red; margin-top: -50px; margin-left: -12px;">{{$totalQuantity}}</span>
						</div>
				  	</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div> -->
	<div class="container">

		<div class="nav-header">
			<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
			
			<h1 id="fh5co-logo">
				<!-- <a href="/">Slux +</a> -->
				<a href="/"><img src="{{asset('images/logo-slux.png')}}"></a>
			</h1>
			<!-- START #fh5co-menu-wrap -->
			<nav id="fh5co-menu-wrap" role="navigation">
				<ul class="sf-menu" id="fh5co-primary-menu">
					<li><a href="/">Trang chủ</a></li>
					<?php 
						$cateMenus = App\Menu_Header::select()->get();
						$i=1;
					?>
					@foreach($cateMenus as $cateMenu)
						<?php
							$categorie = App\Categories::where('id',$cateMenu->categorie_id)->get()->first();
							$categories = App\Categories::where('parent_id',$categorie->id)->get();
						?>
						<!-- @if($categorie->parent_id == 0) -->
							@if(count($categories)>0)
								<li><a href="{{url('/'.$categorie["url"])}}" class="fh5co-sub-ddown">{{$categorie->name}}</a>
									<ul class="fh5co-sub-menu">
										@foreach($categories as $categorie)
											<li><a href="{{url('/'.$categorie["url"])}}">{{$categorie->name}}</a></li>
										@endforeach
									</ul>
								</li>
								<?php 
									$i++;
								?>
							@else
								<li><a href="{{url('/'.$categorie["url"])}}">{{$categorie->name}}</a></li>
								<?php 
									$i++;
								?>
							@endif
						<!-- @endif -->
					@endforeach
					<li><a href="{{URL::route('check')}}">Sửa chữa</a></li>
					
					<!-- <li><a href="#">Dịch vụ</a></li>
					<li><a href="/cau-chuyen-slux.html">Câu chuyện</a></li>
					<li>
						<a href="/linh-phu-kien.html" class="fh5co-sub-ddown">Linh phụ kiện</a>
						<ul class="fh5co-sub-menu">
						 	<li><a href="left-sidebar.html">Linh kiện Nokia 8800</a></li>
						 	<li><a href="right-sidebar.html">Linh kiện Vertu</a></li>
							<li>
								<a href="#" class="fh5co-sub-ddown">Phụ kiện Nokia 8800</a>
							</li>
							<li><a href="#">Phụ kiện Vertu</a></li>
						</ul>
					</li>
					<li><a href="/tin-tuc.html">Tin tức</a></li>
					<li><a href="/lien-he.html">Liên hệ</a></li> -->
				</ul>
			</nav>
			<h1 id="fh5co-logo" class="cart-icon">
				<!-- <a class="cart-icon" href=""><span></span></a> -->
				<a href="{{URL::route('getCart')}}"><i class="icon-shopping-cart"></i></a>
				<span class="badge badge-pill badge-primary" style="min-width: 16px; background-color: red; margin-top: -40px; margin-left: -15px;">{{$totalQuantity}}</span>
			</h1>
			
		</div>

	</div>

</header>
