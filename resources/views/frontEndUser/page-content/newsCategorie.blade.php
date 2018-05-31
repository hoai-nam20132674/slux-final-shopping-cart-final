@extends('frontEndUser.layout.default')
@section('slide-header')
	
@endsection()
@section('blog-content')
	<br>
	<div class="container">
		<div class="row">
			<div class="content">
				<div class="col-md-12">
					<div class="breadcrumb-slux">
				        <div class="btn-group btn-breadcrumb breadcrumb-default">
				            <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
				            <a href="{{url('/'.$cate["url"])}}" class="btn btn-default border-bottom" style="text-transform: uppercase;">{{$cate->name}}</a>
				        </div>
					</div>
					<br>
					<div class="news-item-content">
						{!!$cate->content!!}
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="#products" style="color: #000;" >SẢN PHẨM MỚI</a></li>
					<li ><a data-toggle="tab" href="#news" style="color: #000;">TIN TỨC MỚI</a></li>
				</ul>
				<br>
				<div class="tab-content">
					<div id="news" class="tab-pane fade">
						<div class="row">
							<?php 
								$i=0;
							?>
							@foreach($blogs as $blog)
								@if($i<4)
									@if($blog->display ==1)
										<?php 
											$user = App\User::where('id',$blog->user_id)->get()->first();
										?>
						                    <div class="col-md-3 col-sm-3 blog-item" style="margin-bottom: 20px;">
												<article class="box-shadows"> 
										          	<figure><a href="{{url('/'.$blog["url"])}}"><img src="{{url('/uploads/images/blogs/'.$blog["image"])}}" alt=""></a></figure>
										          	<div class="blog-description">
										            	<h4><a href="{{url('/'.$blog["url"])}}"  style="color: #000;">{{$blog->title}}</a></h4>
										            	<footer><a href="{{url('/'.$blog["url"])}}">Xem chi tiết &raquo;</a></footer>
										          	</div>
										        </article>
											</div>
										<?php 
											$i++;
										?>
									@endif
								@endif
							@endforeach
						</div>
					</div>
					<div id="products"  class="tab-pane fade in active">
						<div class="row">
							<?php 
								$i=0
							?>
	                        @foreach($products as $pr)
	                        	@if($i<4)
									@if($pr->display ==1)
				                        <div class="col-md-3 col-sm-3 product-item">
				                        	<div class="blog-new-item box-shadows">
					                            <div class="col-item">
					                                <div class="photo">
					                                    <a id="{{$pr->id}}" class="product-view"  href="{{url('/'.$pr["url"])}}"><img src="{{url('/uploads/images/products/'.$pr["image"])}}" alt="a" /></a>
					                                </div>
					                                <div class="info">
					                                    <div class="row">
					                                        <div class="price col-md-12" style="text-align: center;">
					                                            <h5 style="text-transform: uppercase; font-weight: 700;">{{$pr->name}}</h5>
					                                            <h5 class="price-text-color">{!!number_format($pr->price)!!} đ</h5>
					                                        </div>
					                                    </div>
					                                    <div class="clearfix">
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
				                        </div>
				                        <?php 
				                        	$i++;
				                        ?>
			                        @endif
			                    @endif
		                    @endforeach
	                    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
@endsection()