@extends("frontend.layout_shop")
@section("do-du-lieu-vao-layout")
<div class="section" id="breadcrumb-wp">
    <div class="wp-inner">
        <div class="section-detail clearfix">
            <h3 class="title fl-left">Đăng nhập</h3>
            <ul class="list-breadcrumb fl-right">
                <li>
                    <a href="{{ asset ('') }}" title="">Trang chủ</a>
                </li>
                <li>
                    <a href="" title="">Đăng nhập</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="customer_login mt-60">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>Đăng nhập</h2>
                    @if(Request::get("notify") == "invalid")
                    <div class="alert alert-danger">Sai email hoặc password</div>
                    @endif
                    <form method='post' action="{{ url('customers/login-post') }}">
                      @csrf
                        <p>
                            <label>email <span>*</span></label>
                            <input type="email" class="input-control" name="email" required="">
                        </p>
                        <p>
                            <label>mật khẩu <span>*</span></label>
                            <input type="password" class="input-control" name="password" required="">
                        </p>
                        <div class="login_submit">
                            <a href="#">Quên mật khẩu?</a>
                            <label for="remember">
                                <input id="remember" type="checkbox">
                                Nhớ mặt khẩu
                            </label>
                            <button type="submit">đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--login area start-->

            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <p><h2>Tạo tài khoản mới</h2></p>
                    <p>Đăng ký tài khoản để mua hàng nhanh hơn. Theo dõi đơn đặt hàng, vận chuyển. Cập nhật các sự kiện và chương trình giảm giá của chúng tôi.</p>
                    <a href="{{ url('customers/register') }}" class="button">Đăng ký</a> </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection