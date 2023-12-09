<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Validator;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return view("students.index",compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        // create validatin လုပ်ခြင်းဟုခေါ်သည် 
        $this -> validate($request,[
            "regnumber" => "required|unique:students,regnumber", // students table ထဲ၇ှီ regnumber ည်  unique ဖြစ်ရမည် 
            "firstname" => "required",
            "lastname" => "required", 
            //"remark" => "max:200" // စာလံးု size ၁၀၀၀ရှိ ရမည် 
        ]);


        $user = Auth::user(); // log in ဝင်ထား‌သောကောင်၏ data ရယူရန်
        $user_id = $user->id;
        $student = new Student();

        
        $student -> regnumber = $request["regnumber"];
        $student -> firstname = $request["firstname"];
        $student -> lastname = $request["lastname"];
        $student -> slug = Str::slug($request["firstname"]);  // Str ထဲရှီ slug ဟူသော metho dထဲသို့ firstname အား ပေးမည် ၄င်းသည် route name ဖြစ်သွ းမည်ဖြစ်သည် 
        $student -> remark = $request["remark"];
        $student -> user_id = $user_id;  // user ၏ data ထဲမှ id အား ခေါ်ရမည် 

        // echo $request["regnumber"] . $request["firstname"] .$request["lastname"]  .Str::slug($request["firstname"]).$request["remark"].$user_id;

        $student -> save();

        return redirect(route("students.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);

        return view("students.show",["student" => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view("students.edit")->with("student",$student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this -> validate($request,[
            "regnumber" => "required|unique:students,regnumber,".$id,  // update တွင် unique ဖြစ်ရမည်ဆိုသောကြောင့် အလုပ်မလုပ်သော်ည်း $id တွင်တော့ unique မဖြစ်လဲရသည် မူလ id ဝင်လာပါက update ပြုလုပ်ခွင့်ပြုမည်ဖြစသ်ည် ဟုဆိုလိုသည် (table column နောက်တွက် (comer ထားကိုထားပေးရမည် ))
            "firstname" => "required",
            "lastname" => "required", 
            "remark" => "max:1000" // စာလံးု size ၁၀၀၀ရှိ ရမည် 
        ]);


        $user = Auth::user(); // log in ဝင်ထား‌သောကောင်၏ data ရယူရန်
        $user_id = $user["id"]; // array သုံးလဲရသည်
        $student = Student::findOrFail($id);

        
        $student -> regnumber = $request["regnumber"];
        $student -> firstname = $request["firstname"];
        $student -> lastname = $request["lastname"];
        $student -> slug = Str::slug($request["firstname"]);  // Str ထဲရှီ slug ဟူသော metho dထဲသို့ firstname အား ပေးမည် ၄င်းသည် route name ဖြစ်သွ းမည်ဖြစ်သည် 
        $student -> remark = $request["remark"];
        $student -> user_id = $user_id;  // user ၏ data ထဲမှ id အား ခေါ်ရမည် 

        // echo $request["regnumber"] . $request["firstname"] .$request["lastname"]  .Str::slug($request["firstname"]).$request["remark"].$user_id;

        $student -> save();

        return redirect(route("students.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        $student -> delete();

        return redirect()->back();
    }
}
