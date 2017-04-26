<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
class AboutController extends Controller
{
	public function save(About $about){
		$this->validate(request(), [
			'about' => 'required:min:10'
		]);
		$about->about = \request('about');
		$about->save();
		
		session()->flash('message', 'Saved.');
		
		return back();
	}
}
