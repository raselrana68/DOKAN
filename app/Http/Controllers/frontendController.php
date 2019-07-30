<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    function index(){
        $products = Product::all();
        return view('frontend/index', compact('products'));
    }    

    function productDetails(Request $request){
        $id = $request->product_id;

        $product_info = Product::findOrFail($id);
        $related_products = Product::where('id','!=' ,$id)->get();

        //echo $related_products;
        //echo $product_info;
        return view('frontend/product_details', compact('product_info','related_products'));
    }
}
