<?php
/**
 * Created by PhpStorm.
 * User: 田家硕
 * Date: 2020/7/11
 * Time: 11:59
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function queryAllProduct(){
        $products = DB::table('product')->get();
        return $products;
    }
     public function queryProductSynopsis($productId){
        $synopsis = DB::table('product')->where("id",$productId)->get();
        return $synopsis;
     }
}