<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Group extends Model
{
    protected $table="group";

    public $timestamps=false;

    protected $fillable=['image_url', 'introduction','name'];

    private static function uploadImage(UploadedFile $file){
        $maxSize = 4096000;
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

    public static function getGroups(){
        return self::all();
    }

    public static function getGroupsById($id){
        return self::find($id);
    }



    public static function updateInfo($data){
        $name=$data['name'];
        $introduction=$data['introduction'];
        if(isset($data['image'])){
            $image_url=self::uploadImage($data['image']);
            self::where(['id'=>$data['id']])->update([
                'name'=>$name,
                'introduction'=>$introduction,
                'image_url'=>$image_url
            ]);
        }
        self::where(['id'=>$data['id']])->update([
            'name'=>$name,
            'introduction'=>$introduction,
        ]);
    }
}