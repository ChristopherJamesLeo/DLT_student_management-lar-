<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = "contacts";
    protected $primaryKey = "id";
    protected $fillable = [
        "firstname",
        "lastname",
        "birthday",
        "relative_id",
        "user_id",
    ];

    public function user(){
        return $this -> belongsTo(User::class); 
    }

    public function relative(){
        return $this -> belongsTo(Relative::class); 
    }
}


// relative တွင် name / status id / နှစ်ခု table ဆောက်ပြိ day ထဲမှ ယူမည် 

