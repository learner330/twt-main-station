<?php
/**
 * Created by PhpStorm.
 * User: 田家硕
 * Date: 2020/7/11
 * Time: 23:05
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function queryAllActivity(){
        $activities =  DB::table('activity')->orderby('display_order','asc')->get();
        return $activities;
    }
}