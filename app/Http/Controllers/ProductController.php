<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($name){
       
        $category = Category::where('name', $name)->first();
        $products = $category->products;
        return view('product.index')->with(['products'=> $products, 'category'=> $category->name]);
    }
    
    public function show($name){
        $product = Product::where('name', $name)->firstOrFail();
        return view('product.show', ['product'=> $product]);
    }
}