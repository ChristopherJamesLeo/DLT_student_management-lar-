<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;
    protected $table = "enrolls";
    protected $primaryKey = "id";
    protected $fillable = [
        "image",
        "post_id",
        "user_id",
        "stage_id",
        "remark"
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

    public function student($userid){

        // method 2 

        // reg number ကို pluck ဖြင့် သီးသန့်ဆွဲထုတ်ပြိး ပို့မည့်
        // $students = Student::where("user_id",$userid)->get()->pluck("regnumber");

        // // dd($students);
        
        // foreach($students as $student){
        //     // dd($student);

        //     return $student;
        // }

        // method 3 
        // model မှ တိုက်ရိုက် userid ကို ယူလိုက်သည် 
        // $students = Student::where("user_id",$this -> user_id)->get();
        // foreach($students as $student){
        //     // dd($student);

        //     return $student;
        // }

         // method 4
        // model မှ တိုက်ရိုက် userid ကို ယူလိုက်သည် 
        $students = Student::where("user_id",$this -> user_id)->get()->pluck("regnumber");
        foreach($students as $student){
            // dd($student);

            return $student;
        }

    }


}

