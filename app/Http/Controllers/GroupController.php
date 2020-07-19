<?php
/**
 * Created by PhpStorm.
 * User: 田家硕
 * Date: 2020/7/11
 * Time: 23:34
 */

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function queryGroupSynopsis($id){
        $groups_mobile = DB::table('group')->where("id",$id)->get();
        $name = DB::table('group')->where("id",$id)->pluck('name');
        $groups = DB::table('group')->where("name",$name)->where('is_mobile', '0')->get();
        return response()->json([
            'pc' => $groups,
            'mobile' => $groups_mobile
        ]);
    }
}