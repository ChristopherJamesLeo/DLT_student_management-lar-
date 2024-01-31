<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use App\Http\Requests\LeaveRequest;

use App\Models\Day;
use App\Models\Dayable;
use App\Models\Leave;
use App\Models\Post;
use App\Models\Status;
use App\Models\Stage;
use App\Models\Type;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;

use App\Notifications\LeaveNotify;

class LeavesController extends Controller
{
    public function index()
    {
        // $leaves = Leave::all();
        $leaves = Leave::filter()->searchonly()->paginate(3);

        $posts = Post::all()->pluck("title","id");

        return view("leaves.index",compact("leaves"))->with("posts",$posts);
    }


    public function create()
    {
        // $attshows = Post::whereIn("id",[3,4])->get(); 
        $data["posts"] = \DB::table("posts")->where("attshow",3)->orderBy("title","asc")->get()->pluck("title","id"); 
        
        $data["tags"] = User::orderBy("name","asc")->get()->pluck("name","id"); 

        $data["gettoday"] = Carbon::today()->format("Y-m-d"); // today ကိုရရန် format ထည့်ပေးမှသာ input မှ သိမည်ဖြစ်သည် 

        // dd($data["gettoday"]);
        return view("leaves.create",$data);

    }


    public function store(LeaveRequest $request)
    {
        // return $request;

        // $this -> validate($request,[
        //     "post_id" => "required",
        //     "startdate"  => "required|date",
        //     "enddate"  => "required|date",
        //     "tag" => "required",
        //     "title" => "required|max:50",
        //     "content" => "required",
        //     "image" => "nullable|image|mimes:jpg,jpeg,png|max:2048"
        // ]);


        $user = Auth::user(); // log in ဝင်ထား‌သောကောင်၏ data ရယူရန်

        $user_id = $user->id;

        $leave = new Leave();
        $leave -> post_id = $request["post_id"];
        $leave -> startdate = $request["startdate"];  
        $leave -> enddate = $request["enddate"];  
        $leave -> content = $request["content"];   
        $leave -> tag = $request["tag"];
        $leave -> title = $request["title"];
        $leave -> content = $request["content"];
        $leave -> user_id = $user_id;  

        // single img upload
        if(file_exists($request["image"])){

            $file = $request->file("image");

            $fname = $file->getClientOriginalName();

            $imagenewname = uniqid($user_id).$leave["id"].$fname;   

            $file -> move(public_path("assets/img/leaves/"),$imagenewname);

            $filepath = "assets/img/leaves/".$imagenewname;  

            $leave -> image = $filepath; 

        }

        $leave -> save();

        // $users = User::all(); // user အကုန် လံုးကို ပို့မည် 

        // $user = User::findOrFail($request["tag"]);
        // $user = User::findOrFail($leave -> tag);
        $tagperson = $leave->tagperson()->get(); // model မှ လှမ်းယူသည် 

        $studentId = $leave->student($user_id);
        // dd($studentId);
                        // ပို့ေစချင်တဲ့သူ              မိမိ ပြစေချင်သော data
        // Notification::send($users, new LeaveNotify($leave->id,$leave->title));
        // Notification::send($user, new LeaveNotify($leave->id,$leave->title));
        Notification::send($tagperson, new LeaveNotify($leave->id,$leave->title,$studentId));

        return redirect(route("leaves.index"));
    }


    public function show(string $id)
    {
        $leave = Leave::findOrFail($id);

        return view("leaves.show",["leave"=>$leave]);
    }


    public function edit(string $id)
    {
        $data["leave"] = Leave::findOrFail($id);

        $data['posts']= Post::all()->pluck("title","id");

        $data["stages"] = Stage::whereIn("id",["1","2","3"])->get()->pluck("name","id");

        $users = User::all()->pluck("name","id");

        return view("leaves.edit",$data,compact("users"));

    }


    public function update(LeaveRequest $request, string $id)
    {

        // $this -> validate($request,[

        //     "post_id" => "required",
        //     "startdate"  => "required|date",
        //     "enddate"  => "required|date",
        //     "tag" => "required",
        //     "title" => "required|max:50",
        //     "content" => "required",
        //     "stage_id" => "required",
        //     "image" => "nullable|image|mimes:jpg,jpeg,png|max:2048"

        // ]);

 

        $user = Auth::user(); // log in ဝင်ထား‌သောကောင်၏ data ရယူရန်\

        $user_id = $user->id;

        $leave = Leave::findOrFail($id);

        $leave -> post_id = $request["post_id"];
        $leave -> startdate = $request["startdate"];  
        $leave -> enddate = $request["enddate"];  
        $leave -> content = $request["content"];   
        $leave -> tag = $request["tag"];
        $leave -> stage_id = $request["stage_id"];
        $leave -> title = $request["title"];
        $leave -> content = $request["content"];
        // $leave -> user_id = $user_id;  edit လုပ်ပါက yser မဟုတ်ဘဲ admin ဖြစ်သွားမှဆိုးသောေကြာင့် ဖျက်ထားခဲ့သည်

        // Remove Old Img 
        if($request->hasfile("image")){
            $path = $leave -> image; // ပတ်လမ်းကို ခေါ်ထုတ်မည် 

            if(File::exists($path)){ // ပတ်လမ်းကြောင်းအတိုင်း file ရှိမရှိ စစ်မည်
                File::delete($path); // file ရှိလျှင်ဖျက်မည် 
            }

        }
       
        // single img update
        if($request->hasfile("image")){

            $file = $request->file("image");
            $fname = $file->getClientOriginalName();
            $imagenewname = uniqid($user_id).$leave["id"].$fname;  

            $file -> move(public_path("assets/img/leaves/"),$imagenewname);

            $filepath = "assets/img/leaves/".$imagenewname;  

            $leave -> image = $filepath;


        }

        $leave -> save();

        return redirect(route("leaves.index"));
    }


    public function destroy(string $id)
    {
        $leave = Leave::findOrFail($id);

         // Remove Old Image

        $path = $leave -> image; // ပတ်လမ်းကို ခေါ်ထုတ်မည် 

        if(File::exists($path)){ // ပတ်လမ်းကြောင်းအတိုင်း file ရှိမရှိ စစ်မည်
            File::delete($path); // file ရှိလျှင်ဖျက်မည် 
        }

        $leave -> delete();

        return redirect()->back();

    }
}
