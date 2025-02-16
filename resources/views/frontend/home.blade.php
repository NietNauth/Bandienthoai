@extends("frontend.layout_home")
@section("do-du-lieu-vao-layout")
@include("frontend.slide")
<div class="section" id="product-discount-wp">
    <div class="wp-inner">
        <div class="section-head">
            <h3 class="section-title">Sản phẩm bán chạy</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item clearfix">
                @php
                  $hotProducts = \App\Http\Controllers\Frontend\HomeController::hotProducts();
                @endphp
                @foreach($hotProducts as $row)
                <li>
                    <a href="{{ url('products/detail/'.$row->id) }}" title="{{ $row->name }}" class="thumb" style="height: 300px">
                        <img style="height: 100%; width:100%; padding:30px " src="{{ asset('upload/products/'.$row->photo) }}" alt="{{ $row->name }}">
                    </a>
                    <div class="info">
                        @if($row->discount > 0)
                            <div class="discount-tag">{{ $row->discount }} %</div>
                        @endif
                        <a href="{{ url('products/detail/'.$row->id) }}" title="{{ $row->name }}" class="name-product" style="height: 30px">{{ $row->name }}</a>
                        <div class="price-wp">
                            <span class="new">{{ number_format($row->price - ($row->price * $row->discount)/100) }}₫</span>
                            @if($row->discount > 0)
                            <span class="old">{{ number_format($row->price) }}₫</span>
                            @endif
                        </div>
                        <a href="{{ url('cart/buy/'.$row->id) }}" title="" class="buy-now">Thêm vào giỏ hàng</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!--  -->
@php
  $categories = \App\Http\Controllers\Frontend\HomeController::getCategories();
@endphp
@foreach($categories as $rowCategory)
<div class="section" id="list-product-wp">
    <div class="wp-inner">
        <div class="section-head clearfix">
            <h3 class="section-title fl-left">{{ $rowCategory->name }}</h3>
            <a href="{{ url('products/category/'.$rowCategory->id) }}" title="" class="see-more fl-right">Xem thêm</a>
        </div>
        <div class="section-detail">
            <ul class="list-item clearfix">
                @php
                    $products = \App\Http\Controllers\Frontend\HomeController::getProductsInCategory($rowCategory->id);
                @endphp
                @foreach($products as $row)
                <li>
                    <a href="{{ url('products/detail/'.$row->id) }}" title="{{ $row->name }}" class="thumb" style="height: 300px">
                        <img style="height: 100%; width:100%; padding:30px " src="{{ asset('upload/products/'.$row->photo) }}" alt="{{ $row->name }}">
                    </a>
                    <div class="info">
                        @if($row->discount > 0)
                            <div class="discount-tag">{{ $row->discount }} %</div>
                        @endif
                        <a href="{{ url('products/detail/'.$row->id) }}" title="{{ $row->name }}" class="name-product" style="height: 30px">{{ $row->name }}</a>
                        <div class="price-wp">
                            <span class="new">{{ number_format($row->price - ($row->price * $row->discount)/100) }}₫</span>
                            @if($row->discount > 0)
                            <span class="old">{{ number_format($row->price) }}₫</span>
                            @endif
                        </div>
                        <a href="{{ url('cart/buy/'.$row->id) }}" title="" class="buy-now">Thêm vào giỏ hàng</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endforeach
<!--  -->
<div class="section" id="blog-wp">
    <div class="wp-inner">
        <div class="section-head">
            <h3 class="section-title">Tin tức</h3>
        </div>
        <div class="section-detail">
            <div id="blog-list">
                <ul class="list-item">
                    @php
                        $news = \App\Http\Controllers\Frontend\HomeController::hotNews();
                    @endphp
                    @foreach($news as $row)
                    <li class="item">
                        <a href="{{ url('news/detail/'.$row->id) }}" title="{{ $row->name }}" class="thumb" style="height: 200px">
                            <img style="height: 100%; width:100%" src="{{ asset('upload/news/'.$row->photo) }}" alt="{{ $row->name }}">
                        </a>
                        <a href="{{ url('news/detail/'.$row->id) }}" title="{{ $row->name }}" class="title">{{ $row->name }}</a>
                        <p class="desc">{!! $row->description !!}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="section" id="promotion-wp">
    <div class="wp-inner">
        <div class="section-head">
            <h3 class="section-title">Đăng ký để nhận khuyến mại</h3>
            <p class="section-desc">Đăng ký để nhận được thông tin khuyến mại mới nhất</p>
        </div>
        <div class="section-detail">
            <form method="POST">
                <input type="email" name="email" id="email" placeholder="Nhập email của bạn">
                <input type="submit" value="Đăng ký">
            </form>
        </div>
    </div>
</div>
@endsection