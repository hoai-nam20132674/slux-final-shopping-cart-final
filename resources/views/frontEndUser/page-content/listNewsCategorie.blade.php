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
				                    <div class="col-xs-12 col-sm-3 col-md-3">
				                        <a id="{{$blog->id}}" class="blog-view" id="{{$blog->id}}" href="{{url('/'.$blog["url"])}}">
				                            <img src="{{url('/uploads/images/blogs/'.$blog["image"])}}" class="img-responsive img-box "> 
				                        </a>
				                    </div> 
				                    <div class="col-xs-12 col-sm-9 col-md-9">
				                    	<h3 ><a style="color: #000;" id="{{$blog->id}}" class="blog-view" href="{{url('/'.$blog["url"])}}">{{$blog->title}}</a></h3>
				                        
				                        <div class="list-group">
				                            <div class="list-group-item">
				                                <div class="row-content">
				                                	<?php 
				                                		$user = App\User::where('id',$blog->user_id)->get()->first();
				                                	?>
				                                    <small>
				                                        <i class="glyphicon glyphicon-time"></i>{{$blog->created_at}}<span class="twitter"> <i class="fa fa-twitter"></i> <a target="_blank" href="https://twitter.com/sintret" alt="sintret" title="sintret">{{$user->name}}</a></span>
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
							<div class="panel-heading text-center" style="text-transform: uppercase;font-weight:700;">Sản phẩm mới</div>
							<br>
								<div class="blog-new">
									<div class="row">
										<?php 
											$i=0;
										?>
										@foreach($products as $pr)
											<div class="blog-new-item box-shadows">
												@if($i<3)
													@if($pr->display ==1)
									                    <div class="col-md-12 col-sm-4 product-item" style="margin-bottom: 20px;">
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
								                                    <div class="clearfix"></div>
								                                </div>
								                            </div>
								                        </div>
								                        <?php 
								                        	$i++;
								                        ?>
								                    @endif
								                @endif
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