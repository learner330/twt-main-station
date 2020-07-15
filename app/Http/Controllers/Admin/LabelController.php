<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function getAllLabel(){
        $data=Label::getAllLabel();
        return view('admin.label.showLabels')->with('data',$data);
    }

    public function addLabel(Request $request){
        if($request->isMethod('GET')){
            return view('admin.label.addLabel');
        } else if ($request->isMethod('POST')){
            Label::addLabel($request->all());
        }
        return redirect('admin/label');
    }

    public function deleteLabel(Request $request){
        Label::deleteLabel($request->input('id'));
        return redirect('admin/label');
    }
}