<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class UsersController extends Controller
{
    function users(){
        $users = User::where('id','!=', Auth::id())->get();
        $total_user = User::count();
        return view('admin.users.user', compact('users', 'total_user'));
    }

    function user_delete($user_id){
        User::find($user_id)->delete();
        return back();
    }

    function edit_profile(){
        return view('admin.users.profile');
    }

    function profile_update(Request $request){
        if($request->password == ''){
            User::find(Auth::id())->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
        }else{
            if(Hash::check($request->oldpassword, Auth::user()->password)){
                User::find(Auth::id())->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>bcrypt($request->password),

                ]);
                return back()->with('success', 'User Update!');
            }else{
                return back()->with('error', 'Old Password is worng.');
            }
        }
    }

function photo_update(Request $request){
    $upload_photo = $request->photo;
    $extension = $upload_photo->getClientOriginalExtension();
    $file_name = Auth::id().'.'.$extension;
    Image::make($upload_photo)->save(public_path('upload/user/'.$file_name));

    User::find(Auth::id())->update([
        'image'=>$file_name,
    ]);
}

}
