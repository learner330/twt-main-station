<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Label;
use App\Model\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function getAllNotice(){
        $data=Notice::getAllNotice();
        return view('admin.notice.showNotice')->with('data',$data);
    }

    public function addNotice(Request $request){
        if($request->isMethod('GET')){
            $label=Label::getAllLabel();
            return view('admin.notice.addNotice')->with('label',$label);
        } else if($request->isMethod('POST')){
            Notice::addNotice($request->all());
        }
        return redirect('admin/notice');
    }

    public function deleteNotice(Request $request){
        Notice::deleteNotice($request->input('id'));
        return redirect('admin/notice');
    }
}