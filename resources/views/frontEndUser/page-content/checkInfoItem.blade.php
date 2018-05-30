@extends('frontEndUser.layout.default2')
@section('contact')
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@if( Session::has('flash_message'))
	                <div class="alert alert-{{ Session::get('flash_level')}}">
	                    {{ Session::get('flash_message')}}
	                </div>
	            @endif
				@if( count($errors) > 0)
		    	<div class="alert alert-danger">
		    		<ul>
		    			@foreach($errors->all() as $error)
		    				<li>{{$error}}</li>
		    			@endforeach
		    		</ul>
		    	</div>
		    	@endif
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumb-slux">
			        <div class="btn-group btn-breadcrumb breadcrumb-default">
			            <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
			            <a href="{{url('/check/info')}}" class="btn btn-default border-bottom" style="text-transform: uppercase;">Tra cứu thông tin sửa chữa</a>
			            <a href="{{url('/check/info/'.$product_repair->phone_number)}}" class="btn btn-default border-bottom" style="text-transform: capitalize;">anh(chị) {{$product_repair->name}}</a>
			        </div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<?php 
				$i=0;
			?>
			@foreach($product_repair_images as $pr)
				@if($i==0)
					<div class="col-md-6" style="margin-bottom: 10px;">
						<div class="panel-default">
							<div class="panel-heading text-center" style="font-weight: 700;">Ảnh sản phẩm trước khi sửa chữa</div>
							<img src="{{url('uploads/images/productRepair/'.$pr->url_image)}}">
						</div>
					</div>
					<?php 
						$i++;
					?>
				@else
					<div class="col-md-6">
						<div class="panel-default">
							<div class="panel-heading text-center" style="font-weight: 700;">Ảnh sản phẩm sau khi sửa chữa</div>
							<img src="{{url('uploads/images/productRepair/'.$pr->url_image)}}">
						</div>
					</div>
				@endif
			@endforeach
		</div>
		<br>
	    <div class="row">
	        <div class="col-md-8">
	            <div class="well well-sm">
	                <div class="row">
	                	@if($product_repair->status == 100)
		                    <div class="col-md-2">
		                    	<img src="{{asset('images/sucess.png')}}">

		                    </div>
		                    <div class="col-md-10">
		                    	<div class="messeage" style="background: green; padding: 5px 5px;">
		                        	<span style="font-size: 23px; color:#fff; border-radius: 3px;" class="text-center">Sản phẩm của quý khách đã sửa chữa xong, quý khách vui lòng đến cửa hàng để trải nghiệm sản phẩm</span>
		                        </div>
		                    </div>
		                @else 
		                	<div class="col-md-2">
		                    	<img src="{{asset('images/danger.png')}}">

		                    </div>
		                    <div class="col-md-10">
		                    	<div class="messeage" style="background: red; padding: 5px 5px;">
		                        	<span style="font-size: 23px; color:#fff; border-radius: 3px;" class="text-center">Sản phẩm của quý khách vẫn đang được được sửa chữa, Chúng tôi sẽ sớm liên hệ lại với quý khách</span>
		                        </div>
		                    </div>
		                @endif
	                </div>
	            </div>
	        </div>
	        <div class="col-md-4">
	            <form>
	            <legend style="font-weight: 700;"><span class="glyphicon glyphicon-globe"></span> Slux Service</legend>
	            <address>
	                <br>
	                <p style="color: #000; font-size: 15px;"><span class="glyphicon glyphicon-map-marker" style="color: blue;"></span>    {!!$system->address!!}</p>
	                <p style="color: #000; font-size: 15px;"><span class="glyphicon glyphicon-earphone" style="color: blue;"></span> {!!$system->phone_number!!}</p>
	                <p style="color: #000; font-size: 15px;"><span class="glyphicon glyphicon-envelope" style="color: blue;"></span> {!!$system->email!!}</p>
	                <p style="color: #000; font-size: 15px;"><span class="glyphicon glyphicon-time" style="color: blue;"></span>    08 giờ 30 đến 21 giờ tất cả các ngày trong tuần</p>
	            </address>
	            
	            </form>
	        </div>
	    </div>
	</div>
	<br>
	<br>
@endsection()