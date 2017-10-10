<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use App\Events\ChatEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function chat()
    {
    	return view('chat');
    }

    public function send(request $request)
    {
        return $request->all();
    	$user = User::find(Auth::id());
    	event(new ChatEvenet($request->message,$user));
    }

   /* public function send()
    {   
        $message = 'hello';
        $user = User::find(Auth::id());
        event(new ChatEvent($message,$user));
    }*/
}
