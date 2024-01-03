<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enroll;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EnrollsController extends Controller
{
    public function index()
    {
        $enrolls = Enroll::orderby("updated_at","desc")->get();

        $posts = DB::table("posts")->where("attshow",3)->orderby("title","asc")->get(); 

        return view("enrolls.index",compact("enrolls","posts"));
    }


    public function create()
    {
        $statuses = Status::whereIn("id",[3,4])->get(); // မိမိ ပို့ချင်သော id 3 နှင့် 4 သာပို့ပေးမည် 
        return view("enrolls.create",compact("statuses"));
    }


    public function store(Request $request)
    {
        $this -> validate($request,[
            "image" => "image|mimes:jpg,jpeg,png",   // accept လုပ်မည့် file type
            "remark" => "required"
        ]);

        $user = Auth::user(); // log in ဝင်ထား‌သောကောင်၏ data ရယူရန်

        $user_id = $user->id;

        $enroll = new Enroll();
        $enroll -> post_id = $request["post_id"];
        $enroll -> remark = $request["remark"]; 
        $enroll -> user_id = $user_id;  

        // single img upload
        if(file_exists($request["image"])){
            $file = $request["image"];

            $fname = $file->getClientOriginalName();

            $imagenewname = uniqid($user_id).$enroll["id"].$fname;   // user_id ကို radom ခေါ်ကဝင်မည် 

            $file -> move(public_path("assets/img/enrolls/"),$imagenewname);

            $filepath = "assets/img/enrolls/".$imagenewname;  

            $enroll -> image = $filepath; // store database 

        }

        $enroll -> save();

        return redirect() -> back();
    }


    public function show(string $id)
    {
        $enroll = Enroll::findOrFail($id);

        return view("enrolls.show",["role"=>$role]);
    }


    public function edit(string $id)
    {
        $enroll = Enroll::findOrFail($id);
        $statuses = Status::whereIn("id",[3,4])->get();
        return view("enrolls.edit")->with("enroll",$enroll)->with("statuses",$statuses);
    }


    public function update(Request $request, string $id)
    {
        $this -> validate($request,[
            // method 1 
            // "name" => "required|max:50|unique:enrolls,name,". $id,

            // method 2 -> array ဖြင့် လဲ ပေးနိုင်သည် pipe နေရာတွင် comer  ထည့်ပီး single code double code ထည့်ပေးနိုင်သည် // မှားနိုင်သည် 
            "name" => ["required","max:50","unique:enrolls,name,". $id],
            "image" => ["image","mimes:jpg,jpeg,png"],   // accept လုပ်မည့် file type
            "status_id" => ["required","in:3,4"]  // 3 နှင့် 4 ဘဲ လက်ခံမည် // fontend နှင့် ချိန်ပြီးထည့်ရမည် 

        ]);

 

        $user = Auth::user(); // log in ဝင်ထား‌သောကောင်၏ data ရယူရန်\

        $user_id = $user->id;

        $enroll = Enroll::findOrFail($id);
        $enroll -> name = $request["name"];
        $enroll -> slug = Str::slug($request["name"]); 
        $enroll -> status_id = $request["status_id"];  
        $enroll -> user_id = $user_id;  

        // Remove Old Img 
        if($request->hasFile("image")){
            $path = $enroll -> image; // ပတ်လမ်းကို ခေါ်ထုတ်မည် 

            if(File::exists($path)){ // ပတ်လမ်းကြောင်းအတိုင်း file ရှိမရှိ စစ်မည်
                File::delete($path); // file ရှိလျှင်ဖျက်မည် 
            }

        }

        // single img update
        if($request->hasFile("image")){


            $file = $request->file("image");
            $fname = $file->getClientOriginalName();
            $imagenewname = uniqid($user_id).$enroll["id"].$fname;   // user_id ကို radom ခေါ်ကဝင်မည် 

            $file -> move(public_path("assets/img/enrolls/"),$imagenewname);

            $filepath = "assets/img/enrolls/".$imagenewname;  // public အောက်တွင်ရှီသော folder နျင့် view ထဲတွင်ရှိနေသော folder route ပတ်လမ်းတူ၍ မရပေ

            $enroll -> image = $filepath; // store database 

            // The requested resource /roles was not found on this server // ၄င်းသည် folder name ကို ချိန်းပေးရမည် route ထဲတါင်ရှိနေသော name နှင့် public အောက်တွင်ရှိသော folder name တူ၍ မရပေ 
        }

        $enroll -> save();

        return redirect(route("enrolls.index"));
    }


    public function destroy(string $id)
    {
        $enroll = Enroll::findOrFail($id);

         // Remove Old Image

        $path = $enroll -> image; // ပတ်လမ်းကို ခေါ်ထုတ်မည် 

        if(File::exists($path)){ // ပတ်လမ်းကြောင်းအတိုင်း file ရှိမရှိ စစ်မည်
            File::delete($path); // file ရှိလျှင်ဖျက်မည် 
        }

        $enroll -> delete();

        return redirect()->back();
    }
}
