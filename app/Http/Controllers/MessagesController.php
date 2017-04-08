<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
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
}
