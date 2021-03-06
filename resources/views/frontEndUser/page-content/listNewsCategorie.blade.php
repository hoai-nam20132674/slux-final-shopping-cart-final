@extends('frontEndUser.layout.default')
@section('slide-header')

@endsection()
@section('blog-list')
	<div class="content-cate">
		{!!$seo->content!!}
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="content">	
				<div class="col-md-9">
					<div class="breadcrumb-slux">
					        <div class="btn-group btn-breadcrumb breadcrumb-default">
					            <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
					            <a href="{{url('/'.$cate["url"])}}" class="btn btn-default border-bottom" style="text-transform: uppercase;">{{$cate->name}}</a>
					        </div>
					</div>
					<div class="blog-list">
						@foreach($blogs as $blog)
							<div class="blog-item">
								<div class="row">
						                    <div class="col-xs-12 col-sm-3 col-md-4">
						                        <a id="{{$blog->id}}" class="blog-view" id="{{$blog->id}}" href="{{url('/'.$blog["url"])}}">
						                            <img src="{{url('/uploads/images/blogs/'.$blog["image"])}}" class="img-responsive img-box " alt="{{$blog->title}}"> 
						                        </a>
						                    </div> 
						                    <div class="col-xs-12 col-sm-9 col-md-8">
						                    	<h3 ><a style="color: #000;" id="{{$blog->id}}" class="blog-view" href="{{url('/'.$blog["url"])}}">{{$blog->title}}</a></h3>
						                    	{!! \Illuminate\Support\Str::words($blog->content, 40,'...')  !!}
						                        <div class="list-group">
						                            <div class="list-group-item">
						                                <div class="row-content">
						                                	<?php 
						                                		$user = App\User::where('id',$blog->user_id)->get()->first();
						                                	?>
						                                    <small>
						                                        <i class="glyphicon glyphicon-time"></i>
						                                        {{ \Carbon\Carbon::createFromTimestamp(strtotime($blog->created_at))->diffForHumans()}}
						                                        <span class="twitter"> <i class="fa fa-twitter"></i> <a title="người đăng">{{$user->name}}</a></span>
						                                        <span class="twitter" style="margin-left: 20px;"><i class="icon-eye"></i> <a>{{$blog->view}}</a></span>
						                                        <br>
						                                    </small>
						                                </div>
						                            </div>
						                        </div>
						                        <a id="{{$blog->id}}" class="blog-view" href="{{url('/'.$blog["url"])}}"><div class="read-more"><button class="btn-primary">Xem thêm</button></div></a>
						                        <div class="clear"></div>
						                    </div> 
				                </div>
				            </div>
			                <hr>
						@endforeach	
					</div>
					<div class="pagination text-center">
						<?php 
							$i=1;
						?>
						@if( $blogs->currentPage() != 1)
					  		<a href="{{$blogs->url($blogs->currentPage()-1)}}">&laquo;</a>
					  	@endif
					  	@for($i; $i<=$blogs->lastPage();$i++)
					  		<a href="{{$blogs->url($i)}}" class="{{($blogs->currentPage()==$i) ? 'active' : ''}}">{{$i}}</a>
					  	@endfor
					  	@if( $blogs->currentPage() != $blogs->lastPage())
					  		<a href="{{$blogs->url($blogs->currentPage()+1)}}">&raquo;</a>
					  	@endif
					</div>
				</div>
				
			</div>
			<div class="sidebar">
				<div class="col-md-3">
					
						<div id='cssmenu'>
							<ul>
								<li class='active'><a ><span>Danh mục</span></a></li>
								<?php
									$sideMenus = App\Menu_Sidebar::select()->get();
									$i=1;
									$j=0;
									$array = array();
									foreach($sideMenus as $cate){
										$array[$j] = $cate->categorie_id;
										$j++;
									}
									$side_Menus = App\Categories::where('display',1)->whereIn('id',$array)->get();
								?>
								@foreach($side_Menus as $sideMenu)
									<?php
										$categorie = App\Categories::where('id',$sideMenu->id)->get()->first();
										$categories = App\Categories::where('parent_id',$categorie->id)->where('display',1)->get();
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
							<div class="panel-heading text-center" style="text-transform: uppercase;font-weight:700;">Sản phẩm mới</div>
							<br>
								<div class="blog-new">
									<div class="row">
										<?php 
											$i=0;
										?>
										@foreach($products as $pr)
											<div class="col-md-12 col-sm-4 product-item" style="margin-bottom: 20px;">
												@include('frontEndUser.layout.product_item')
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
		<div class="clear"></div>
		</div>
	</div>
	<br>
@endsection()