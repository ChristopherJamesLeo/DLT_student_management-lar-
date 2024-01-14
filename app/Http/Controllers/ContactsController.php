<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Status;
use App\Models\Relative
;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ContactsController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["contacts"] = Contact::all();

        // $statuses = Status::all();
        $relatives = Relative::all()->pluck("name","id")->prepend("Choose Relative"); // pluck ထဲထည့်ပေးပါက A to Z စဥ်စားပြီးသားဖြစ်သည် 

        return view("contacts.index",$data,compact("relatives"));

    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            "firstname" => "required|min:3|max:50",
            "lastname" => "max:50",
        ]);

        $user = Auth::user();
        $user_id = $user -> id;

        $contact = new Contact();

        $contact -> firstname = $request["firstname"];
        $contact -> lastname = $request["lastname"];
        $contact -> birthday = $request["birthday"];
        $contact -> relative_id = $request["relative_id"];
        $contact -> user_id = $user_id;

        $contact -> save();
        session()->flash("success","create successful");
        return redirect(route("contacts.index"));

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this -> validate($request,[
            "name" => "required|unique:contacts,name,".$id,
        ]);

        $user = Auth::user();
        $user_id = $user -> id;

        $contact = Contact::findOrFail($id);

        $contact -> name = $request["name"];
        $contact -> slug = Str::slug($request["name"]);
        $contact -> user_id = $user_id;
        $contact -> status_id = $request["status_id"];

        $contact -> save();

        return redirect(route("contacts.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);

        $contact -> delete();

        session()->flash("info","Delete Successfully");

        return redirect(route("contacts.index"));
        
    }
}
