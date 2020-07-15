<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LeagueBuilding extends Model
{
    protected $table='league_building';

    public $timestamps=false;

    protected $fillable=['title','image_url','display_order'];

    private static function uploadImage(UploadedFile $file){
        $maxSize = 2048000;
        $allowedTypes = ['jpg','jpeg', 'png', 'svg'];

        $fileSize = $file->getSize();
        $fileExtension = strtolower($file->getClientOriginalExtension());
        if(!in_array($fileExtension, $allowedTypes)){
            die();
        }
        if($fileSize > $maxSize){
            die();
        }

        $storeName = time() . '_' . random_int(1,9999) . '.' . $fileExtension;
        $path = $file->move('storage/images', $storeName);
        $url = str_replace('\\', '/', $path->getPathname());
        return $url;
    }

    public static function getAllPhotos(){
        return self::all();
    }

    public static function addPhoto($data){
        $title=$data['title'];
        $image_url=self::uploadImage($data['image']);
        $display_order=$data['display_order'];

        self::create([
            'title'=>$title,
            'image_url'=>$image_url,
            'display_order'=>$display_order
        ]);
    }

    public static function deletePhoto($id){
        self::find($id)->delete();
    }
}