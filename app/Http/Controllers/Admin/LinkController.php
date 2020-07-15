<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Link;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class LinkController extends Controller
{

    public function getAllLinks(){
        $data=Link::getAllLinks();
        return view('admin.link.showLinks')->with('data',$data);
    }

    public function addLink(Request $request){
        if($request->isMethod('GET')){
            return view('admin.link.addLink');
        } else if($request->isMethod('POST')){
            Link::addLink($request->all());
        }
        return redirect('admin/link');
    }

    public function updateLink(Request $request, $id){
        if($request->isMethod('GET')){
            $data=Link::getLinkById($id);
            return view('admin.link.updateLink')->with('data',$data);
        } else if($request->isMethod('PUT')){
            Link::updateLink($request->all());
        }
        return redirect('admin/link');
    }

    public function deleteLink(Request $request){
        Link::deleteLink($request->input('id'));
        return redirect('admin/link');
    }
}