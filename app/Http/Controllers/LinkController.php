<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinkController extends Controller
{
    //
    public function getlink(){
        $link= DB::table('link')->orderby('displayOrder','asc')->get();
        return $link;
    }
}
