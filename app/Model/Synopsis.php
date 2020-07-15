<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Synopsis extends Model
{
    protected $table='twt_synopsis';

    public $timestamps=false;

    protected $fillable=['content'];

    public static function getSynopsis(){
        return self::first();
    }

    public static function updateSynopsis($content){
        self::find(1)->update(['content'=>$content]);
    }
}