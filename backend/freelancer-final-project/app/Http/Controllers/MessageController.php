<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Resources\MessagesResources;
use App\Http\Resources\UsersResources;
use App\Models\Message;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function getMessages()
    {

        return view('frontsite.dashboard-user.messages');
    }

    public function getReviews()
    {

        return view('frontsite.dashboard-user.reviews');
    }

    public function getUsers()
    {
        $id = Auth::id();
//        dd($id);
        $users = Recipient::whereHas('message', function ($query) use ($id) {
            $query->where('user_id', '=', $id);
        })->orderBy('user_id', 'DESC')->get()->unique('user_id')->values();

//        dd($users);
        return UsersResources::collection($users);
    }

    public function getMessagesContent($recipient_id)
    {
        $messages = Message::where('user_id', Auth::id())
            ->whereHas('recipients', function ($query) use ($recipient_id) {
                $query->where('user_id', $recipient_id);
            })->Orwhere('user_id', $recipient_id)
            ->whereHas('recipients', function ($query) use ($recipient_id) {
                $query->where('user_id', Auth::id());
            })->get();
//        dd($messages);
        return MessagesResources::collection($messages);
    }

    public function storeMessages(Request $request)
    {
        $request->validate([
            'body' => ['required', 'string'],
            'recipient_id' => ['required', 'int', 'exists:users,id']
        ]);
//        dd($request->all());

        $message = Message::create([
            'user_id' => Auth::id(),
//            'recipient_id' => $request->post('recipient_id'),
            'body' => $request->post('body'),
        ]);

        $isSaved = Recipient::create([
            'user_id' => $request->post('recipient_id'),
            'message_id' => $message->id
        ]);

        event(new MessageSent($message));

        return response()->json(
            ['message' => $isSaved ? 'Success Created ' : 'Create failed!'],
            $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
//        dd($request->all());
    }
}
