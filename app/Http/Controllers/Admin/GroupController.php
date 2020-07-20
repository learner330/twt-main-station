<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function getAllGroup(){
        $data=Group::getGroups();
        return view('admin.group.showGroup')->with('data',$data);
    }

    public function updateGroup(Request $request,$id){
        if($request->isMethod('GET')){
            $data = Group::getGroupsById($id);
            return view('admin.group.updateGroup')->with('data',$data);
        } else if($request->isMethod('PUT')){
            Group::updateInfo($request->all());
        }
        return redirect('admin/group');
    }
}