<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CategoryController extends Controller
{
    public function index(){
        
        $categories =  Category::all();

        return view('dashboard', ['categories' => $categories]);
    }
}
