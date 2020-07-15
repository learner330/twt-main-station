<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    public function gettheme(){
        $themeid= DB::table('theme')->first();
        return $themeid;
    }
}
