<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    //
    public function getbanner(){
        $banner= DB::table('banner')->orderby('state','asc')->get();
        return $banner;
    }
}
