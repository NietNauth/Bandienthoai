<div id="header-wp">
    <div class="wp-inner clearfix">
        <a href="{{ asset('') }}" title="" id="logo" class="fl-left">
            <img style="width: 160px; height: 45px" src="{{ asset ('frontend/images/logo.png') }}" alt="">
        </a>
        <ul id="main-menu" class="fl-left">
            <li>
                <a href="{{ asset('') }}" title="">Trang chủ</a>
            </li>
            <li>
                <a href="{{ asset('news') }}" title="">Tin tức</a>
            </li>
            <li>
                <a href="{{ url('products/search') }}" title="">Sản phẩm</a>
                <ul class="sub-menu">
                    @php
                        $categories = DB::table("categories")->where("parent_id","=",0)->orderBy("id","desc")->get();
                    @endphp
                    @foreach($categories as $row)
                    <li>
                        <a href="{{ url('products/category/'.$row->id) }}" title="">{{ $row->name }}</a>
                        @php
                          $subCategories = DB::table("categories")->where("parent_id","=",$row->id)->orderBy("id","desc")->get();
                        @endphp
                        @foreach($subCategories as $subRow)
                        <ul>
                            <li style="padding-left: 25px;"><a style="color:#b4666c;" href="{{ url('products/category/'.$subRow->id) }}">{{ $subRow->name }}</a></li>
                        </ul>
                        @endforeach
                    </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{ asset('cart') }}" title="">Giỏ hàng</a>
            </li>
            <li>
                <a href="{{ asset('contact') }}" title="">Địa chỉ</a>
            </li>
        </ul>

        <div id="action-wp" class="fl-right">
            <div id="search-wp" class="fl-left">
                <button type="button" class="btn" data-toggle="modal" data-target="#form-search-wp">
                    <i class="fa fa-search"></i>
                </button>
                <div class="modal fade" id="form-search-wp" tabindex="-1" role="dialog" aria-labelledby="lable">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <h1 class="title">Nhập từ khóa:</h1>
                            <form id="form-s" onsubmit="event.preventDefault(); submitForm(this);">
                                <input type="text" name="s" id="key" onkeyup="ajaxSearch();" onkeypress="searchForm(event);" value="" placeholder="Nhập từ khóa tìm kiếm...">
                                <button type="submit" id="btn-s"><i class="fa fa-search" onclick="location.href='{{ url('products/search') }}?key='+document.getElementById('key').value;"></i></button>
                                <div class="search-result">
                                    <ul>
                                      
                                    </ul>
                                </div>
                                <script type="text/javascript">
                                    function searchForm(event){
                                        if(event.which == 13)
                                            location.href = '{{ url('products/search') }}?key='+document.getElementById('key').value;
                                    }
                                    function ajaxSearch(){
                                        let key = document.getElementById('key').value;
                                        if(key != ''){
                                          $(".search-result").attr('style','visibility:visible');
                                          //---
                                          $.ajax({
                                            url: "{{ url('products/ajax-search') }}?key="+key,
                                            success: function( result ) {
                                              //clear content trong thẻ ul
                                              $('.search-result ul').empty();
                                              $('.search-result ul').append(result);
                                            }
                                          });
                                          //---
                                    }else
                                      $(".search-result").attr('style','visibility:hidden');
                                  }
                                </script>
                            </form>
                            <div class="thumb">
                                <img style="width: 45%; margin-left: 300px" src="{{ asset ('frontend/images/bg-s.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
            <!--  -->
            <?php 
              use App\Http\ShoppingCart\Cart;
            ?>
            <div id="cart-wp" class="fl-right">
                <a href="{{ asset('cart') }}" title="" id="btn-cart">
                    <i class="fa fa-shopping-basket"></i>
                    <span id="num">{{ Cart::cartNumber() }}</span>
                </a>
            </div>
            <!--  -->
            @php
                $customer_name = session()->get('customer_name');
                @endphp
            @if(isset($customer_name))
            <div id="user-wp" class="fl-right">
                <a href="#" class="user-link">Xin chào {{ $customer_name }}</a> |
                <a href="{{ url('customers/logout') }}" class="user-link">Đăng xuất</a>
            </div>
            @else
            <div id="user-wp" class="fl-right">
                <a href="{{ url('customers/login') }}" class="user-link">Đăng nhập</a> |
                <a href="{{ url('customers/register') }}" class="user-link">Đăng ký</a>
            </div>
            @endif
        </div>
    </div>
</div>

