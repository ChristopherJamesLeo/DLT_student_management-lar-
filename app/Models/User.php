<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function comments(){
        return $this -> morphMany(Comment::class,"commentable");
    }


    // user မှ like လုပ်မည့် ကောင်ကို ရှာမည်
    public function likes(){
        // return $this -> belongsToMany(Post::class,"post_like");
        return $this -> belongsToMany(Post::class,"post_like")->withTimestamps(); // timestamp ပါ ထည့်ပေးရန် ေပြာသည် 
    }

    public function checkpostlike($post_id){
        // like ထဲရှီ data များမှ ဆွဲထုတ်ပြီး post_id သည် $post_id ရှိသလား စစ်ခြင်းဖြစ်သည် 
        return $this -> likes() -> where("post_id",$post_id)->exists(); // true of false
    }
}
