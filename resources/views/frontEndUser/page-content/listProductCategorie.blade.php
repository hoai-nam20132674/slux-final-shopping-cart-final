@extends('frontEndUser.layout.default')
@section('slide-header')
	
@endsection()
@section('product-list')
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
				            <a href="/" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
				            <?php 
				            	 	$categories = App\Categories::whereIn('id',$idCateParents)->get();
				            ?>
				            @foreach($categories as $categorie)
				            	<a href="{{url('/'.$categorie["url"])}}" class="btn btn-default border-bottom" style="text-transform: uppercase;">{{$categorie->name}}</a>
				            @endforeach
				        </div>
					</div>
					<br>
					<div class="product-list">
						<div class="row">
							@foreach($products as $pr)
								<div class="col-md-4 col-sm-4 product-item">
		                        	@include('frontEndUser.layout.product_item')
		                    	</div>
		                    @endforeach
	                    </div>
					</div>
					
					<div class="pagination text-center">
						<?php 
							$i=1;
						?>
						@if( $products->currentPage() != 1)
					  		<a href="{{$products->url($products->currentPage()-1)}}">&laquo;</a>
					  	@endif
					  	@for($i; $i<=$products->lastPage();$i++)
					  		<a href="{{$products->url($i)}}" class="{{($products->currentPage()==$i) ? 'active' : ''}}">{{$i}}</a>
					  	@endfor
					  	@if( $products->currentPage() != $products->lastPage())
					  		<a href="{{$products->url($products->currentPage()+1)}}">&raquo;</a>
					  	@endif
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
							<div class="panel-heading text-center" style="font-weight: 700;">Tin tức mới</div>
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
			</div>
		</div>
	</div>
@endsection()
