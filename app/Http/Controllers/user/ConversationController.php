<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\controller;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Hotel;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request)
    {
        $conversation = Conversation::where('user_id', Auth::id())->first();

        if ($conversation == null) {

            $conversation = Conversation::create([
                'user_id' => Auth::id(),
            ]);

            return redirect()->route('user.conversation.show');
        } else {

            return redirect()->route('user.conversation.show');
        }
    }

    public function show()
    {

        $conversation = Conversation::where('user_id', Auth::id())->first();
        if ($conversation == null) {
            return redirect()->route('user.conversation.store');
        } else {
            $conversation_id = $conversation->id;
            $messages = Message::all()->where('conversation_id', $conversation_id);
            $hotelInfo = Hotel::all();
            $contacts = Contact::all();
            $adminMessage=Message::all()->where('conversation_id', $conversation_id)
            ->where('owner_type', 'admin')->where('readCheck',0);
            foreach($adminMessage as $item){
                $item->readCheck=1;
                $item->save();
            }
            return view('user.conversation.show', compact('conversation_id', 'messages','hotelInfo','contacts'));
        }
    }
}
