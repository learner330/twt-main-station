<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Banner extends Model
{
    protected $table='banner';

    public $timestamps=false;

    protected $fillable=['title','image_url','target_url','state','starttime','endtime'];

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

    public static function addBanner($data){
        $title=$data['title'];
        $image_url=self::uploadImage($data['image']);
        $target_url=$data['link'];
        $state=$data['state'];
        $starttime=$data['starttime'];
        $endtime=$data['endtime'];
        self::create([
            'title'=>$title,
            'image_url'=>$image_url,
            'target_url'=>$target_url,
            'state'=>$state,
            'starttime'=>$starttime,
            'endtime'=>$endtime
        ]);
    }

    public static function getAllBanners(){
        $data = self::all();
        foreach ($data as &$d){
            $d->state=($d->state==1) ? "显示" : "不显示";
        }
        unset($d);
        return $data;
    }

    public static function deleteBanner($id){
        self::find($id)->delete();
    }
}