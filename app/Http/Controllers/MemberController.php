<?php
/**
 * Created by PhpStorm.
 * User: 田家硕
 * Date: 2020/7/11
 * Time: 22:48
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function groupMember(Request $request,$groupId){
        $members=DB::table('member')->where("group_id",$groupId)->get();
        return $members;
    }
    public function leagueBuilding(){
        $images =  DB::table('league_building')->orderby('display_order','asc')->get();
        return $images;
    }

}