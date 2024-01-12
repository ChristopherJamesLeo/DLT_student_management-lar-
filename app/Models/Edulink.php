<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edulink extends Model
{
    use HasFactory;

    protected $table = "edulinks";

    protected $primaryKey = "id";

    protected $fillbale = [
        "classdate",
        "post_id",
        "url",
        "user_id"
    ];

    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function status(){
        return $this -> belongsTo("App\Models\Status");
    }

    public function post(){
        return $this -> belongsTo(Post::class); 
    } 
    

    
}
