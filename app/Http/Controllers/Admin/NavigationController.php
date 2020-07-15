<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\NavigationFirst;
use App\Model\NavigationSecond;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function getAllNavigations(){
        $data = NavigationFirst::getAllNavigations();
        return view('admin.navigation.showNavigations')->with(['data'=>$data]);
    }

    public function addFirstNavigation(Request $request){
        if($request->isMethod("GET")){
            return view('admin.navigation.addFirstNavigations');
        } else if($request->isMethod("POST")){
            $data = $request->all();
            NavigationFirst::add($data);
        }
        return redirect('admin/navigation/');
    }

    public function updateFirstNavigation(Request $request,$id){
        if($request->isMethod('GET')){
            return view("admin.navigation.updateFirstNavigation")->with('id', $id);
        } else if ($request->isMethod('PUT')){
            NavigationFirst::updateInfo($request->all());
        }
        return redirect('admin/navigation/');
    }

    public function deleteFirstNavigation(Request $request){
        NavigationFirst::deleteNavigation($request->input('f_id'));
        return redirect('admin/navigation/');
    }

    public function addSecondNavigation(Request $request, $fid){
        if($request->isMethod("GET")){
            return view('admin.navigation.addSecondNavigation')->with('fid',$fid);
        } else if($request->isMethod("POST")){
            $data = $request->all();
            NavigationSecond::add($data);
        }
        return redirect('admin/navigation/');
    }

    public function updateSecondNavigation(Request $request, $id){
        if($request->isMethod('GET')){
            return view("admin.navigation.updateSecondNavigation")->with('id', $id);
        } else if ($request->isMethod('PUT')){
            NavigationSecond::updateInfo($request->all());
        }
        return redirect('admin/navigation/');
    }

    public function deleteSecondNavigation(Request $request){
        NavigationSecond::deleteNavigation($request->input('s_id'));
        return redirect('admin/navigation/');
    }
}