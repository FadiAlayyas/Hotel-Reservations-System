<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\controller;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;

class ReplyController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'content'=>'required'
            ]);

            Reply::create([
                'owner_id'=>Auth::guard('admin')->user()->id,
                'owner_type'=>'admin',
                'message_id'=>$request->message_id,
                'parent_id'=>$request->parent_id,
                'content'=>$request->content
               ]);
           return back();
    }


    public function destroy($id)
    {
        $reply=Reply::find($id);
        $reply->delete();
        return redirect()->route('admin.message.index');
    }
}
