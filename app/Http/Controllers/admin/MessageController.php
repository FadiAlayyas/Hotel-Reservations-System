<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\auth;

class MessageController extends Controller
{
    //    create new message in chat not exist

    public function storeNewChat(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $conversation = null;
         //if admin create new chat for one user
        if ($request->reciver_id != 'all') {
            $conversation = Conversation::where('user_id', $request->reciver_id)->first();

            if ($conversation == null) {
                $conversation = Conversation::create([
                    'user_id' => $request->reciver_id,
                ]);
                Message::create([
                    'owner_id' => Auth::guard('admin')->user()->id,
                    'owner_type' => 'admin',
                    'conversation_id' => $conversation->id,
                    'content' => $request->content
                ]);
            } else {
                Message::create([
                    'owner_id' => Auth::guard('admin')->user()->id,
                    'owner_type' => 'admin',
                    'conversation_id' => $conversation->id,
                    'content' => $request->content
                ]);
            }
            //if admin create new message for all user
        } elseif ($request->reciver_id == 'all') {
            $users = User::all();
            $usersConversation = array();
            foreach ($users as  $item) {
                $conversation = Conversation::where('user_id', '=', $item->id)->first();
                if ($conversation === null) {
                    array_push($usersConversation, $item->id);
                 }
            }
            foreach ($usersConversation as  $item) {
                $conversation = Conversation::create([
                    'user_id' => $item
                ]);
            }
            $conversation = Conversation::all();
            foreach ($conversation as  $item) {
                Message::create([
                    'owner_id' => Auth::guard('admin')->user()->id,
                    'owner_type' => 'admin',
                    'conversation_id' => $item->id,
                    'content' => $request->content
                ]);
            }
        }

        return redirect()->route('admin.conversation.inbox');
    }
//    create new message in chat already exist
    public function store(Request $request)
    {

        $request->validate([
            'content' => 'required'
        ]);
         $id=$request->conversation_id;
        Message::create([
            'owner_id' => Auth::guard('admin')->user()->id,
            'owner_type' => 'admin',
            'conversation_id' => $request->conversation_id,
            'content' => $request->content
        ]);
        return redirect()->route('admin.conversation.show', compact('id'));
    }

    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect()->back();
    }

}
