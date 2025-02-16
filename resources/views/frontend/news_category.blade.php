@extends("frontend.layout_shop")
@section("do-du-lieu-vao-layout")
<div class="section" id="breadcrumb-wp">
    <div class="wp-inner">
        <div class="section-detail clearfix">
            <h3 class="title fl-left">Tin tức</h3>
            <ul class="list-breadcrumb fl-right">
                <li>
                    <a href="{{ asset ('') }}" title="">Trang chủ</a>
                </li>
                <li>
                    <a href="" title="">Tin tức</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="wrapper" class="wp-inner clearfix">
    <div id="content" class="fl-left">
        <div class="section" id="list-news-wp">
            <div class="section-detail">
                <ul class="list-item">
                    @foreach($data as $row)
                    <li class="clearfix">
                        <a href="{{ url('news/detail/'.$row->id) }}" title="" class="thumb fl-left">
                            <img src="{{ asset('upload/news/'.$row->photo) }}" alt="">
                        </a>
                        <div class="info fl-right">
                            <a href="{{ asset('upload/news/'.$row->photo) }}" title="" class="title">{{ $row->name }}</a>
                            <span class="create-date">{{ $row->created_at }}</span>
                            <p class="desc">{!! $row->description !!}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="section" id="pagination-wp">
            <div class="wp-inner">
                <div class="pagination">
                    {{ $data->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar" class="fl-right">
        <div class="section" id="category-wp">
            <div class="section-head">
                <h3 class="section-title">Danh mục</h3>
            </div>
            <div class="section-detail">
                <ul class="list-item">
                    @php
                        $categories = DB::table("categories")->where("parent_id","=",0)->orderBy("id","desc")->get();
                    @endphp
                    @foreach($categories as $row)
                    <li>
                        <a href="{{ url('products/category/'.$row->id) }}" title="">{{ $row->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="section" id="list-popular-wp">
            <div class="section-head">
                <h1 class="section-title">Sản phẩm bán chạy</h1>
            </div>
            <div class="section-detail">
                <ul class="list-item">
                    @php
                      $hotProducts = \App\Http\Controllers\Frontend\HomeController::hotProducts();
                    @endphp
                    @foreach($hotProducts->take(10) as $row)
                    <li class="clearfix">
                        <a href="{{ url('products/detail/'.$row->id) }}" title="{{ $row->name }}" class="thumb fl-left">
                            <img style="height: 100%; width:100%; padding:10px " src="{{ asset('upload/products/'.$row->photo) }}" alt="{{ $row->name }}">
                        </a>
                        <div class="info fl-right">
                            <a href="{{ url('products/detail/'.$row->id) }}" title="" class="product-name">{{ $row->name }}</a>
                            <span class="fee">{{ number_format($row->price - ($row->price * $row->discount)/100) }}₫</span>
                            <a href="{{ url('products/detail/'.$row->id) }}" title="" class="more">Xem chi tiết</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection