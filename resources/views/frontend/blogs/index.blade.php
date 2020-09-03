@extends('frontend.layout')
@section('title',"Blogs")
@section('content')


<!-- catg header banner section -->
<section id="aa-catg-head-banner">
 <img height="300px" width="100%" src="/backend/login/lg1.jpg" alt="fashion img">
 <div class="aa-catg-head-banner-area">
   <div class="container">
    <div class="aa-catg-head-banner-content">
      <h2>Blog Archive</h2>
      <ol class="breadcrumb">
        <li><a href="{{route('home.Index')}}">Home</a></li>
        <li class="active">Blog Archive</li>
      </ol>
    </div>
   </div>
 </div>
</section>
<!-- / catg header banner section -->

<!-- Blog Archive -->
<section id="aa-blog-archive">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-blog-archive-area aa-blog-archive-2">
          <div class="row">
            <div class="col-md-9">
              <div class="aa-blog-content">
                <div class="row">
                  @foreach($data['blog'] as $blog)
                  <div class="col-md-4 col-sm-4">
                    <article class="aa-latest-blog-single">
                      <figure class="aa-blog-img">
                        <a href="{{route('blog.Detail',['id' => $blog->id])}}"><img alt="img" src="/images/blogs/{{$blog->blog_file}}"></a>
                      </figure>
                      <div class="aa-blog-info">
                        <h3 class="aa-blog-title"><a href="#">{{$blog->blog_title}}</a></h3>
                        <p>{!!substr($blog->blog_content,0,140)!!}</p>
                        <a class="aa-read-mor-btn" href="{{route('blog.Detail',['id' => $blog->id])}}">Read more <span class="fa fa-long-arrow-right"></span></a>
                      </div>
                    </article>
                  </div>
                  @endforeach
                </div>
              </div>
              <!-- Blog Pagination -->
              <div class="aa-blog-archive-pagination">
                <nav>
                  <ul class="pagination">
                    <li>
                      <a aria-label="Previous" href="#">
                        <span aria-hidden="true">«</span>
                      </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                      <a aria-label="Next" href="#">
                        <span aria-hidden="true">»</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="col-md-3">
              <aside class="aa-blog-sidebar">
                <div class="aa-sidebar-widget">
                  <h3>Category</h3>
                  <ul class="aa-catg-nav">
                    <li><a href="#">Men</a></li>
                    <li><a href="">Women</a></li>
                    <li><a href="">Kids</a></li>
                    <li><a href="">Electornics</a></li>
                    <li><a href="">Sports</a></li>
                  </ul>
                </div>
                <div class="aa-sidebar-widget">
                  <h3>Tags</h3>
                  <div class="tag-cloud">
                    <a href="#">Fashion</a>
                    <a href="#">Ecommerce</a>
                    <a href="#">Shop</a>
                    <a href="#">Hand Bag</a>
                    <a href="#">Laptop</a>
                    <a href="#">Head Phone</a>
                    <a href="#">Pen Drive</a>
                  </div>
                </div>
                <div class="aa-sidebar-widget">
                  <h3>Recent Post</h3>
                  <div class="aa-recently-views">
                    <ul>
                      @foreach($bloglist as $list)
                      <li>
                        <a class="aa-cartbox-img" href="{{route('blog.Detail',['id' => $list->id])}}"><img src="/images/blogs/{{$list->blog_file}}" alt="img"></a>
                        <div class="aa-cartbox-info">
                          <h4><a href="{{route('blog.Detail',['id' => $list->id])}}">{{$list->blog_title}}</a></h4>
                          <p>March 26th 2016</p>
                        </div>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </aside>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('css')
@endsection

@section('js')
@endsection
