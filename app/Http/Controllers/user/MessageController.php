<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\controller;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
            $request->validate([
                'content'=>'required'
                ]);

                Message::create([
                    'owner_id'=>Auth::id(),
                    'owner_type'=>'user',
                    'conversation_id'=>$request->conversation_id,
                    'content'=>$request->content
                   ]);
               return redirect()->route('user.conversation.show');

    }
    public function destroy($id)
    {
        $message=Message::where('id',$id)->where('owner_id',Auth::id())->first();
        $message->delete();
        return redirect()->back();
    }

}
