<?php


namespace App\Model;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notice extends Model
{
    protected $table='notice';

    public $timestamps=false;

    protected $fillable=['title','label_id','source','time','content'];

    public static function getAllNotice(){
        $data=DB::select('SELECT a.id,a.title,a.source,a.time,b.name as label FROM notice as a, notice_label as b
                           WHERE a.label_id=b.id ORDER BY a.time');
        return $data;
    }

    public static function addNotice($data){
        $title=$data['title'];
        $label_id=$data['label'];
        $source=$data['source'];
        $time=Carbon::now()->toDateTimeString();
        $content=$data['content'];
        self::create([
            'title'=>$title,
            'label_id'=>$label_id,
            'source'=>$source,
            'time'=>$time,
            'content'=>$content
        ]);

    }

    public static function deleteNotice($id){
        self::find($id)->delete();
    }
}