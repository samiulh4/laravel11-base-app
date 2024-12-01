<?php

namespace App\Modules\Notification\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\User\Models\AppUser;
use App\Modules\Notification\Models\Message;
use App\Modules\Notification\Models\Chat;
use App\Events\EventPublicChat;


class NotificationController
{

    public function adminMessageIndex()
    {
        return view("Notification::admin.messages.index");
    }

    public function adminMessageCreate()
    {
        $users = ['' => 'Please Select'] + AppUser::where('is_active', 1)
            ->where('id', '<>', Auth::user()->id)
            ->get()
            ->pluck('email', 'id')
            ->toArray();
        return view("Notification::admin.messages.create", compact('users'));
    }

    public function adminChatIndex()
    {
        $chats = Chat::leftJoin('users', 'chats.created_by', '=', 'users.id')
            ->select('chats.*', 'users.email')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
        return view("Notification::admin.chat.index", compact('chats'));
    }

    public function adminMessageStore(Request $request)
    {
        $message = new Message();
        $message->sender_id = Auth::user()->id;
        $message->updated_by = Auth::user()->id;
        $message->is_active = 1;
        $message->receiver_id = $request->user_id;
        $message->description = $request->message;
        session()->flash('success', 'Message Send Successfully. [AUTH-1001]');
        return redirect()->back();
    }

    public function adminChatStore(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);
        $chat = new Chat();
        $chat->description = $request->description;
        $chat->created_by = Auth::user()->id;
        $chat->updated_by = Auth::user()->id;
        $chat->is_active = 1;
        $chat->save();

        event(new EventPublicChat($chat, Auth::user()->email));

        return response()->json(['success' => true, 'message' => 'Data Save Successpully', 'data' => $chat]);
    }

    public function testSocket()
    {
        // $host = '127.0.0.1';
        // $port = 9999;
    
        // // Create a new socket
        // $socket = socket_create(AF_INET, SOCK_STREAM, 0);
        // if ($socket === false) {
        //     $errorCode = socket_last_error();
        //     $errorMessage = socket_strerror($errorCode);
        //     die("Error creating socket: $errorMessage\n");
        // }
    
        // // Connect to the server
        // if (!@socket_connect($socket, $host, $port)) {
        //     $errorCode = socket_last_error($socket);
        //     $errorMessage = socket_strerror($errorCode);
        //     die("Error connecting to server: $errorMessage\n");
        // }
        // $data = [
        //     'message' => 'I love my country i love my land green bangladesh my home land',
        //     'email' => 'samiulh4@gmail.com'
        // ];

        // // Write data to the server
        // if (!@socket_write($socket, json_encode($data))) {
        //     $errorCode = socket_last_error($socket);
        //     $errorMessage = socket_strerror($errorCode);
        //     die("Error writing to server: $errorMessage\n");
        // }
    
        // // Read data from the server
        // $data = @socket_read($socket, 1024);
        // if ($data === false) {
        //     $errorCode = socket_last_error($socket);
        //     $errorMessage = socket_strerror($errorCode);
        //     die("Error reading from server: $errorMessage\n");
        // }
    
        // echo "Received from server: $data\n";
    
        // // Close the connection
        // socket_close($socket);

        return view("Notification::admin.chat.socket");
    }
    
}
