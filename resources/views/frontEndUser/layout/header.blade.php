<header id="fh5co-header-section">
	
	<div class="container">

		<div class="nav-header">
			<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
			
			<h1 id="fh5co-logo">
				<!-- <a href="/">Slux +</a> -->
				<a href="/"><img src="{{asset('uploads/images/logo/logo-slux.png')}}"></a>
			</h1>
			<!-- START #fh5co-menu-wrap -->
			<nav id="fh5co-menu-wrap" role="navigation">
				<ul class="sf-menu" id="fh5co-primary-menu">
					<li><a href="/">Trang chủ</a></li>
					<?php
						$cateMenus = App\Menu_Header::select()->get();
						$i=1;
						$j=0;
						$array = array();
						foreach($cateMenus as $cate){
							$array[$j] = $cate->categorie_id;
							$j++;
						}
						$cate_Menus = App\Categories::where('display',1)->whereIn('id',$array)->get();
					?>

					@foreach($cate_Menus as $cateMenu)
						<?php
							$categorie = App\Categories::where('id',$cateMenu->id)->get()->first();
							$categories = App\Categories::where('parent_id',$categorie->id)->where('display',1)->get();
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
