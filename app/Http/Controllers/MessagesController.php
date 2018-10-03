<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller
{
    public function show(Message $message){
    
        return view('messages.show', [
            'message' => $message,
        ]);
    }

    public function create(CreateMessageRequest $request){
        $user = $request->user();
        $message = Message::create([
            'user_id' => $user->id,
            'content' => $request->input('message'),
            'image' => 'https://placeimg.com/550/338/any'
        ]);

        return redirect('/messages/'. $message->id);
    }
}
