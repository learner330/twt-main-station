<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function getAllActivities(){
        $data=Activity::getAllActivities();
        return view('admin.activity.showActivity')->with('data',$data);
    }

    public function addActivity(Request $request){
        if($request->isMethod('GET')){
            return view('admin.activity.addActivity');
        } else if ($request->isMethod('POST')){
            Activity::addActivity($request->all());
        }
        return redirect('admin/activity');
    }

    public function deleteActivity(Request $request){
        Activity::deleteActivity($request->input('id'));
        return redirect('admin/activity');
    }
}