<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{
    //
    function categories(){
        $categories = Category::withCount('images')->get();

        return response(compact('categories'));
    }

    function categoriesShow($id){
        $category = Category::with('images')->find($id);

        return response(compact('category'));
    }
}
