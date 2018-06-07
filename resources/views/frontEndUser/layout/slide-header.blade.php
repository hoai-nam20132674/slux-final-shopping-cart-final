<section class="cd-hero js-cd-hero js-cd-autoplay" style="">
		<ul class="cd-hero__slider">
			<?php
				$slides = App\Slides_Header::get();
				$i =0;
			?>
			@foreach($slides as $slide)
				@if($i==0)
					<li class="cd-hero__slide cd-hero__slide--selected js-cd-slide" style="background-image: url({{url('/uploads/images/slides/'.$slide->image)}});">
						<div class="cd-hero__content cd-hero__content--full-width">
							<h2>{{$slide->title}}</h2>
							<a href="{{$slide->blog_url}}" class="cd-hero__btn">XEM CHI TIẾT</a>
						</div>
					</li>
					<?php 
						$i++;
					?>
				@else
					<li class="cd-hero__slide js-cd-slide" style="background-image: url({{url('/uploads/images/slides/'.$slide->image)}});">
						<div class="cd-hero__content cd-hero__content--full-width">
							<h2>{{$slide->title}}</h2>
							<a href="{{$slide->blog_url}}" class="cd-hero__btn">XEM CHI TIẾT</a>
						</div>
					</li>
				@endif
			@endforeach()
			<!-- <li class="cd-hero__slide cd-hero__slide--selected js-cd-slide" style="background-image: url(images/bg-slide-header.jpg);">
				<div class="cd-hero__content cd-hero__content--full-width">
					<h2>Slux - ĐIỂM CHẠM ĐẲNG CẤP</h2>
					<a href="#" class="cd-hero__btn">XEM CHI TIẾT</a>
				</div>
			</li>
			<li class="cd-hero__slide js-cd-slide" style="background-image: url(images/a6.jpg);">
				<div class="cd-hero__content cd-hero__content--full-width">
					<h2>Nokia 8800 chế tác</h2>
					<a href="#" class="cd-hero__btn">XEM CHI TIẾT</a>
				</div>
			</li>
			<li class="cd-hero__slide js-cd-slide" style="background-image: url(images/vertu.jpg);">
				<div class="cd-hero__content cd-hero__content--full-width">
					<h2>Vertu 8800 chế tác</h2>
					<a href="#" class="cd-hero__btn">XEM CHI TIẾT</a>
				</div>
			</li> -->
			<!-- <li class="cd-hero__slide js-cd-slide" style="background-image:url(images/a6.jpg);">
				<div class="cd-hero__content cd-hero__content--half-width">
					<h2>Nokia 8800 chế tác</h2>
					<a href="#0" class="cd-hero__btn">XEM CHI TIẾT</a>
				</div>
				<div class="cd-hero__content cd-hero__content--half-width cd-hero__content--img">
					<img src="images/nokia8800.png" alt="tech 1">
				</div>
			</li>
			<li class="cd-hero__slide js-cd-slide" style="background-image:url(images/vertu.jpg)">
				<div class="cd-hero__content cd-hero__content--half-width cd-hero__content--img">
					<img src="images/vertu.png" alt="tech 2">
				</div>
				<div class="cd-hero__content cd-hero__content--half-width">
					<h2>Vertu chế tác</h2>
					<a href="#0" class="cd-hero__btn">XEM CHI TIẾT</a>
				</div>
			</li> -->
		</ul>
		<div class="cd-hero__nav js-cd-nav">
			<nav>
				<span class="cd-hero__marker cd-hero__marker--item-1 js-cd-marker"></span>
				<ul>
					<li class="cd-selected"><a class="slux" href="#0">Slux</a></li>
					<li><a class="nokia" href="#0">Nokia</a></li>
					<li><a class="vertu" href="#0">Vertu</a></li>
				</ul>
			</nav> 
		</div>
</section>
