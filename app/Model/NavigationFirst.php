<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NavigationFirst extends Model {
    protected $table = 'navigation_bar_first';

    public $timestamps = false;

    protected $fillable = [
        'name', 'target_url','position'
    ];

    public static function getAllNavigations(){
        $first = self::all()->toArray();
        $second = NavigationSecond::getAllNavigations()->toArray();

        $data = [];
        for($i=0; $i<count($first); $i++){
            $data[$i] = $first[$i];
            $id=$first[$i]['id'];
            for ($j=0; $j<count($second); $j++){
                if ($second[$j]['firstId'] == $id){
                    array_push($data[$i], $second[$j]);
                }
            }
        }


        return $data;
    }

    public static function add($data){
        $title = $data['title'];
        $link = $data['link'];
        $position = $data['position'];
        self::create([
            'name' =>$title,
            'target_url' => $link,
            'position' => $position
        ]);
    }

    public static function updateInfo($data){
        $id = $data['fid'];
        $title = $data['title'];
        $link = $data['link'];
        $position = $data['position'];
        self::where(['id'=>$id])->update([
            'name' =>$title,
            'target_url' => $link,
            'position' => $position
        ]);
    }

    public static function deleteNavigation($fid){
        self::find($fid)->delete();
    }

}