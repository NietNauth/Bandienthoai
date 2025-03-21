@extends("frontend.layout_shop")
@section("do-du-lieu-vao-layout")
<div class="section" id="breadcrumb-wp">
    <div class="wp-inner">
        <div class="section-detail clearfix">
            <h3 class="title fl-left">Tìm kiếm từ khóa: {{ $key }}</h3>
            <ul class="list-breadcrumb fl-right">
                <li>
                    <a href="{{ asset('') }}" title="">Trang chủ</a>
                </li>
                <li>
                    <a href="" title="">Tìm kiếm từ khóa: {{ $key }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="section" id="filter-wp">
    <div class="wp-inner">
        <div class="section-detail">
            <ul class="list-item clearfix">
                <li>
                    <form method="POST" action="">
                        <select name="filter-price" id="short" onchange="location.href = '{{ url('products/search') }}?key={{ $key }}&order='+this.value;">
                            <option value="0">Sắp xếp</option>
                            <option @if($order=='priceAsc') selected @endif value="priceAsc">Giá tăng dần</option>
                            <option @if($order=='priceDesc') selected @endif value="priceDesc">Giá giảm dần</option>
                            <option @if($order=='nameAsc') selected @endif value="nameAsc">Sắp xếp A-Z</option>
                            <option @if($order=='nameDesc') selected @endif value="nameDesc">Sắp xếp Z-A</option>
                        </select>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="section" id="list-product-wp">
    <div class="wp-inner">
        <div class="section-detail">
            <ul class="list-item clearfix">
                @foreach($data as $row)     
                <li>
                    <a href="{{ url('products/detail/'.$row->id) }}" title="{{ $row->name }}" class="thumb" style="height: 300px">
                        <img style="height: 100%; width:100%; padding:30px " src="{{ asset('upload/products/'.$row->photo) }}" alt="{{ $row->name }}">
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
<div class="section" id="pagination-wp">
    <div class="wp-inner">
        <div class="pagination">
            {{ $data->appends(request()->all())->links() }}
        </div>
    </div>
</div>
@endsection