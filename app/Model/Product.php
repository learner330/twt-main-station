<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Product extends Model
{
    protected $table='product';

    public $timestamps=false;

    protected $fillable=['name','target_url','image_url','pad_image_url','phone_image_url','introduction'];

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

    public static function getAllProduct(){
        return self::all();
    }

    public static function addProduct($data){
        $name=$data['name'];
        $target_url=$data['target_url'];
        $introduction=$data['introduction'];
//        $image_url=self::uploadImage($data['image']);
        $image_url=(isset($data['image'])) ? self::uploadImage($data['image']) : "0";
        $pad_image_url= (isset($data['pad_image'])) ? self::uploadImage($data['pad_image']) : "0";
        $phone_image_url= (isset($data['phone_image'])) ? self::uploadImage($data['phone_image']) : "0";
        self::create([
            'name'=>$name,
            'target_url'=>$target_url,
            'image_url'=>$image_url,
            'pad_image_url'=>$pad_image_url,
            'phone_image_url'=>$phone_image_url,
            'introduction'=>$introduction
        ]);
    }

    public static function deleteProduct($id){
        self::find($id)->delete();
    }
}