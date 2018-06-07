@extends('frontEndUser.layout.default_nokia8800')
@section('css')
	<!-- <link rel="stylesheet" href="{{asset('form/css/reset.css')}}"> -->
	<link rel="stylesheet" href="{{asset('form/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('cost-table/css/style.css')}}">
	<script src="{{asset('form/js/modernizr.js')}}"></script>
	
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
				            <a href="{{url('/sua-chua-vertu')}}" class="btn btn-default border-bottom" style="text-transform: uppercase;">sửa chữa vertu</a>
				        </div>
					</div>
					<br>
					<!--render content-->
					<div class="news-item-content">
						<div class="row">
							<div class="col-md-8">
								@if( Session::has('flash_message'))
					                <div style="text-align: center; margin-bottom: 0px; background: #60ea27; color: green; border-color: #60ea27;font-weight: 700;" class="alert alert-{{ Session::get('flash_level')}}">
					                    {{ Session::get('flash_message')}}
					                </div>
					            @endif
								<form class="cd-form floating-labels">
									<fieldset>
										<legend>BẢNG GIÁ SỬA CHỮA VERTU</legend>
									</fieldset>
								</form>
								<section id="cd-table">
									<header class="cd-table-column">
										<h2 style="text-align: center;">STT</h2>
										<?php 
											$i = 1;
										?>
										<ul>
											@foreach($vertu_errors as $vertu_error)
												<li style="text-align: center;">{{$i}}</li>
											@endforeach
											<?php 
												$i++;
											?>
										</ul>
									</header>

									<div class="cd-table-container">
										<div class="cd-table-wrapper">

											<div class="cd-table-column">
												<h2>Lỗi sản phẩm</h2>
												<ul style="margin-bottom: 0px;">
													@foreach($vertu_errors as $vertu_error)
														<li>{{$vertu_error->error}}</li>
													@endforeach
												</ul>
											</div> <!-- cd-table-column -->

											<div class="cd-table-column">
												<h2>Mô tả dịch vụ</h2>
												<ul style="margin-bottom: 0px;">
													@foreach($vertu_errors as $vertu_error)
														<li>{{$vertu_error->repair_description}}</li>
													@endforeach
												</ul>
											</div> <!-- cd-table-column -->
											<div class="cd-table-column">
												<h2>Giá dự kiến</h2>
												<ul style="margin-bottom: 0px;">
													@foreach($vertu_errors as $vertu_error)
														<li>{{$vertu_error->price}}</li>
													@endforeach
												</ul>
											</div> <!-- cd-table-column -->

											<div class="cd-table-column">
												<h2>Bảo hành</h2>
												<ul style="margin-bottom: 0px;">
													@foreach($vertu_errors as $vertu_error)
														<li>{{$vertu_error->error}}</li>
													@endforeach
												</ul>
											</div> <!-- cd-table-column -->
											<div class="cd-table-column">
												<h2></h2>
												<ul style="margin-bottom: 0px;">
													@foreach($vertu_errors as $vertu_error)
														<li><a class="cd-select" href="{{$vertu_error->blog_url}}" target="_blank">Chi tiết</a></li>
													@endforeach
												</ul>
											</div>

										</div> <!-- cd-table-wrapper -->
									</div> <!-- cd-table-container -->

									<em class="cd-scroll-right"></em>
								</section>
								<br>
							</div>
							<div class="col-md-4">
								<form action="{{URL::route('postAddCustumerRegisterV')}}" method="POST" class="cd-form floating-labels" style="padding: 0px 10px;border: 1px solid;border-radius: 10px;">
									<input type="hidden" name="_token" value="{{ csrf_token()}}">
									<fieldset>
										<legend>THÔNG TIN ĐĂNG KÝ</legend>

										<div class="error-message">
											<p>Gửi thông tin cho chúng tôi để được tư vấn</p>
										</div>

										<div class="icon">
											<label class="float">Họ tên</label>
											<input class="user" type="text" name="name" placeholder="Vui lòng nhập họ tên" id="cd-name" required>
									    </div> 

									    <div class="icon">
									    	<label class="float">Số điện thoại</label>
											<input class="company" type="text" name="phone_number" placeholder="Vui lòng nhập số điện thoại" id="cd-company" required>
									    </div>
									
										<div class="icon">
											<label class="float">Lỗi sản phẩm</label>
											<select class="budget" name="error">
												@foreach($vertu_errors as $vertu_error)
													<option value="{{$vertu_error->error}}">{{$vertu_error->error}}</option>
												@endforeach
													<option value="Lỗi khác">Lỗi khác</option>
											</select>
										</div> 
										<div class="icon">
											<label class="float">Lời nhắn</label>
							      			<textarea class="message" name="message" placeholder="Quý khách có yêu cầu gì thêm xin vui lòng điền vào đây" id="cd-textarea"></textarea>
										</div>

										<div>
									      	<input type="submit" value="Gửi đăng ký">
									    </div>
									</fieldset>
								</form>
							</div>
						</div>

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
										          	<figure><a href="{{url('/'.$blog["url"])}}" id="{{$blog->id}}" class="blog-view"><img src="{{url('/uploads/images/blogs/'.$blog["image"])}}" alt=""></a></figure>
										          	<div class="blog-description">
										            	<h4><a href="{{url('/'.$blog["url"])}}" id="{{$blog->id}}" class="blog-view" style="color: #000;">{{$blog->title}}</a></h4>
										            	<footer><a href="{{url('/'.$blog["url"])}}" id="{{$blog->id}}" class="blog-view">Xem chi tiết &raquo;</a></footer>
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
@section('js')
	<script src="{{asset('form/js/main.js')}}"></script>
	<script src="{{asset('cost-table/js/main.js')}}"></script>
@endsection