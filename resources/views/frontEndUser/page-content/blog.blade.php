<br>
<div class="fh5co-blog-section">
	<div class="container"> 
	    <div class="row">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
				<!-- <i class="sl-icon-note"></i> -->
				<h2>TIN TỨC</h2>
			</div>
		</div>
		<div class="row">
			@foreach($blogs as $blog)
				<div class="col-md-3 col-sm-3 blog-item">
			        @include('frontEndUser.layout.blog_item')
				</div>
			@endforeach
		</div>
	</div>
</div>
<div class="container">
	<hr style=" border: 0;height: 1px;background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
</div>
<br>