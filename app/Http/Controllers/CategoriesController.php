<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'category_name' => 'required|max:30'
        ]);

        Category::create([
            'category_name' => $request->input('category_name')
        ]);

        return redirect()->back()->with('flash', 'New category added successfully');
    }
}
