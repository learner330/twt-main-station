<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\LeagueBuilding;
use Illuminate\Http\Request;

class LeagueBuildingController extends Controller
{
    public function getAllPhotos(){
        $data=LeagueBuilding::getAllPhotos();
        return view('admin.leaguebuilding.showLeagueBuilding')->with('data',$data);
    }

    public function addPhoto(Request $request){
        if($request->isMethod('GET')){
            return view('admin.leaguebuilding.addLeaguebuilding');
        } else if ($request->isMethod('POST')){
            LeagueBuilding::addPhoto($request->all());
        }
        return redirect('admin/league');
    }

    public function deletePhoto(Request $request){
        LeagueBuilding::deletePhoto($request->input('id'));
        return redirect('admin/league');
    }
}