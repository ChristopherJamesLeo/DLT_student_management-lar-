<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Day;
use App\Models\Status;

class DaysController extends Controller
{
    public function index()
    {
        $days = Day::all();

        // $statuses = Status::all();
        $statuses = Status::whereIn("id",[3,4])->get();

        return view("days.index",compact("days"))->with("statuses",$statuses);
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
            "name" => "required|unique:days,name"
        ]);

        $user = Auth::user();
        $user_id = $user -> id;

        $day = new Day();

        $day -> name = $request["name"];
        $day -> slug = Str::slug($request["name"]);
        $day -> user_id = $user_id;
        $day -> status_id = $request["status_id"];

        $day -> save();

        return redirect(route("days.index"));

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this -> validate($request,[
            "name" => "required|unique:days,name,".$id,
            "status_id" => "required|in:3,4"
        ]);

        $user = Auth::user();
        $user_id = $user -> id;

        $day = Day::findOrFail($id);

        $day -> name = $request["name"];
        $day -> slug = Str::slug($request["name"]);
        $day -> user_id = $user_id;
        $day -> status_id = $request["status_id"];

        $day -> save();

        return redirect(route("days.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $day = Day::findOrFail($id);

        $day -> delete();

        return redirect(route("days.index"));
    }
}
