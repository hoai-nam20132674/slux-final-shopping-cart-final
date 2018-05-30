@extends('frontEndUser.layout.default2')
@section('contact')
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumb-slux">
			        <div class="btn-group btn-breadcrumb breadcrumb-default">
			            <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
			            <a href="{{url('/check/info')}}" class="btn btn-default border-bottom" style="text-transform: uppercase;">Tra cứu thông tin sửa chữa</a>
			        </div>
				</div>
			</div>
		</div>
		<br>
	    <div class="row">
	        <div class="col-md-8">
	        	@if( Session::has('flash_message'))
	                <div style="text-align: center; margin-bottom: 0px; background: #f00; color: #fff;font-weight: 700;" class="alert alert-{{ Session::get('flash_level')}}">
	                    {{ Session::get('flash_message')}}
	                </div>
	            @endif
	            <div class="well well-sm">
	                <form action="{{URL::route('postCheckInfo')}}" method="POST">
	                <input type="hidden" name="_token" value="{{ csrf_token()}}">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="form-group">
	                            <label for="name">
	                                Họ tên</label>
	                            <input type="text" name="name" class="form-control" id="name" placeholder="Vui lòng điền họ tên" required="required" />
	                        </div>
	                        <div class="form-group">
	                            <label for="subject">
	                                Số điện thoại</label>
	                            <input type="text" name="phone_number" class="form-control" id="phone-number" placeholder="Vui lòng nhập số điện thoại" required="required" />
	                        </div>
	                    </div>
	                    <div class="col-md-12">
	                        <button type="submit" class=" btn-primary pull-right" id="btnContactUs">
	                            Kiểm tra thông tin</button>
	                    </div>
	                </div>
	                </form>
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