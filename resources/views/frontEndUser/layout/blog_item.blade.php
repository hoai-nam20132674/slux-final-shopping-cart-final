
    <article class="box-shadows"> 
        <figure><a href="{{url('/'.$blog["url"])}}" id="{{$blog->id}}" class="blog-view"><img src="{{url('/uploads/images/blogs/'.$blog["image"])}}" alt="{{$blog->title}}"></a></figure>
        <div class="blog-description">
            <h4 class="heading"><a href="{{url('/'.$blog["url"])}}" id="{{$blog->id}}" class="blog-view" style="color: #000;">{{$blog->title}}</a></h4>
            <footer>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <a href="{{url('/'.$blog["url"])}}" id="{{$blog->id}}" class="blog-view">Xem chi tiết &raquo;</a>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <small style="font-size: 70%; float: right; bottom: 0px;">
                            <i class="glyphicon glyphicon-time"></i>
                            {{ \Carbon\Carbon::createFromTimestamp(strtotime($blog->created_at))->diffForHumans()}}
                        </small>
                    </div>
                </div>
            </footer>
        </div>
    </article>