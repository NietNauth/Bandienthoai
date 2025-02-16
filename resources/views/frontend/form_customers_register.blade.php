@extends("frontend.layout_shop")
@section("do-du-lieu-vao-layout")
<div class="section" id="breadcrumb-wp">
    <div class="wp-inner">
        <div class="section-detail clearfix">
            <h3 class="title fl-left">Đăng ký</h3>
            <ul class="list-breadcrumb fl-right">
                <li>
                    <a href="{{ asset ('') }}" title="">Trang chủ</a>
                </li>
                <li>
                    <a href="" title="">Đăng ký</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="customer_login">
    <div class="container">
        <div class="row">   
            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Đăng ký tài khoản</h2>
                    @if(Request::get("notify") == "invalid")
                    <div class="alert alert-danger">Email đã tồn tại</div>
                    @endif
                    <form method='post' action="{{ url('customers/register-post') }}">
                        @csrf
                        <p>
                            <label>Họ và tên:</label>
                            <input type="text" class="input-control" name="name" required="">
                        </p>
                        <p>
                            <label>Email: <span>*</span></label>
                            <input type="email" class="input-control" name="email" required="">
                        </p>
                        <p>
                            <label>Địa chỉ:</label>
                            <input type="text" class="input-control" name="address">
                        </p>
                        <p>
                            <label>Điện thoại:</label>
                            <input type="text" class="input-control" name="phone">
                        </p>
                        <p>
                            <label>Mật khẩu: <span>*</span></label>
                            <input type="password" class="input-control" name="password" required="">
                        </p>
                        <div class="login_submit">
                            <button type="submit">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="account_form login">
                    <h2>Đăng nhập</h2>
                    <p>Đăng nhập tài khoản nếu bạn đã có tài khoản. Đăng nhập tài khoản để theo dõi đơn đặt hàng, vận chuyển và đặt hàng được thuận lợi.</p>
                    <a href="{{ url('customers/login') }}" class="button">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection