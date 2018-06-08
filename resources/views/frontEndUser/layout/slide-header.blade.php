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
