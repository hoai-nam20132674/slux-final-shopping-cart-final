@extends('frontEndUser.layout.default')
@section('slide-header')
	
@endsection()
@section('blog-content')
	<br>
	<div class="container">
		<div class="row">
			<div class="content">
				<div class="col-md-9">
					<div class="breadcrumb-slux">
				        <div class="btn-group btn-breadcrumb breadcrumb-default">
				            <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
				            <a href="{{url('/tin-tuc')}}" class="btn btn-default border-bottom" style="text-transform: uppercase;">Tin tức</a>
				            <a href="{{url('/'.$bl["url"])}}" class="btn btn-default border-bottom" style="text-transform: uppercase;">{{$bl->title}}</a>
				        </div>
					</div>
					<br>
					<div class="news-item-content">
						<?php 
                    		$user = App\User::where('id',$bl->user_id)->get()->first();
                    	?>
						<h1>{{$bl->title}}</h1>
						<i style="font-size: 10px;" class="glyphicon glyphicon-time"></i>
                            <span style="font-size: 10px;">{{ \Carbon\Carbon::createFromTimestamp(strtotime($bl->created_at))->diffForHumans()}} </span><span class="badge badge-success" style="background: #007bff; border-radius: 2px; font-size: 9px;">{{$user->name}}</span>
						<br>
						<br>
						{!!$bl->content!!}
					</div>
				</div>
				<div class="sidebar">
					<div class="col-md-3">
						
						<div id='cssmenu'>
							<ul>
								<li class='active'><a ><span>Danh mục</span></a></li>
								<?php 
									$sideMenus = App\Menu_Sidebar::select()->get();
								?>
								@foreach($sideMenus as $sideMenu)
									<?php
										$categorie = App\Categories::where('id',$sideMenu->categorie_id)->get()->first();
										$categories = App\Categories::where('parent_id',$categorie->id)->get();
									?>
									<!-- @if($categorie->parent_id == 0) -->
										@if(count($categories)>0)
											<li class='has-sub'><a href='{{url('/'.$categorie["url"])}}'><span>{{$categorie->name}}</span></a>
												
													<ul class="">
														@foreach($categories as $categorie)
															<li><a href='{{url('/'.$categorie["url"])}}'><span>{{$categorie->name}}</span></a></li>
														@endforeach
													</ul>
												
											</li>
										@else
											<li class='has-sub'><a href='{{url('/'.$categorie["url"])}}'><span>{{$categorie->name}}</span></a></li>
										@endif
									<!-- @endif -->
								@endforeach
							   
							</ul>
						</div>
						<hr>
						<div class="panel-default">
							<div class="panel-heading text-center" style="text-transform: uppercase;font-weight:700;">Sản phẩm liên quan</div>
							<br>
							<div class="blog-new">
								@foreach($products as $pr)
									<div class="blog-new-item box-shadows">
										<div class="row">
						                    <div class="col-md-12 product-item" style="margin-bottom: 0px;">
					                            <div class="col-item">
					                                <div class="photo">
					                                    <a id="{{$pr->id}}" class="product-view" href="{{url('/'.$pr["url"])}}"><img src="{{url('/uploads/images/products/'.$pr["image"])}}" alt="a" /></a>
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
									</div>
									<br>
								@endforeach
								<br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>

		<div class="row">
			<div class="col-md-9">
				<ul class="nav nav-tabs">
				    <li class="active" ><a style="color: #000;" >TIN TỨC LIÊN QUAN</a></li>
				</ul>
				<br>
				<div class="row">
					<?php 
						$i=0;
					?>
					@foreach($blogs as $blog)
						@if($i<3)
							@if($blog->id != $bl->id)
								<div class="col-md-4 col-sm-4 blog-item">
									<article class="box-shadows"> 
							          	<figure><a href="{{url('/'.$blog["url"])}}" id="{{$blog->id}}" class="blog-view"><img src="{{url('/uploads/images/blogs/'.$blog["image"])}}" alt=""></a></figure>
							          	<div class="blog-description">
							            	<h4><a href="{{url('/'.$blog["url"])}}" id="{{$blog->id}}" class="blog-view" style="color: #000;">{{$blog->title}}</a></h4>
							            	<footer><a href="{{url('/'.$blog["url"])}}" id="{{$blog->id}}" class="blog-view">Xem chi tiết &raquo;</a></footer>
							          	</div>
							        </article>
								</div>
							@endif
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<br>
@endsection()