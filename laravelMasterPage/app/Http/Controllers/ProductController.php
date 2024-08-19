<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function fetchProductData()
    {
        $products = Product::all();
        return view('home',["products"=>$products]);
    }
}
