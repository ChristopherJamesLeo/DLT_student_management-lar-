<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        // $statuses = Status::all();
        $statuses = Status::whereIn("id",[3,4])->get();

        return view("categories.index",compact("categories"))->with("statuses",$statuses);
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
            "name" => "required|unique:categories,name"
        ]);

        $user = Auth::user();
        $user_id = $user -> id;

        $category = new Category();

        $category -> name = $request["name"];
        $category -> slug = Str::slug($request["name"]);
        $category -> user_id = $user_id;
        $category -> status_id = $request["status_id"];

        $category -> save();

        return redirect(route("categories.index"));

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this -> validate($request,[
            "name" => "required|unique:categories,name,".$id,
        ]);

        $user = Auth::user();
        $user_id = $user -> id;

        $category = Category::findOrFail($id);

        $category -> name = $request["name"];
        $category -> slug = Str::slug($request["name"]);
        $category -> user_id = $user_id;
        $category -> status_id = $request["status_id"];

        $category -> save();

        return redirect(route("categories.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category -> delete();

        return redirect(route("categories.index"));
    }


    // ajax 
    public function categoriesstatus(Request $request){
        $category = Category::findOrFail($request["id"]);
        $category->status_id = $request["status_id"];
        $category->save();

        return response()->json(["success"=>"Status Update Successful"]);
    }
}
