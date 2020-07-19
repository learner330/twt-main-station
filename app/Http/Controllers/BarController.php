<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarController extends Controller
{
    //
    public function getbar(){
        $firstbar=DB::table('navigation_bar_first')->orderby('position','asc')->get();
        $secondbar=DB::table('navigation_bar_second')->orderby('position','asc')->get();

        return response()->json([
            'first' => $firstbar,
            'second' => $secondbar
        ]);
    }



}
