@extends('backend.layout')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Product Düzenleme</h3>
            </div>
            <div class="box-body">
                <form action="{{route('product.update',$products->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @isset($products->product_file)
                    <div class="form-group">
                        <label>Yüklü Görsel</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img width="100" src="/images/products/{{$products->product_file}}" alt="">
                            </div>
                        </div>
                    </div>
                    @endisset

                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="product_file"  type="file">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="product_title" value="{{$products->product_title}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Cost</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="product_cost" value="{{$products->product_cost}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sale</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="product_sale" value="{{$products->product_sale}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="product_slug" value="{{$products->product_slug}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="product_category" class="form-control">
                                    <option {{$products->product_category=="Men" ? "selected=''" : ""}} value="Men">Men</option>
                                    <option {{$products->product_category=="Women" ? "selected=''" : ""}} value="Women">Women</option>
                                    <option {{$products->product_category=="Sports" ? "selected=''" : ""}} value="Sports">Sports</option>
                                    <option {{$products->product_category=="Electronics" ? "selected=''" : ""}} value="Electronics">Electronics</option>
                                </select>
                            </div>
                        </div>
                      </div>
                        

                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                    <textarea class="form-control" id="editor1"
                                              name="product_content">{{$products->product_content}}</textarea>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>

                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <label>Status</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select name="product_status" class="form-control">
                                        <option {{$products->product_status=="1" ? "selected=''" : ""}} value="1">Aktif</option>
                                        <option {{$products->product_status=="0" ? "selected=''" : ""}} value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>
                          </div>

                            <input type="hidden" name="old_file" value="{{$products->product_file}}">



                            <div align="right" class="box-footer">
                                <button type="submit" class="btn btn-success">Düzenle</button>
                            </div>
                        </div>


                </form>
            </div>
        </div>
    </section>


@endsection
@section('css')@endsection
@section('js')@endsection
