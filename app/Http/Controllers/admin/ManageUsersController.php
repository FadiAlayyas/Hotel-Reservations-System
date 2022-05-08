<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    public function index()
    {
        //$users = User::OrderBy('created_at', 'desc')->get();
        $users=User::Paginate(10);

        return view('admin.manageUsers')->with('users', $users);
    }

    public function search(Request $request)
    {
        $request->validate([

            'q' => 'required'
        ]);
        $q = $request->q;

        $users = User::where('name', 'like', '%' . $q . '%')->orWhere('email', 'like', '%' . $q . '%')->get();
        if ($users->count()) {
            return view('admin.manageUsers')->with('users', $users);
        } else {
            return view('admin.manageUsers', compact('users'))->with(['status' => 'Search faild please try again']);
        }
    }

    public function active_deactive_user($id)
    {
        $user = User::find($id);
        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        $user->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }


/*
    public function destroy(User $user)
    {
        $posts = Post::where('user_id', $user->id)->pluck('id');
        Comment::whereIn('post_id', $posts)->delete();
        Post::where('user_id', $user->id)->delete();
        $user->delete();
    }
 */


}
