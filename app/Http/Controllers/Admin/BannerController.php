<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function getAllBanners(){
        $data=Banner::getAllBanners();
        return view('admin.banner.showBanners')->with('data',$data);
    }

    public function addBanner(Request $request){
        if($request->isMethod("GET")){
            return view('admin.banner.addBanner');
        } else if($request->isMethod("POST")){
            Banner::addBanner($request->all());
            return redirect('admin/banner');
        }
    }

    //TODO
    public function updateBanner(){

    }

    public function deleteBanner(Request $request){
        Banner::deleteBanner($request->input('id'));
        return redirect('admin/banner');
    }
}