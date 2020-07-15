<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProduct(){
        $data=Product::getAllProduct();
        return view('admin.product.showProduct')->with('data',$data);
    }

    public function addProduct(Request $request){
        if($request->isMethod('GET')){
            return view('admin.product.addProduct');
        } else if($request->isMethod('POST')){
            Product::addProduct($request->all());
        }
        return redirect('admin/product');
    }

    public function deleteProduct(Request $request){
        Product::deleteProduct($request->input('id'));
        return redirect('admin/product');
    }
}