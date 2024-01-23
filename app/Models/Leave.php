<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $table = "leaves";

    protected $primaryKey = "id";

    protected $fillable = [
        "post_id",
        "startdate",
        "enddate",
        "tag",
        "title",
        "content",
        "image",
        "stage_id",
        "authorize_id",
        "user_id",
    ];

    public function stage(){
        return $this -> belongsTo(Stage::class);
    }
    
    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function post(){
        return $this -> belongsTo(Post::class); 
    } 

    public function tags(){
        return $this -> belongsTo(User::class,"tag");
    }

    public function scopefilter($query){
        return $query -> where(function($query){
            if($getfilter =  request("filter")){
                $query -> where("post_id",$getfilter);
            }
        }) ;
    }

    public function scopesearchonly($query){
        return $query -> where(function($query){
            if($getsearch = request("search")){
                $query ->where("created_at","LIKE","%".$getsearch."%")
                ->orwhere("updated_at","LIKE","%".$getsearch."%")
                ->orWhereHas("post",function($query) use ($getsearch){
                    $query -> where("title","LIKE","%".$getsearch."%");
                })
                ->orWhereHas("tags",function($query) use($getsearch){
                    $query -> where("name","LIKE","%".$getsearch."%");
                })
                ->orWhereHas("stage",function($query) use($getsearch){
                    $query -> where("name","LIKE","%".$getsearch."%");
                });
            }
        });
    }

}
