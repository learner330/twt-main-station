<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    //
    public function in_label(Request $request,$labelId){
        $id=DB::table("notice_label")->where("id",$labelId)->value('id');

        $response=DB::table('notice')->where('label_id',$id)->orderby('time','desc')->get();
        return $response;
    }

    public function in_time(){
            $responce=DB::table("notice")->orderby('time','desc')->get();
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

    public function noticeDetails($id){
        $details=DB::table('notice')->where("id",$id)->get();
        foreach($details as $detail){
        $label = DB::table('notice_label')->where("id",$detail->label_id)->pluck('name');
        $detail->label= $label[0];
        }
        return $details;
    }


}
