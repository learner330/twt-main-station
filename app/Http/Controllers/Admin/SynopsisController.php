<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Synopsis;
use Illuminate\Http\Request;

class SynopsisController extends Controller
{
    public function getSynopsis(){
        $content=Synopsis::getSynopsis();
        return view('admin.synopsis.showSynopsis')->with('content',$content);
    }

    public function updateSynopsis(Request $request){
        if($request->isMethod('GET')){
            $data=Synopsis::getSynopsis();
            return view('admin.synopsis.updateSynopsis')->with('data',$data);
        } else if($request->isMethod('PUT')){
            Synopsis::updateSynopsis($request->input('content'));
        }
        return redirect('admin/synopsis');
    }
}