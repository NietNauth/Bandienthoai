<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//kế thừa class Cart
use \App\Http\ShoppingCart\Cart;
use DB;

class CartController extends Controller
{  
    //thêm sản phẩm vào giỏ hàng
    public function buy(Request $request,$id){
        //gọi hàm cartAdd từ class Cart
        Cart::cartAdd($id);
        return redirect(url("cart"));
    }
    //hiển thị danh sách giỏ hàng
    public function index(){
        //lấy giỏ hàng
        $cart = Cart::cartList();
        return view("frontend.cart",["cart"=>$cart]);
    }
    //xóa sản phẩm khỏi giỏ hàng
    public function remove($id){
        Cart::cartDelete($id);
        return redirect(url("cart"));
    }
    //xóa toàn bộ sản phẩm khỏi giỏ hàng
    public function destroy(){
        Cart::cartDestroy();
        return redirect(url("cart"));
    }
    //cập nhật số lượng sản phẩm
    public function update(){
        //lấy giỏ hàng
        $cart = Cart::cartList();
        //duyệt các phần tử trong session cart
        foreach($cart as $product){
            $name = "product_".$product['id'];
            $new_quantity = $_POST[$name];
            //gọi hàm cartUpdate để update lại số lượng sản phẩm
            Cart::cartUpdate($product['id'],$new_quantity);
        }
        return redirect(url("cart"));
    }
    //thanh toán đơn hàng
    public function checkOut(){
        $customer_id = session()->get("customer_id");
        if(isset($customer_id)){
            $cart = Cart::cartList();
            $customer = DB::table("customers")->where('id', $customer_id)->first();
            return view("frontend.check_out",["cart"=>$cart,"customer"=>$customer]);
        }else
            return redirect(url('customers/login'));
    }
    //đặt đơn hàng
    public function order(){
        $customer_id = session('customer_id');

        $name = request()->get('name');
        $email = request()->get('email');
        $address = request()->get('address');
        $phone = request()->get('phone');
        $note = request()->get('note');

        DB::table('customers')->where('id', $customer_id)->update(['name' => $name,'email' => $email,'address' => $address,'phone' => $phone]);

        Cart::cartOrder($note);

        // Chuyển hướng về trang giỏ hàng hoặc trang thông báo đặt hàng thành công
        return redirect(url("cart"));
    }
}
