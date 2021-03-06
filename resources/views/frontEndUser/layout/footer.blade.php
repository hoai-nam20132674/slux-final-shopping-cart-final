<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4">

				<div class="copyright">
					<h1>
						<!-- <a href="index.html">Slux +</a> -->
						<a href="/"><img width="100%" src="{{asset('uploads/images/logo/logo-slux.png')}}"></a>
					</h1>
					<h3 class="text-center">{!!$system->slogan!!}</h3>
					<ul class="contact">
						<li class="address"><a>{!!$system->address!!}</a></li>
						<li class="phone"><a href="tel:{!!$system->phone_number!!}">  Hotline: {!!$system->phone_number!!}</a></li>
						<li class="email"><a>{!!$system->email!!}</a></li>
					</ul>
					<ul class="social-icons">
						<li>
							
							<a href="{!!$system->facebook!!}" target="_blank"><i class="icon-facebook-with-circle"></i></a>
							<a href="{!!$system->youtube!!}" target="_blank"><i class="icon-youtube-with-circle"></i></a>
							<a href="{!!$system->linkedin!!}" target="_blank"><i class="icon-linkedin-with-circle"></i></a>
							<a href="{!!$system->twitter!!}" target="_blank"><i class="icon-twitter-with-circle"></i></a>
							<a href="{!!$system->instagram!!}" target="_blank"><i class="icon-instagram-with-circle"></i></a>
						</li>
					</ul>
				</div>
				
			</div>
			<div class="col-md-4 col-sm-4">
				<ul class="link">
					<?php 
						$blogs_f = App\Blogs::where('display',1)->orderBy('created_at','DESC')->take(8)->get();
					?>
					@foreach($blogs_f as $blf)
						<li><a href="{{$blf->url}}">{!! \Illuminate\Support\Str::words($blf->title, 6,' ...')  !!}</a></li>
					@endforeach()
					<a href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=29326"><img src="{{asset('images/bct.png')}}"></a>
				</ul>

			</div>
			
			<div class="col-md-4 col-sm-4">
				<div class="fb-page" data-href="{{$system->facebook}}" data-tabs="timeline" data-width="500" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{$system->facebook}}" class="fb-xfbml-parse-ignore"><a href="{{$system->facebook}}">Dịch vụ sửa chữa Nokia 8800, Vertu số 1 tại Việt Nam</a></blockquote></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- <div id="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d465.5515519567834!2d105.82352866762899!3d21.016178044056527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9cbfab8618b70997!2sMua+b%C3%A1n+bao+da+Vertu!5e0!3m2!1svi!2s!4v1521852851381" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div> -->
	
</footer>
<div class="copyright" style=" background-color: #000;">
	<div class="container">
		<div class="row" >
			<div id="copyrightSlux" style="text-align: center; border-top: 1px dotted #fff;">
				<div class="icon-social">
					<nav role="navigation">
						<ul class="menu-footer">
							<li id="menu-item"><a href="/">Trang chủ</a></li>
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
									$categories = App\Categories::where('parent_id',$categorie->id)->get();
								?>
								@if(count($categories)>0)
									<li id="menu-item"><a href="{{url('/'.$categorie["url"])}}" class="fh5co-sub-ddown">{{$categorie->name}}</a>
										
									</li>
									<?php 
										$i++;
									?>
								@else
									<li id="menu-item"><a href="{{url('/'.$categorie["url"])}}">{{$categorie->name}}</a></li>
									<?php 
										$i++;
									?>
								@endif
							@endforeach
							<li id="menu-item"><a href="{{URL::route('check')}}">Sửa chữa</a></li>
						</ul>
					</nav>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
<div class="more-info">
	<div class="container">
		<div class="row">
			<div class="info-content">
				<h5>CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ ANH THÁI PHÁT</h5>
				<h5><p>Người đại diện</p>: Quách Duy Phát</h5>
				<h5><p>Giấy CNĐKDN</p>: 0107571052 ‐ <p>Ngày cấp</p>: 22/09/2016 - <p>Cơ quan Cấp</p>: Phòng Đăng ký kinh doanh Sở Kế hoạch và Đầu tư Thành phố Hà Nội</h5>
				<h5><p>Địa chỉ</p>: 39, Võ Văn Dũng, Ô Chợ Dừa, Đống Đa, Hà Nội, Việt Nam	<p>Hotline</p>: 0987.56.56.56</5>
			</div>
		</div>
	</div>
</div>