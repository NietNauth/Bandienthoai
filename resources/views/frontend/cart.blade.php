@extends("frontend.layout_home")
@section("do-du-lieu-vao-layout")
@php
	//để sử dụng các hàm bên trong trait Cart thì phải khai báo ở đây
	use \App\Http\ShoppingCart\Cart;
@endphp
@if(isset($cart))
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail clearfix">
                <h3 class="title fl-left">Giỏ hàng</h3>
                <ul class="list-breadcrumb fl-right">
                    <li>
                        <a href="{{ asset ('') }}" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<form id="cart" action="{{ url('cart/update') }}" method="POST">
    @csrf
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $product)
                        <tr>
                            <td>
                                <a href="{{ url('products/detail/'.$product['id']) }}" title="" class="thumb">
                                    <img src="{{ asset('upload/products/'.$product['photo']) }}" style="padding-top: 10px;" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('products/detail/'.$product['id']) }}" title="" class="name-product">{{ $product['name'] }}</a>
                            </td>
                            <td>{{ number_format($product['price'] - ($product['price'] * $product['discount'])/100) }}₫</td>
                            <td>
                                <input min="1" max="100" value="{{ $product['quantity'] }}" name="product_{{ $product['id'] }}" type="number" class="num-order">
                            </td>
                            <td>{{ number_format($product['quantity'] * ($product['price'] - ($product['price'] * $product['discount'])/100)) }}₫</td>
                            <td>
                                <a href="{{ url('cart/remove/'.$product['id']) }}" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        @if(Cart::cartNumber() > 0)
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span>{{ number_format(Cart::cartTotal()) }}₫</span></p>
                                </div>
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        @if(Cart::cartNumber() > 0)
                                        <a href="javascript:void(0)" title="" onclick="document.getElementById('cart').submit();">Cập nhật giỏ hàng</a>
                                        @endif
                                        <a href="{{ asset('cart/check-out') }}" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng.</p>
                <a href="{{ asset('') }}" title="" id="buy-more">Mua tiếp</a><br/>
            </div>
        </div>
    </div>
</form>
@endif
@endsection