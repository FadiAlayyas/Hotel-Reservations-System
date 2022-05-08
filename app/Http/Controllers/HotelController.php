<?php

namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Hotel;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Room_type;
use App\Models\Post;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;

class HotelController extends Controller
{
    public function welcome()
    {
        $hotelInfo = Hotel::all();
        $contacts = Contact::all();
        $rooms = Room_type::all();
        $services = Service::all();
        $memo = Post::all();
        return view('welcome', compact('hotelInfo', 'contacts', 'rooms', 'services', 'memo'));
    }

    ///////// this for footer contact us  /////////
    public function contactUs(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        if (Auth::user() == null) {
            return redirect()->back()
                ->with('error', 'You are not logged in. You must log in first.');
        } else {
            $conversation = Conversation::where('user_id', Auth::id())->first();
            if ($conversation == null) {
                $conversation = Conversation::create([
                    'user_id' => Auth::id(),
                ]);
                Message::create([
                    'owner_id' => Auth::id(),
                    'owner_type' => 'user',
                    'conversation_id' => $conversation->id,
                    'content' => $request->content
                ]);
            }else{
                Message::create([
                    'owner_id' => Auth::id(),
                    'owner_type' => 'user',
                    'conversation_id' => $conversation->id,
                    'content' => $request->content
                ]);
            }
        }
        return redirect()->route('user.conversation.show');
    }
}
