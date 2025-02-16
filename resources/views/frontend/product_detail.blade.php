@extends("frontend.layout_shop")
@section("do-du-lieu-vao-layout")
@php
	function getCategoryName($category_id){
		$record = DB::table("categories")->where("id","=",$category_id)->select("name")->first();
		return isset($record->name) ? $record->name : "";
	}
@endphp
<div class="section" id="breadcrumb-wp">
    <div class="wp-inner">
        <div class="section-detail clearfix">
            <h3 class="title fl-left">Sản phẩm</h3>
            <ul class="list-breadcrumb fl-right">
                <li>
                    <a href="{{ asset ('') }}" title="">Trang chủ</a>
                </li>
                <li>
                    <a href="" title="">Sản phẩm</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="wrapper" class="wp-inner clearfix">
    <div id="content" class="fl-left">
        <div class="section" id="info-product-wp">
            <div class="section-detail clearfix">
                <div class="thumb fl-left">
                    <img src="{{ asset('upload/products/'.$record->photo) }}" data-zoom-image="{{ asset('upload/products/'.$record->photo) }}"/>
                </div>
                <div class="info fl-right">
                    <h3 id="product-name">{{ $record->name }}</h3>
                    <span id="product-code">DANH MỤC: {{ getCategoryName($record->category_id) }}</span>
                    <div class="price">
                        <span class="price-old">{{ number_format($record->price - ($record->price * $record->discount)/100) }}₫</span>
                        @if($record->discount > 0)
                        <span class="price-new">{{ number_format($record->price) }}₫</span>
                        @endif
                    </div>
                    <p id="desc-short">{!! $record->content !!}</p>
                    <div id="num-order-wp">
                        <span class="title">Số lượng: </span>
                        <input type="text" name="num-order" value="1" min="1" max="100" id="num-order">
                    </div>
                    <a href="{{ url('cart/buy/'.$record->id) }}" title="" id="add-to-cart">Thêm giỏ hàng</a>
                    <a href="" title="" id="sale">{{ $record->discount }} %</a>
                </div>
            </div>
        </div>
        <div class="section" id="detail-product-wp">
            <div class="section-detail">
                <div id="tab-wrapper">
                    <ul id="tab-menu" class="clearfix">
                        <li>
                            <a href="#detail-product" title="">Thông tin sản phẩm</a>
                        </li>
                    </ul>
                    <div id="tab-content">
                        <div id="detail-product" class="tabItem">
                            {!! $record->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="same-category-wp">
            <div class="section-head">
                <h3 class="section-title">Cùng danh mục</h3>
            </div>
            <div class="section-detail">
                <ul class="list-item">
                    @php
                        $sameCategory = \App\Http\Controllers\Frontend\ProductsController::getSameCategoryProducts($record->category_id, $record->id);
                    @endphp
                    @foreach($sameCategory as $row)
                    <li class="item">
                        <a href="{{ url('products/detail/'.$row->id) }}" title="{{ $row->name }}" class="thumb" style="height: 300px">
                            <img style="height: 100%; width:100%; padding:10px " src="{{ asset('upload/products/'.$row->photo) }}" alt="{{ $row->name }}">
                        </a>
                        <div class="info">
                            <a href="{{ url('products/detail/'.$row->id) }}" title="{{ $row->name }}" class="name-product" style="height: 30px">{{ $row->name }}</a>
                            <div class="price-wp">
                                <span class="new">{{ number_format($row->price - ($row->price * $row->discount)/100) }}₫</span>
                                <span class="old">{{ number_format($row->price) }}₫</span>
                            </div>
                            <a href="{{ url('cart/buy/'.$row->id) }}" title="" class="buy-now">Thêm vào giỏ hàng</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
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