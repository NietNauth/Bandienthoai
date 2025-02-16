<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//để sử dụng Query Builder cần phải use đối tượng sau
use DB;

class ProductsController extends Controller
{
    public function category($category_id){               
        $data = DB::table("products")->where("category_id","=",$category_id)->orderBy("id","desc")->paginate(16);
        //lấy giá trị truyền từ url
        $order = request('order'); 
        switch ($order) {
            case 'nameAsc':
                $data = DB::table("products")->where("category_id","=",$category_id)->orderBy("name","asc")->paginate(16);
                break;
            case 'nameDesc':
                $data = DB::table("products")->where("category_id","=",$category_id)->orderBy("name","desc")->paginate(16);
                break;
            case 'priceAsc':
                $data = DB::table("products")->where("category_id","=",$category_id)->orderBy("price","asc")->paginate(16);
                break;
            case 'priceDesc':
                $data = DB::table("products")->where("category_id","=",$category_id)->orderBy("price","desc")->paginate(16);
                break;
        }
        return view("frontend.product_category",["category_id"=>$category_id,"data"=>$data,'order'=>$order]);
    }
    public function detail($id){
        $record = DB::table("products")->where("id","=",$id)->first();
        return view("frontend.product_detail",["record"=>$record]);
    }
    public function search(Request $request){
        //lấy biến key truyền từ url
        $key = request('key');//hoặc $key = $request->get('key');
        $data = DB::table("products")->where("name","like",'%'.$key.'%')->orWhere("description","like",'%'.$key.'%')->orWhere("content","like",'%'.$key.'%');
        $order = request('order'); 
        switch ($order) {
            case 'nameAsc':
                $data->orderBy("name","asc");
                break;
            case 'nameDesc':
                $data->orderBy("name","desc");
                break;
            case 'priceAsc':
                $data->orderBy("price","asc");
                break;
            case 'priceDesc':
                $data->orderBy("price","desc");
                break;
        }
        $data = $data->paginate(16);
        return view("frontend.product_search",["key"=>$key,"data"=>$data,'order'=>$order]);
    }
    public function ajax(){
        //lấy biến key truyền từ url
        $key = request('key');//hoặc $key = $request->get('key');
        $data = DB::table("products")->where("name","like",'%'.$key.'%')->orWhere("description","like",'%'.$key.'%')->orWhere("content","like",'%'.$key.'%')->select('name','id','photo')->get();
        $str = "";
        foreach($data as $row){
            $str =  $str."<li><img src='".asset('upload/products/'.$row->photo)."'> <a href='".url('products/detail/'.$row->id)."'>".$row->name."</a></li>";
        }
        echo $str;
    }
    public static function getSameCategoryProducts($category_id, $product_id){
        $products =DB::table("products")->where("category_id", "=", $category_id)->where("id", "<>", $product_id)->get();
        return $products;
    }
    public function searchPrice(Request $request){
        //lấy biến key truyền từ url
        $fromPrice = request('fromPrice');
        $toPrice = request('toPrice');
        $data = DB::table("products")->where("price",">=",$fromPrice)->where("price","<=",$toPrice)->paginate(40);
        //print_r($data);
        return view("frontend.product_search_price",["fromPrice"=>$fromPrice,"toPrice"=>$toPrice,"data"=>$data]);
    }
}
