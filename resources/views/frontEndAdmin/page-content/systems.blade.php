@extends('frontEndAdmin.layout.default')
@section('css')
	<link rel="stylesheet" href="{{asset('admin/vendor/bootstrap4/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/themify-icons/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/animate.css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/jscrollpane/jquery.jscrollpane.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/waves/waves.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/switchery/dist/switchery.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/css/upload-image.css')}}">
@endsection()
@section('content')
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Hệ thống</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('index')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Cài đặt hệ thống</li>
			</ol>
			<div class="box box-block bg-white">
				@if( count($errors) > 0)
		    	<div class="alert alert-danger">
		    		<ul>
		    			@foreach($errors->all() as $error)
		    				<li>{{$error}}</li>
		    			@endforeach
		    		</ul>
		    	</div>
		    	@endif
				<form action="{{URL::route('postEditSystems')}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div class="row">
						@if(count($systems)>0)
							@foreach($systems as $system)
								<div class="col-md-9">
									<div class="row">

										<div class="col-md-3">
											<a href="http://slux.vn/" target="_blank">
												<div style="background: #0275d8;" class="text-center">
													<span style="color: #fff; font-size:20px; ">Icon tiêu đề</span>
												</div>
											</a>
										</div>
										<div class="col-md-9">
											<div class="form-group">	
												<input type="text" class="form-control" name="logo_title" placeholder="Nhập Url" value="{{$system->logo_title}}">
											</div>
										</div>
									</div>
									<div class="row">

										<div class="col-md-3">
											<a href="http://slux.vn/" target="_blank">
												<div style="background: #0275d8;" class="text-center">
													<span style="color: #fff; font-size:20px; ">Ảnh đại diện FB</span>
												</div>
											</a>
										</div>
										<div class="col-md-9">
											<div class="form-group">	
												<input type="text" class="form-control" name="og_image" placeholder="Nhập Url" value="{{$system->og_image}}">
											</div>
										</div>
									</div>
									<div class="row">

										<div class="col-md-3">
											<a href="http://slux.vn/" target="_blank">
												<div style="background: #0275d8;" class="text-center">
													<span style="color: #fff; font-size:20px; ">Logo website</span>
												</div>
											</a>
										</div>
										<div class="col-md-9">
											<div class="form-group">	
												<input type="text" class="form-control" name="logo_website" placeholder="Nhập Url" value="{{$system->logo_website}}">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Tiêu đề</label>
										<input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề danh mục" value="{{$system->title}}">
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Keywords</label>
										<input type="text" class="form-control" name="keywords" placeholder="Keywords Seo" value="{{$system->keywords}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Description</label>
										<input type="text" class="form-control" name="description" placeholder="Description Seo" value="{{$system->description}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Site_name</label>
										<input type="text" class="form-control" name="site_name" placeholder="Site name" value="{{$system->site_name}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Slogan</label>
										<input type="text" class="form-control" name="slogan" placeholder="Slogan" value="{{$system->slogan}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Hot line</label>
										<input type="text" class="form-control" name="phone_number" placeholder="Hot line" value="{{$system->phone_number}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">address</label>
										<input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="{{$system->address}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">email</label>
										<input type="text" class="form-control" name="email" placeholder="email" value="{{$system->email}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">facebook</label>
										<input type="text" class="form-control" name="facebook" placeholder="email" value="{{$system->facebook}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">youtube</label>
										<input type="text" class="form-control" name="youtube" placeholder="email" value="{{$system->youtube}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">linkedin</label>
										<input type="text" class="form-control" name="linkedin" placeholder="email" value="{{$system->linkedin}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">twitter</label>
										<input type="text" class="form-control" name="twitter" placeholder="email" value="{{$system->twitter}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">instagram</label>
										<input type="text" class="form-control" name="instagram" placeholder="email" value="{{$system->instagram}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Thời gian làm việc</label>
										<input type="text" class="form-control" name="time" placeholder="Thời gian làm việc" value="{{$system->time}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Script bổ sung</label>
										<textarea class="form-control" rows="10" name="script">{{$system->script}}</textarea>
									</div>
									
								</div>
							@endforeach
						@else
							<div class="col-md-9">
								<div class="row">

									<div class="col-md-3">
										<a href="http://slux.vn/" target="_blank">
											<div style="background: #0275d8;" class="text-center">
												<span style="color: #fff; font-size:20px;">Icon tiêu đề</span>
											</div>
										</a>
									</div>
									<div class="col-md-9">
										<div class="form-group">	
											<input type="text" class="form-control" name="logo_title" placeholder="Nhập Url" value="">
										</div>
									</div>
								</div>
								<div class="row">

									<div class="col-md-3">
										<a href="http://slux.vn/" target="_blank">
											<div style="background: #0275d8;" class="text-center">
												<span style="color: #fff; font-size:20px; ">Ảnh đại diện FB</span>
											</div>
										</a>
									</div>
									<div class="col-md-9">
										<div class="form-group">	
											<input type="text" class="form-control" name="og_image" placeholder="Nhập Url" value="">
										</div>
									</div>
								</div>
								<div class="row">

									<div class="col-md-3">
										<a href="http://slux.vn/" target="_blank">
											<div style="background: #0275d8;" class="text-center">
												<span style="color: #fff; font-size:20px; ">Logo website</span>
											</div>
										</a>
									</div>
									<div class="col-md-9">
										<div class="form-group">	
											<input type="text" class="form-control" name="logo_website" placeholder="Nhập Url" value="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Tiêu đề</label>
									<input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề danh mục" value="">
								</div>
								
								<div class="form-group">
									<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Keywords</label>
									<input type="text" class="form-control" name="keywords" placeholder="Keywords Seo" value="">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Description</label>
									<input type="text" class="form-control" name="description" placeholder="Description Seo" value="">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Site_name</label>
									<input type="text" class="form-control" name="site_name" placeholder="Description Seo" value="">
								</div>
								<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Slogan</label>
										<input type="text" class="form-control" name="slogan" placeholder="Slogan" value="">
									</div>
								<div class="form-group">
									<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Hot line</label>
									<input type="text" class="form-control" name="phone_number" placeholder="Hot line" value="">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">address</label>
									<input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">email</label>
									<input type="text" class="form-control" name="email" placeholder="email" value="">
								</div>
								<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">facebook</label>
										<input type="text" class="form-control" name="facebook" placeholder="email" value="">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">youtube</label>
										<input type="text" class="form-control" name="youtube" placeholder="email" value="">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">linkedin</label>
										<input type="text" class="form-control" name="linkedin" placeholder="email" value="">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">twitter</label>
										<input type="text" class="form-control" name="twitter" placeholder="email" value="">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">instagram</label>
										<input type="text" class="form-control" name="instagram" placeholder="email" value="">
									</div>
								<div class="form-group">
									<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Thời gian làm việc</label>
									<input type="text" class="form-control" name="time" placeholder="Thời gian làm việc" value="">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1" style="font-weight: 700;text-transform: uppercase;">Script bổ sung</label>
									<textarea class="form-control" rows="10" name="script"></textarea>
								</div>
								
							</div>
						@endif
						<!-- <div class="col-md-3">
							<div class="checkbox">
								<label>
									<input type="radio" name="display" value="1" checked>Hiển thị
								</label>
								<label>
									<input type="radio" name="display" value="0">Tắt hiển thị
								</label>
							</div>
							<div class="file-upload">								
							  	<div class="image-upload-wrap image-upload-wrap0">
								    <input class="file-upload-input file-upload-input0" type='file' name="image" onchange="readURL(this);" accept="image/*" />
								    <div class="drag-text">
								      <h3>Ảnh đại diện </h3>
								    </div>
							  	</div>
							  	<div class="file-upload-content file-upload-content0">
							    	<img class="file-upload-image file-upload-image0" src="#" alt="your image" />
							    	<div class="image-title-wrap image-title-wrap0">
							      		<button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title image-title0 text-center">Uploaded Image</span></button>
							    	</div>
							  	</div>
							</div>
						</div> -->
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			
		</div>
	</div>
@endsection()
@section('js')
	<!-- Vendor JS -->
		<script type="text/javascript" src="{{asset('admin/vendor/jquery/jquery-1.12.3.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('admin/vendor/tether/js/tether.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('admin/vendor/bootstrap4/js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('admin/vendor/detectmobilebrowser/detectmobilebrowser.js')}}"></script>
		<script type="text/javascript" src="{{asset('admin/vendor/jscrollpane/jquery.mousewheel.js')}}"></script>
		<script type="text/javascript" src="{{asset('admin/vendor/jscrollpane/mwheelIntent.js')}}"></script>
		<script type="text/javascript" src="{{asset('admin/vendor/jscrollpane/jquery.jscrollpane.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('admin/vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js')}}"></script>
		<script type="text/javascript" src="{{asset('admin/vendor/waves/waves.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('admin/vendor/switchery/dist/switchery.min.js')}}"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="{{asset('admin/js/app.js')}}"></script>
		<script type="text/javascript" src="{{asset('admin/js/demo.js')}}"></script>
		<script type="text/javascript" src="{{asset('admin/js/upload-image.js')}}"></script>
@endsection