<?php

namespace App\Http\Controllers;
use App\category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    function addCategoryView(){
        $categories = category::all();
    return view('product/category', compact('categories'));
    }

    function addCategoryinsert(Request $request){
        
        $request->validate([
            'category_name' => 'required',
        ]);

        Category::insert([
                'category_name' => $request->category_name,
                'created_at' => Carbon::now(),
            ]);
        return back()->with('status','Category added Successfully');
    }
}
