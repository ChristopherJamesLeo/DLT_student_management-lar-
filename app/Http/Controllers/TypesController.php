<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TypesController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $statuses = Status::whereIn("id",[3,4])->get(); 
        return view("types.index",compact("types","statuses"));
    }


    public function create()
    {
        $statuses = Status::whereIn("id",[3,4])->get(); // မိမိ ပို့ချင်သော id 3 နှင့် 4 သာပို့ပေးမည် 
        return view("types.create",compact("statuses"));
    }


    public function store(Request $request)
    {
        $this -> validate($request,[
            "name" => "required|max:50|unique:types,name",
            "status_id" => "required|in:3,4" 

        ]);


        $user = Auth::user(); // log in ဝင်ထား‌သောကောင်၏ data ရယူရန်

        $user_id = $user->id;

        $type = new Type();
        $type -> name = $request["name"];
        $type -> slug = Str::slug($request["name"]);  // Str ထဲရှီ slug ဟူသော metho dထဲသို့ firstname အား ပေးမည် ၄င်းသည် route name ဖြစ်သွ းမည်ဖြစ်သည် 
        $type -> status_id = $request["status_id"];  
        $type -> user_id = $user_id;  

        $type -> save();

        return redirect(route("types.index"));
    }


    public function show(string $id)
    {
        $type =Ttype::findOrFail($id);

        return view("types.show",["type"=>$type]);
    }


    public function edit(string $id)
    {
        $type = Type::findOrFail($id);
        $statuses = Status::whereIn("id",[3,4])->get();
        return view("types.edit")->with("type",$type)->with("statuses",$statuses);
    }


    public function update(Request $request, string $id)
    {
        $this -> validate($request,[
            // method 1 
            // "name" => "required|max:50|unique:types,name,". $id,

            // method 2 -> array ဖြင့် လဲ ပေးနိုင်သည် pipe နေရာတွင် comer  ထည့်ပီး single code double code ထည့်ပေးနိုင်သည် // မှားနိုင်သည် 
            "name" => ["required","max:50","unique:types,name,". $id],
            "status_id" => ["required","in:3,4"]  // 3 နှင့် 4 ဘဲ လက်ခံမည် // fontend နှင့် ချိန်ပြီးထည့်ရမည် 

        ]);

 

        $user = Auth::user(); // log in ဝင်ထား‌သောကောင်၏ data ရယူရန်\

        $user_id = $user->id;

        $type = Type::findOrFail($id);
        $type -> name = $request["name"];
        $type -> slug = Str::slug($request["name"]); 
        $type -> status_id = $request["status_id"];  
        $type -> user_id = $user_id;  



        $type -> save();

        return redirect(route("types.index"));
    }


    public function destroy(string $id)
    {
        $type = Type::findOrFail($id);

        $type -> delete();

        return redirect()->back();
    }
}
