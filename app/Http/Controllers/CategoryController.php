<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    function index()
    {

        $cats = ["test"=>"<h1>Foods</h1>", "Drinks", "Electronics"];
        return view("cats", ["categories" =>  $cats ,"name"=> "Doaa"]);

        // return view("cats")
        //     ->with("name", "Doaa")
        //     ->with("categories", $cats);

        // return view("cats")
        //     ->with("name", "Doaa")
        //     ->with(compact("cats"));

        // $name= "ahmed";
        // dd(compact("name"));

    }
    function store(Request $request){
        // dd($request->all());

        // echo $request->input("name");
        // validate

        $request->validate([
            "name" =>"required|min:3|max:10",
            "age" =>"nullable|numeric|min:16|max:60",
            "hdate" =>"required|date|before_or_equal:now",
            "comment" =>"required",

        ]);

        // echo $request->name;
        // echo $request->comment;
        // $sss ="doaa";
        // unset($sss);
        // //$$sss;
        // dd($sss);

        DB::insert('insert into tests (name, age ,h_date, comment) values (?,?,?,?)',
         [$request->name, $request->age ,$request->hdate , $request->comment]);

         return redirect()->to("/cats");
        //  return redirect()->route("cats.index");
    }
    function show(){
        // dd(Test::all());
        $t = new Test();
        $t->name = "ahmed";
        $t->age = 18;
        $t->h_date = date("Y-m-d");
        $t->save();
    }

}
