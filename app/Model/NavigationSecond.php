<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class NavigationSecond extends Model
{
    protected $table = 'navigation_bar_second';

    public $timestamps = false;

    protected $fillable = [
        'name', 'target_url','position','firstId'
    ];

    public static function getAllNavigations(){
        $data = self::all();
        return $data;
    }

    public static function updateInfo($data){
        $id = $data['sid'];
        $title = $data['title'];
        $link = $data['link'];
        $position = $data['position'];
        self::where(['id'=>$id])->update([
            'name' =>$title,
            'target_url' => $link,
            'position' => $position
        ]);
    }

    public static function add($data){
        $title = $data['title'];
        $link = $data['link'];
        $fid = $data['fid'];
        $position = $data['position'];
        self::create([
            'name' =>$title,
            'target_url' => $link,
            'firstId'=> $fid,
            'position' => $position
        ]);
    }

    public static function deleteNavigation($sid){
        self::find($sid)->delete();
    }


}