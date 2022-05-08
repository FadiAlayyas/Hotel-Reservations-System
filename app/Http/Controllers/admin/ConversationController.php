<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\controller;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;

class ConversationController extends Controller
{
    public function inbox()
    {
        $conversations = Conversation::all();
        $users=User::all();
        return view('admin.conversation.chats', compact('conversations','users'));
    }

    public function show($id)
    {
        $conversations = Conversation::all();
        $conversation = Conversation::where('id',$id)->first();
        $users=User::all();
        $messages = Message::all()->where('conversation_id', $id);

        $userMessage=Message::all()->where('conversation_id', $id)
        ->where('owner_type', 'user')->where('readCheck',0);
        foreach($userMessage as $item){
            $item->readCheck=1;
            $item->save();
        }
        return view('admin.conversation.show',
        compact('id', 'messages', 'conversations','users','conversation'));
    }

    public function destroy($id)
    {
        $conversation = Conversation::find($id);
        $conversation->delete();
        return redirect()->route('admin.conversation.inbox');
    }
}
