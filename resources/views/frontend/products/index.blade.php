@extends('frontend.layout')
@section('title',"Products")
@section('content')

<!-- catg header banner section -->
<section id="aa-catg-head-banner">
 <img height="300px" width="100%" src="/backend/login/lg1.jpg" alt="fashion img">
 <div class="aa-catg-head-banner-area">
   <div class="container">
    <div class="aa-catg-head-banner-content">
      <h2>Products</h2>
      <ol class="breadcrumb">
        <li><a href="{{route('home.Index')}}">Home</a></li>
        <li class="active">Product Archive</li>
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
                <div class="aa-product-area">
                  <div class="aa-product-inner">

                      <!-- Tab panes -->
                      <div class="tab-content" style="margin-top:40px;">
                        <!-- Start men product category -->
                        <div class="tab-pane fade in active" id="men">
                          <ul class="aa-product-catg">
                            <!-- start single product item -->
                            @foreach($data['product'] as $product)

                            <li>
                              <figure>
                                <a class="aa-product-img" href="{{route('product.Detail',['id' => $product->id])}}"><img height="320px" width="550px" src="/images/products/{{$product->product_file}}" alt="polo shirt img"></a>
                                <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                  <figcaption>
                                  <h4 class="aa-product-title"><a href="{{route('product.Detail',['id' => $product->id])}}">{{$product->product_title}}</a></h4>
                                  <span class="aa-product-price">{{$product->product_cost}}</span>
                                </figcaption>
                              </figure>
                              <div class="aa-product-hvr-content">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                              </div>
                              <!-- product badge -->
                            @if(strlen($product->product_sale)>0)
                              <span class="aa-badge aa-sale" href="#">{{$product->product_sale}}</span>
                            </li>
                            @endif

                            @endforeach


                      </div>
                      <!-- quick view modal -->
                      <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <div class="row">
                                <!-- Modal view slider -->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="aa-product-view-slider">
                                    <div class="simpleLens-gallery-container" id="demo-1">
                                      <div class="simpleLens-container">
                                          <div class="simpleLens-big-image-container">
                                              <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                                  <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                              </a>
                                          </div>
                                      </div>
                                      <div class="simpleLens-thumbnails-container">
                                          <a href="#" class="simpleLens-thumbnail-wrapper"
                                             data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                             data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                              <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                          </a>
                                          <a href="#" class="simpleLens-thumbnail-wrapper"
                                             data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                             data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                              <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                          </a>

                                          <a href="#" class="simpleLens-thumbnail-wrapper"
                                             data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                             data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                              <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                          </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Modal view content -->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="aa-product-view-content">
                                    <h3>T-Shirt</h3>
                                    <div class="aa-price-block">
                                      <span class="aa-product-view-price">$34.99</span>
                                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                                    <h4>Size</h4>
                                    <div class="aa-prod-view-size">
                                      <a href="#">S</a>
                                      <a href="#">M</a>
                                      <a href="#">L</a>
                                      <a href="#">XL</a>
                                    </div>
                                    <div class="aa-prod-quantity">
                                      <form action="">
                                        <select name="" id="">
                                          <option value="0" selected="1">1</option>
                                          <option value="1">2</option>
                                          <option value="2">3</option>
                                          <option value="3">4</option>
                                          <option value="4">5</option>
                                          <option value="5">6</option>
                                        </select>
                                      </form>
                                      <p class="aa-prod-category">
                                        Category: <a href="#">Polo T-Shirt</a>
                                      </p>
                                    </div>
                                    <div class="aa-prod-view-bottom">
                                      <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                      <a href="#" class="aa-add-to-cart-btn">View Details</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- / quick view modal -->
                  </div>
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
