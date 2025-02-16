@extends("frontend.layout_home")
@section("do-du-lieu-vao-layout")
<div class="section" id="breadcrumb-wp">
    <div class="wp-inner">
        <div class="section-detail clearfix">
            <h3 class="title fl-left">Địa chỉ</h3>
            <ul class="list-breadcrumb fl-right">
                <li>
                    <a href="{{ asset ('') }}" title="">Trang chủ</a>
                </li>
                <li>
                    <a href="" title="">Địa chỉ</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6827.175978600032!2d105.789263!3d21.03612!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab2b602bd3d5%3A0x43c244a0ea63363!2zRGkgxJDhu5luZyBWaeG7h3Q!5e1!3m2!1sen!2sus!4v1739650715687!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>
@endsection