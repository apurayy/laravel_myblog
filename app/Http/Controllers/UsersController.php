<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
