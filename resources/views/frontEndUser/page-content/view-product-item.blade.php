@extends('frontEndUser.layout.default')
@section('slide-header')
@endsection()

@section('view-product-item')
	<br>
	<div class="container">
			<div class="content">
				
					<div class="breadcrumb-slux">
				        <div class="btn-group btn-breadcrumb breadcrumb-default">
				            <a href="/" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
				            @foreach($categories as $categorie)
				            	<a href="{{url('/'.$categorie["url"])}}" class="btn btn-default broder-bottom" style="text-transform: uppercase;">{{$categorie->name}}</a>
				            @endforeach
				            <a href="{{url('/'.$prs["url"])}}" class="btn btn-default broder-bottom" style="text-transform: uppercase;">{{$prs->name}}</a>
				        </div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<h1 >{{$prs->name}}</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-md-10 col-sm-8"></div>
						<div class="col-md-2 col-sm-4">
							<span style="width: 48%; float: left; background: #4267b2; font-size: 12px; color:#fff; border-radius: 3px;" class="text-center">Order 10</span>
							<span style="width: 48%; float: right; background: #4267b2; font-size: 12px; color:#fff; border-radius:3px; " class="text-center">Like 10</span>
							<!-- <button type="button" class="btn btn-primary btn-xs" >Like <span class="badge">7</span> </button> -->
						</div>

					</div>
					</div>
					<hr>
					<div class="view-product-content">
						<div class="row">
							<div class="col-md-5 col-sm-5">
								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">

									<ol class="carousel-indicators">
									  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
									    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
									    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
									</ol>
									

									<div class="carousel-inner">
										<?php
											$i=0;
										?>
										@foreach($product_images as $prim)
											<?php 
												$image= App\Images::where('id',$prim->image_id)->get()->first();
											?>
											@if($i==0)
											    <div class="item active srle">
												    <img id="{{$i}}" src="{{url('/uploads/images/products/'.$prim["url_image"])}}" data-zoom-image="{{url('/uploads/images/products/'.$prim["url_image"])}}" alt="{{$prs->title}}" class="img-responsive">
											    </div>
											@else
												<div class="item">
												    <img id="{{$i}}" src="{{url('/uploads/images/products/'.$prim["url_image"])}}" data-zoom-image="{{url('/uploads/images/products/'.$prim["url_image"])}}" alt="{{$prs->title}}" class="img-responsive">
											    </div>
											@endif
											<?php 
												$i++;
											?>
										@endforeach

									</div>


									<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									    <span class="glyphicon glyphicon-chevron-left"></span>
									</a>
									<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									    <span class="glyphicon glyphicon-chevron-right"></span>
									</a>

									<ul class="thumbnails-carousel clearfix">
										@foreach($product_images as $prim)
									  		<li><img src="{{url('/uploads/images/products/'.$prim["url_image"])}}" alt="{{$prs->title}}"></li>
									  	@endforeach
									</ul>
								</div>
								
							</div>
							<div class="col-md-4 col-sm-4">
								<div class="panel panel-success">
									<div class="panel-heading text-center"><span class="fw-700"> Giá: {!!number_format($prs->price)!!} đ</span></div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading text-center">Thông tin ưu đãi</div>
									<div class="panel-body text-center ">{!!$prs->sale!!}</div>
								</div>
								
								<a href="{{URL::route('add-to-cart',$prs->url)}}"><button type="button" class="btn btn-danger width-100 fw-700">MUA NGAY</button></a>								
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="panel panel-default">
									<div class="panel-heading text-center">Thông tin sản phẩm
										
									</div>
									<div class="panel-body text-center ">
										{!!$prs->ttsp!!}

									</div>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="row">
							<div class="col-md-9">
								<ul class="nav nav-tabs">
								    <li class="active"><a data-toggle="tab" href="#gt" style="color: #000;" >GIỚI THIỆU</a></li>
								    <li ><a data-toggle="tab" href="#tskt" style="color: #000;">THÔNG SỐ KỸ THUẬT</a></li>
								    
								    
								</ul>
								<br>
								<div class="tab-content">
								    <div id="gt" class="tab-pane fade in active">
								    	<h3>Giới thiệu sản phẩm</h3>
								    	{!!$prs->description!!}
								    </div>
								    <div id="tskt" class="tab-pane fade">
								    	<h3>Menu 1</h3>
								    	{!!$prs->tskt!!}
								    </div>
								    
								</div>
							</div>
							<div class="col-md-3">
								<div class="panel-default">
									<div class="panel-heading text-center" style="font-weight: 700;">BÀI VIẾT LIÊN QUAN</div>
									<br>
									<div class="blog-new">
										<div class="row">
											@foreach($blogs as $blog)

												<?php 
													$user = App\User::where('id',$blog->user_id)->get()->first();
												?>
								                    <div class="col-md-12 col-sm-4 blog-item" style="margin-bottom: 20px;">
														@include('frontEndUser.layout.blog_item')
													</div>

											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-9">
								<ul class="nav nav-tabs">
									<?php 
										$cate = App\Categories::where('id',$prs->categorie_id)->get()->first();
									?>
								    <li class="active" ><a href="{{url('/'.$cate["url"])}}" style="color: #000;" >Xem thêm sản phẩm</a></li>
								</ul>
								<br>
								<div class="product-list">
									<div class="row">
										<?php 
											$i=0
										?>
				                        @foreach($products as $pr)
				                        	@if($i<3)
												@if($pr->id != $prs->id)
							                        <div class="col-sm-4 product-item" style="margin-bottom: 20px;">
							                        	@include('frontEndUser.layout.product_item')
							                        </div>
							                        <?php 
							                        	$i++;
							                        ?>
						                        @endif
						                    @else 
						                    	@break
						                    @endif
					                    @endforeach
				                    </div>
								</div>
							</div>
						</div>
					</div>
				
			</div>
		
	</div>
@endsection()
@section('js')
	<script type="text/javascript" src="{{asset('js/jquery.elevatezoom.js')}}"></script>
	<script>
	    $("#0").elevateZoom({scrollZoom : true});
	    $("#1").elevateZoom({scrollZoom : true});
	    $("#2").elevateZoom({scrollZoom : true});
	    $("#3").elevateZoom({scrollZoom : true});
	    $('#zoom_01').elevateZoom({
		    zoomType: "inner",
			cursor: "crosshair",
			zoomWindowFadeIn: 500,
			zoomWindowFadeOut: 750
		}); 

	</script>
@endsection()