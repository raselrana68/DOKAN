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
}
