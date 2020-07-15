<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarController extends Controller
{
    //
    public function firstbar(){
        $firstbar=DB::table('navigation_bar_first')->orderby('position','asc')->get();
        return $firstbar;
    }

    public function secondbar(){
        $firstbar=DB::table('navigation_bar_second')->orderby('position','asc')->get();
        return $firstbar;
    }

}
