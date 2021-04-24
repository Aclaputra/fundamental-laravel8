<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // Category adalah Model dibuat untuk akses salah satu table dalam database MySQL

    // AllCategories
    public function AllCat(){
        // $categories = DB::table('categories')
        //     ->join('users', 'categories.user_id','users.id')
        //     ->select('categories.*','users.name')
        //     ->latest()->paginate(5);

        $categories = Category::latest()->paginate(5);

        // with Query Builder
        // $categories = DB::table('categories')->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    // Add Categories
    public function AddCat(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',

        ],
        [
            'category_name.required' => 'Please Input Category name Anjay',
            'category_name.max' => 'Category kurang dari 255 chars',

        ]);

        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now(),
        // ]);

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();

        // with Query Builder
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;

        // DB::table('categories')->insert($data);

        return Redirect()->back()->with('success','Category Inserted Successfully');
    }

    // Edit Category
    public function Edit($id) {
        $categories = Category::find($id);

        return view('admin.category.edit',compact('categories'));
    }


    public function Update(Request $request, $id){
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        return Redirect()->route('all.category')->with('success','Category Updated Successfully');

    }
}   
