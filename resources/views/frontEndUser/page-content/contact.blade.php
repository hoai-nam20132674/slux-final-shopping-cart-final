@extends('frontEndUser.layout.default')
@section('contact')
	<br>
	<div class="container">
	    <div class="row">
	    	<div class="col-md-12">
		    	<div class="breadcrumb-slux">
			        <div class="btn-group btn-breadcrumb breadcrumb-default">
			            <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
			            <a href="{{url('/'.$cate["url"])}}" class="btn btn-default border-bottom" style="text-transform: uppercase;">{{$cate->name}}</a>
			        </div>
				</div>
			</div>
			<br>
			<br>
	        <div class="col-md-8">
	            <div class="well well-sm">
	                <form action="{{URL::route('postAddCustumerRegisterN')}}" method="POST">
	                	<input type="hidden" name="_token" value="{{ csrf_token()}}">
		                <div class="row">
		                    <div class="col-md-6">
		                        <div class="form-group">
		                            <label for="name">
		                                Họ tên</label>
		                            <input type="text" class="form-control" name="name" id="name" placeholder="Vui lòng điền họ tên" required="required" />
		                        </div>
		                        <div class="form-group">
		                            <label for="subject">
		                                Số điện thoại</label>
		                            <input type="text" class="form-control" name="phone_number" id="phone-number" placeholder="Vui lòng nhập số điện thoại" required="required" />
		                        </div>
		                        <div class="form-group">
		                            <label for="email">
		                                Email</label>
		                            <div class="input-group">
		                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
		                                </span>
		                                <input name="error" class="form-control" placeholder="Vui lòng nhập Email" /></div>
		                        </div>
		                        <div class="form-group" style="display: none">
		                            <label for="email">
		                                Email</label>
		                            <div class="input-group">
		                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
		                                </span>
		                                <input name="error" value="Lỗi khác" class="form-control" placeholder="Vui lòng nhập Email" /></div>
		                        </div>
		                        <div class="form-group" style="display: none">
		                            <label for="email">
		                                Email</label>
		                            <div class="input-group">
		                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
		                                </span>
		                                <input name="error" value="Dòng máy khác" class="form-control" placeholder="Vui lòng nhập Email" /></div>
		                        </div>
		                        
		                    </div>
		                    <div class="col-md-6">
		                        <div class="form-group">
		                            <label for="name">
		                                Tin nhắn</label>
		                            <textarea name="message" id="message" class="form-control" rows="11" cols="25"
		                                placeholder="Message"></textarea>
		                        </div>
		                    </div>
		                    <div class="col-md-12">
		                        <button type="submit" class=" btn-primary pull-right" id="btnContactUs">
		                            Gửi tin nhắn</button>
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
	                <p style="color: #000; font-size: 15px;"><span class="glyphicon glyphicon-map-marker" style="color: blue;"></span>    {{$system ->address}}</p>
	                <p style="color: #000; font-size: 15px;"><span class="glyphicon glyphicon-earphone" style="color: blue;"></span> {{$system->phone_number}}</p>
	                <p style="color: #000; font-size: 15px;"><span class="glyphicon glyphicon-envelope" style="color: blue;"></span>    {{$system->email}}</p>
	                <p style="color: #000; font-size: 15px;"><span class="glyphicon glyphicon-time" style="color: blue;"></span> {{$system->time}}</p>
	            </address>
	            
	            </form>
	        </div>
	    </div>
	</div>
	<br>
	<br>
@endsection()