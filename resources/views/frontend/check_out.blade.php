@extends("frontend.layout_shop")
@section("do-du-lieu-vao-layout")
@php
    //để sử dụng các hàm bên trong trait Cart thì phải khai báo ở đây
    use \App\Http\ShoppingCart\Cart;
@endphp
@if(isset($cart))
<div class="section" id="breadcrumb-wp">
    <div class="wp-inner">
        <div class="section-detail clearfix">
            <h3 class="title fl-left">Đặt hàng</h3>
            <ul class="list-breadcrumb fl-right">
                <li>
                    <a href="{{ asset ('') }}" title="">Trang chủ</a>
                </li>
                <li>
                    <a href="" title="">Đặt hàng</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<form method="POST" action="{{ url('cart/order') }}" name="form-checkout">
    @csrf
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                <div class="form-row clearfix">
                    <div class="form-col fl-left">
                        <label for="fullname">Họ tên</label>
                        <input type="text" name="name" id="fullname" value="{{ isset($customer->name)?$customer->name:'' }}">
                    </div>
                    <div class="form-col fl-right">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ isset($customer->email)?$customer->email:'' }}">
                    </div>
                </div>
                <div class="form-row clearfix">
                    <div class="form-col fl-left">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" id="address" value="{{ isset($customer->address)?$customer->address:'' }}">
                    </div>
                    <div class="form-col fl-right">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" name="phone" id="phone" value="{{ isset($customer->phone)?$customer->phone:'' }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="notes">Ghi chú</label>
                        <textarea name="note"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">
                <table class="shop-table">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Tổng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $product)
                        <tr class="cart-item">
                            <td class="product-name">{{ $product['name'] }}<strong class="product-quantity">x {{ $product['quantity'] }}</strong></td>
                            <td class="product-total">{{ number_format($product['quantity'] * ($product['price'] - ($product['price'] * $product['discount'])/100)) }}₫</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="order-total">
                            <td>Tổng đơn hàng:</td>
                            <td><strong class="total-price">{{ number_format(Cart::cartTotal()) }}₫</strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" value="Đặt hàng">
                </div>
            </div>
        </div>
    </div>
</form>
@endif
@endsection