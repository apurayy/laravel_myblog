<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class Categorycontroller extends Controller
{
    public function category()
    {
        $categoris = Category::all();
        return view('admin.category.category',[
            'categoris'=>$categoris,
        ]);
    }

    function category_store(Request $request){

        $request->validate([
            'cat_name'=>'required|unique:categories',
            'cat_photo'=>'required',
        ]);

        $category_id = Category::insertGetId([
            'cat_name'=>$request->cat_name,
            'created_at'=>Carbon::now(),
        ]);

        $upload_photo = $request->cat_photo;
        $extension = $upload_photo->getClientOriginalExtension();
        $file_name = $request->cat_name.'-'.rand(10000, 999999).'.'.$extension;
        Image::make($upload_photo)->save(public_path('upload/category/'.$file_name));

        Category::find($category_id)->update([
            'cat_photo'=>$file_name,
        ]);

        return back();

    }
}
