<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//sử dụng QueryBuilder thì using đối tượng sau
use DB;

class HomeController extends Controller
{
    public function index(){
        //nếu muốn truyền dữ liệu ra file home.blade.php thì truyền thêm tham số thứ 2 vào hàm view
        return view("frontend.home");
    }
    //tạo hàm để từ view gọi hàm này lấy dữ liệu
    //sử dụng từ khóa static để bên ngoài view sẽ truy cập theo dạng: \App\Http\Controllers\HomeController::hotProducts();
    public static function hotProducts(){
        $products = DB::table("products")->where("hot","=",1)->orderBy("id","desc")->get();
        return $products;
    }
    public static function getCategories(){
        $categories = DB::table("categories")->where("display_at_home_page","=",1)->orderBy("id","desc")->get();
        return $categories;
    }
    public static function getProductsInCategory($category_id){
        $products = DB::table("products")->where("category_id","=",$category_id)->orderBy("id","desc")->skip(0)->take(8)->get();
        return $products;
    } 
    public static function hotNews(){
        $news = DB::table("news")->where("hot","=",1)->orderBy("id","desc")->skip(0)->take(6)->get();
        return $news;
    } 
}
