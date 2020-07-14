<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Activity extends Model
{
    protected $table='activity';

    public $timestamps=false;

    protected $fillable=['title','image_url','target_url'];

    private static function uploadImage(UploadedFile $file){
        $maxSize = 2048000;
        $allowedTypes = ['jpg','jpeg', 'png','svg'];

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

    public static function getAllActivities(){
        return self::all();
    }

    public static function addActivity($data){
        $title=$data['title'];
        $target_url=$data['target_url'];
        $image_url=self::uploadImage($data['image']);

        self::create([
            'title'=>$title,
            'image_url'=>$image_url,
            'target_url'=>$target_url
        ]);
    }

    public static function deleteActivity($id){
        self::find($id)->delete();
    }
}