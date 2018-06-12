
	<div class="blog-new-item box-shadows">
        <div class="col-item">
            <div class="photo">
                <a id="{{$pr->id}}" class="product-view" href="{{url('/'.$pr["url"])}}"><img src="{{url('/uploads/images/products/'.$pr["image"])}}" alt="{{$pr->title}}" /></a>
            </div>
            <div class="info">
                <div class="row">
                    <div class="price col-md-12" style="text-align: center;">
                        <h5 style="text-transform: uppercase; font-weight: 700;">{{$pr->name}}</h5>
                        <?php
                        	$price = (int)$pr->price;
                        ?>
                        <h5 class="price-text-color">{!!number_format($pr->price)!!} đ</h5>
                    </div>
                </div>
                <div class="clearfix">
                </div>
            </div>
        </div>
	</div>
