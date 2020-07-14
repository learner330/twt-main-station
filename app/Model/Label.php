<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $table='notice_label';

    public $timestamps=false;

    protected $fillable=['name'];

    public static function getAllLabel(){
        return self::all();
    }

    public static function addLabel($data){
        $name=$data['name'];
        self::create([
            'name'=>$name
        ]);
    }

    public static function deleteLabel($id){
        self::find($id)->delete();
    }
}