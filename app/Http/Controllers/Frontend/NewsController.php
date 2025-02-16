<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NewsController extends Controller
{
    public function detail($id){
        $record = DB::table("news")->where("id","=",$id)->first();
        return view("frontend.news_detail",["record"=>$record]);
    }

    public function index(){               
        $data = DB::table("news")->orderBy("id","desc")->paginate(16);
        return view("frontend.news_category",["data"=>$data]);
    }
}
