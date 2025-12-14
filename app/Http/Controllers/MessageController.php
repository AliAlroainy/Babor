<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Events\PrivateMessageSent;
use App\Events\MessageSent;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function privateMessages(User $user)
    {
        $privateCommunication= Message::with('user')
        ->where(['user_id'=> auth()->id(), 'receiver_id'=> $user->id])
        ->orWhere(function($query) use($user){
            $query->where(['user_id' => $user->id, 'receiver_id' => auth()->id()]);
        })
        ->get();

        return $privateCommunication;
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => ['required', 'exists:users,id'],
            'message'     => ['nullable', 'string', 'required_without:file'],
            'file'        => ['nullable', 'file'],
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->store('chat');
            $message  = Message::create([
                'user_id'     => $request->user()->id,
                'image'       => $filename,
                'receiver_id' => $validated['receiver_id'],
            ]);
        } else {
            $message = auth()->user()->messages()->create([
                'message'     => $validated['message'],
                'receiver_id' => $validated['receiver_id'],
            ]);
        }

        broadcast(new MessageSent(auth()->user(), $message->load('user')))->toOthers();

        return response(['status' => 'Message sent successfully', 'message' => $message]);
    }

    public function sendPrivateMessage(Request $request,User $user)
    {
        if(request()->has('file')){
            $filename = request('file')->store('chat');
            $message=Message::create([
                'user_id' => request()->user()->id,
                'image' => $filename,
                'receiver_id' => $user->id
            ]);
        }else{
            $input=$request->all();
            $input['receiver_id']=$user->id;
            $message=auth()->user()->messages()->create($input);
        }

        broadcast(new PrivateMessageSent($message->load('user')))->toOthers();

        return response(['status'=>'Message private sent successfully','message'=>$message]);

    }

}
