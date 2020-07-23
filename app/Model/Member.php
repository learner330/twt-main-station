<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Member extends Model
{
    protected $table='member';

    public $timestamps=false;

    protected $fillable=['name','group_id','college','major','image_url','grade','introduction','whereabout'];

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

    public static function getMembersByGroup($id){
        $data=self::where(['group_id'=>$id])->get()->toArray();
        return $data;
    }

    public static function getMemberById($id){
        return self::find($id);
    }
    public static function addMember($data){
        $name=$data['name'];
        $group_id=$data['gid'];
        $college=$data['college'];
        $major=$data['major'];
        $image_url="0";
        if (isset($data['image'])){
            $image_url=self::uploadImage($data['image']);
        }
        $grade=$data['grade'];
        $introduction=$data['introduction'];
        $whereabout=$data['whereabout'];
        self::create([
            'name'=>$name,
            'group_id'=>$group_id,
            'college'=>$college,
            'major'=>$major,
            'image_url'=>$image_url,
            'grade'=>$grade,
            'introduction'=>$introduction,
            'whereabout'=>$whereabout
        ]);
    }

    public static function deleteMember($id){
        self::find($id)->delete($id);
    }

    public static function updateMember($data){
        $originMember=self::getMemberById($data['id']);

        $name=$data['name'];
        $college=$data['college'];
        $major=$data['major'];
        $image_url=$originMember->image_url;
        if (isset($data['image'])){
            $image_url=self::uploadImage($data['image']);
        }
        $grade=$data['grade'];
        $introduction=$data['introduction'];
        $whereabout=$data['whereabout'];
        self::find($data['id'])->update([
            'name'=>$name,
            'college'=>$college,
            'major'=>$major,
            'image_url'=>$image_url,
            'grade'=>$grade,
            'introduction'=>$introduction,
            'whereabout'=>$whereabout
        ]);
    }

}