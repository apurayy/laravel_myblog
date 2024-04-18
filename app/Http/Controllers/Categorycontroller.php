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

    function category_delete($category_id){
        $category_photo = Category::where('id', $category_id)->first()->cat_photo;
        $delete_from = public_path('upload/category/'.$category_photo);
        unlink($delete_from);

        Category::find($category_id)->delete();
        return back()->withSuccess('Category Deleted Successfuly!');
    }

    function category_edit($category_id){
        $category = Category::find($category_id);
        return view('admin.category.edit',[
            'category'=>$category,
        ]);
    }

    function category_update(Request $request){
        if($request->cat_photo==''){
            Category::find($request->category_id)->update([
                'cat_name'=>$request->cat_name,
            ]);
            return back();
        }
        else{
            $category_photo = Category::where('id', $request->category_id)->first()->cat_photo;
            $delete_from = public_path('upload/category/'.$category_photo);
            unlink($delete_from);

            $upload_photo = $request->cat_photo;
            $extension = $upload_photo->getClientOriginalExtension();
            $file_name = $request->cat_name.'-'.rand(10000, 999999).'.'.$extension;
            Image::make($upload_photo)->save(public_path('upload/category/'.$file_name));

            Category::find($request->category_id)->update([
                'cat_name'=>$request->cat_name,
                'cat_photo'=>$file_name,
            ]);
            return back();
        }
    }


}
