<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    //
    public function in_label(Request $request,$labelld){
        $id=DB::table("notice_label")->where("name",$labelld)->first()->value('id');
        $responce=DB::table('notice')->where("label_id",$id)->orderby('time','desc')->get();
        return $responce;
    }

    public function in_time(){
            $responce=DB::table("notice_label")->orderby('time','desc')->get();
            return $responce;
    }

    public function queryAllNotice(){
        $notices=DB::table('notice')->orderby('time','desc')->get();
        foreach($notices as $notice){
            $label = DB::table('notice_label')->where("id",$notice->label_id)->pluck('name');
            $notice->label= $label[0];
        }
        return $notices;
    }

    public function noticeDetails(Request $request,$id){
        $details=DB::table('notice')->where("id",$id)->get();
        return $details;
    }


}
