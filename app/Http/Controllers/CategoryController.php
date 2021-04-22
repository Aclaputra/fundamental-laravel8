<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCat(){
        return view('admin.category.index');
    }

    public function AddCat(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',

        ],
        [
            'category_name.required' => 'Please Input Category name Anjay',
            'category_name.max' => 'Category kurang dari 255 chars',

        ]);
    }
}   
