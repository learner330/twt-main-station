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
    public function queryGroupSynopsis($groupId){
        $groups = DB::table('group')->where("id",$groupId)->get();
        return $groups;
    }
}