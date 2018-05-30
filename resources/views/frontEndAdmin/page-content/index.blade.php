@extends('frontEndAdmin.layout.default')
@section('css')
	<link rel="stylesheet" href="{{asset('admin/vendor/bootstrap4/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/themify-icons/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/animate.css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/jscrollpane/jquery.jscrollpane.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/waves/waves.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/switchery/dist/switchery.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/morris/morris.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/jvectormap/jquery-jvectormap-2.0.3.css')}}">
@endsection()
@section('content')
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="row row-md">
				<?php 
					$order = App\Order::get();
					$countOd = count($order);
					$product = App\Products::get();
					$countPr = count($product);
				?>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="box box-block bg-white tile tile-1 mb-2">
						<div class="t-icon right"><span class="bg-danger"></span><i class="ti-shopping-cart-full"></i></div>
						<div class="t-content">
							<h6 class="text-uppercase mb-1">Đơn hàng</h6>
							<h1 class="mb-1">{{$countOd}}</h1>
							<span class="tag tag-danger mr-0-5">+17%</span>
							<i class="fa fa-caret-up text-success mr-0-5"></i><span>12,350</span>
							<!-- <span class="text-muted font-90"></span> -->
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="box box-block bg-white tile tile-1 mb-2">
						<div class="t-icon right"><span class="bg-success"></span><i class="ti-bar-chart"></i></div>
						<div class="t-content">
							<h6 class="text-uppercase mb-1">Doanh thu</h6>
							<h1 class="mb-1">$ 47,855</h1>
							<i class="fa fa-caret-up text-success mr-0-5"></i><span>12,350</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="box box-block bg-white tile tile-1 mb-2">
						<div class="t-icon right"><span class="bg-primary"></span><i class="ti-package"></i></div>
						<div class="t-content">
							<h6 class="text-uppercase mb-1">Sản phẩm</h6>
							<h1 class="mb-1">{{$countPr}}</h1>
							<span class="tag tag-primary mr-0-5">+125</span>
							<span class="text-muted font-90">arraving today</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="box box-block bg-white tile tile-1 mb-2">
						<div class="t-icon right"><span class="bg-warning"></span><i class="ti-receipt"></i></div>
						<div class="t-content">
							<h6 class="text-uppercase mb-1">Truy cập</h6>
							<h1 class="mb-1">1,682</h1>
							<div id="sparkline1"></div>
						</div>
					</div>
				</div>
			</div>
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" href="index.html#">Activity</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-muted" href="index.html#">Projects monitor</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-muted" href="index.html#">Memory usage</a>
				</li>
			</ul>
			<div class="box box-block bg-white b-t-0 mb-2">
				<div class="text-muted mb-1">Calculated in last 10 days</div>
				<div class="chart-container demo-chart">
					<div id="main-chart" class="chart-placeholder"></div>
				</div>
			</div>
			<div class="row row-md mb-2">
				<div class="col-md-4">
					<div class="box bg-white text-xs-center">
						<div class="box-block pb-1">
							<h5 class="mb-2">Open projects</h5>
							<div class="btn-group mb-1">
								<button type="button" class="btn btn-secondary active waves-effect waves-light">Week</button>
								<button type="button" class="btn btn-secondary waves-effect waves-light">Month</button>
								<button type="button" class="btn btn-secondary waves-effect waves-light">Year</button>
							</div>
							<div id="donut" class="chart-container demo-chart-2"></div>
						</div>
						<div class="box-block b-t">
							<span class="text-muted">last contract signed</span> <a class="text-primary" href="index.html#"><span class="underline">today at 14:57</span></a>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="box bg-white">
						<?php 
							$product_repair= App\Products_Repair::get();
							$i=1;
						?>
						<table class="table table-grey-head mb-md-0">
							<thead>
								<tr>
									<th>Stt</th>
									<th>Tên khách hàng</th>
									<th>Sản phẩm</th>
									<th>Lỗi</th>
									<th>Trạng thái sửa chữa</th>
								</tr>
							</thead>
							<tbody>
								@foreach($product_repair as $prr)
									@if($i<11)
										<tr>
											<th scope="row">{{$i}}</th>
											<td>{{$prr->name}}</td>
											<td>{{$prr->product_name}}</td>
											<td>{{$prr->error}}</td>
											<td>
												@if($prr->status < 50)
												<progress class="progress progress-danger progress-sm d-inline-block mb-0" value="{{$prr->status}}" max="100">100%</progress>
												@else
												<progress class="progress progress-success progress-sm d-inline-block mb-0" value="{{$prr->status}}" max="100">100%</progress>
												@endif
											</td>
										</tr>
										<?php $i++ ?>
									@else
										@break
									@endif
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="box box-block bg-white">
				<div class="clearfix mb-1">
					<h5 class="float-xs-left">Sales statistics</h5>
					<div class="float-xs-right">
						<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-angle-down"></i></button>
						<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-reload"></i></button>
						<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div id="world" style="height: 400px;"></div>
					</div>
					<div class="col-md-4 demo-progress">
						<p class="mb-0-5">New York City <span class="float-xs-right">25%</span></p>
						<progress class="progress progress-success progress-sm" value="25" max="100">100%</progress>
						<p class="mb-0-5">Singapore <span class="float-xs-right">15%</span></p>
						<progress class="progress progress-info progress-sm" value="15" max="100">100%</progress>
						<p class="mb-0-5">Tokyo <span class="float-xs-right">30%</span></p>
						<progress class="progress progress-warning progress-sm mb-2" value="30" max="100">100%</progress>
						<p class="mb-0-5">Hong Kong <span class="float-xs-right">5%</span></p>
						<progress class="progress progress-danger progress-sm mb-2" value="5" max="100">100%</progress>
						<a class="btn btn-outline-primary" href="index.html#">Detail statistics</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection()
@section('js')
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
	<script type="text/javascript" src="{{asset('admin/vendor/flot/jquery.flot.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/vendor/flot/jquery.flot.resize.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/vendor/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/vendor/CurvedLines/curvedLines.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/vendor/TinyColor/tinycolor.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/vendor/sparkline/jquery.sparkline.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/vendor/raphael/raphael.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/vendor/morris/morris.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/vendor/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/vendor/peity/jquery.peity.js')}}"></script>

	<!-- Neptune JS -->
	<script type="text/javascript" src="{{asset('admin/js/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/js/demo.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/js/index.js')}}"></script>
@endsection()
