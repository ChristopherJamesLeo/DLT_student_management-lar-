<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Edulink;
use App\Models\Stage;
use App\Models\Post;
use App\Models\Status;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EdulinksController extends Controller
{
    public function index()
    {
        // $data["edulinks"] = Edulink::orderby("updated_at","desc")->get();
        $data["edulinks"] = Edulink::orderby("updated_at","desc")->paginate(7);

        // $data["stages"] = Stage::whereIn("id",["1","2","3"])->get();
        
        // backward slack on သည် system မှ default ပါသော class ‌ရှေတွင် ထည့်‌ေးလျင်ပို ကောင်းသည် 
        $data["posts"] = \DB::table("posts")->where("attshow",3)->orderby("title","asc")->pluck("title","id"); 

        $data["filterposts"] = Post::whereIn("attshow",[3])->orderby("title","asc")->pluck("title","id")->prepend("Choose Status..." , " ");
        // ပို့ချင်သာ data များ အား data ထဲကောက်ထည့်ပြီး data ပို့ ရုံဖြင့် အလုပ်လုပ်နိုင်သည် 
        return view("edulinks.index",$data);
    }


    public function create()
    {
        $statuses = Status::whereIn("id",[3,4])->get(); // မိမိ ပို့ချင်သော id 3 နှင့် 4 သာပို့ပေးမည် 
        return view("edulinks.create",compact("statuses"));
    }


    public function store(Request $request)
    {
        $this -> validate($request,[   
            "classdate" => "required|date", // date ဘဲယူမည်
            "post_id" => "required",
            "url" => "required"
        ]);

        $user = Auth::user(); // log in ဝင်ထား‌သောကောင်၏ data ရယူရန်

        $user_id = $user->id;

        $edulink = new Edulink();
        $edulink -> classdate = $request["classdate"];
        $edulink -> post_id = $request["post_id"]; 
        $edulink -> url = $request["url"]; 
        $edulink -> user_id = $user_id;  

        $edulink -> save();

        // return redirect() -> back();
        return redirect()->route("edulinks.index");
    }


    public function show(string $id)
    {
        $edulink = Edulink::findOrFail($id);

        return view("edulinks.show",["role"=>$role]);
    }


    public function edit(string $id)
    {
        $edulink = Edulink::findOrFail($id);
        $statuses = Status::whereIn("id",[3,4])->get();
        return view("edulinks.edit")->with("edulink",$edulink)->with("statuses",$statuses);
    }


    public function update(Request $request, string $id)
    {

        $edulink = Edulink::findOrFail($id);
        $edulink -> stage_id = $request["stage_id"];
        $edulink -> remark = $request["remark"];



        $edulink -> save();

        return redirect(route("edulinks.index"));
    }


    public function destroy(string $id)
    {
        $edulink = Edulink::findOrFail($id);


        $edulink -> delete();

        return redirect()->back();
    }
}