<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function getMembersByGroup(Request $request, $gid){
        $data=Member::getMembersByGroup($gid);
        return view('admin.member.showMembers')->with(['data'=>$data,'gid'=>$gid]);
    }

    public function addMember(Request $request, $gid){
        if($request->isMethod('GET')){
            return view('admin.member.addMember')->with('gid',$gid);
        } else if($request->isMethod('POST')){
            Member::addMember($request->all());
        }
        return redirect('admin/member/'.$gid);

    }

    public function deleteMember(Request $request){
        $id=$request->input('id');
        Member::deleteMember($id);
        return redirect('admin/member/'.$request->input('gid'));
    }
}