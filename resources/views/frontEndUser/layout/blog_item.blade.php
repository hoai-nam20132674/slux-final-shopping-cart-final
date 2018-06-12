
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
                    </div>
                </div>
            </footer>
        </div>
    </article>