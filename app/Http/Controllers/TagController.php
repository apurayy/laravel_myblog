<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function tags(){
        $tags = Tag::all();
        return view('admin.tag.tag',[
            'tags'=>$tags,
        ]);
    }

    function tag_store(Request $request){
        $request->validate([
            'tag_name'=>'required',
            'tag_name'=>'unique:tags',
        ]);

        Tag::insert([
            'tag_name'=>$request->tag_name,
        ]);
        return back();
    }

    //tag_delete=============
    function tag_delete($tag_id){
        Tag::find($tag_id)->delete();
        return back();
    }
}
