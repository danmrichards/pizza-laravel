<?php

namespace App\Http\Controllers;

use App\Mail\MessageReply;
use App\Message;
use Mail;

class MessagesController extends Controller
{
	public function send(){
		$this->validate(request(), [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required',
			'message' => 'required',
		]
		);
		Message::create([
			'name' => request('first_name'),
			'surname' => request('last_name'),
			'email' => request('email'),
			'phone' => request('phone'),
			'message' => request('message'),
		]);
		return redirect('/');
	}
	
	public function read(Message $message){
		if($message->read == 0){
			$message->read = 1;
			$message->save();
		}
		return view('admin.messages.read')->with(compact('message'));
	}
	
	public function reply(){
		Mail::to(request('mail'))->send(new MessageReply(request('reply')));
		return redirect('/admin/messages');
	}
}
