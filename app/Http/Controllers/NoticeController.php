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

}
