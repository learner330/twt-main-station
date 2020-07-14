<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Link extends Model
{
    protected $table='link';

    public $timestamps=false;

    protected $fillable=['title', 'icon_url','target_url','displayOrder'];

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

    public static function getLinkById($id){
        return self::find($id);
    }

    public static function getAllLinks(){
        return self::all();
    }

    public static function addLink($content){
        $title=$content['title'];
        $icon_url=self::uploadImage($content['image']);
        $target_url=$content['link'];
        $displayOrder=$content['position'];
        self::create([
            'title'=>$title,
            'icon_url'=>$icon_url,
            'target_url'=>$target_url,
            'displayOrder'=>$displayOrder
        ]);
    }

    public static function updateLink($data){
        $title=$data['title'];
        $target_url=$data['link'];
        $displayOrder=$data['position'];
        if(isset($data['image'])){
            $icon_url=self::uploadImage($data['image']);
            self::where(['id'=>$data['id']])->update([
                'title'=>$title,
                'icon_url'=>$icon_url,
                'target_url'=>$target_url,
                'displayOrder'=>$displayOrder
            ]);
        } else {
            self::where(['id'=>$data['id']])->update([
                'title'=>$title,
                'target_url'=>$target_url,
                'displayOrder'=>$displayOrder
            ]);
        }
    }

    public static function deleteLink($id){
        self::find($id)->delete();
    }

}