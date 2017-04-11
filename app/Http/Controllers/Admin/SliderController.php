<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
class SliderController extends Controller
{
	public function add(){
		if(request('slides') != null){
			foreach(request('slides') as $slide){
				$filename = $slide->getFilename().'.'.$slide->getClientOriginalExtension();
				$slide->move(public_path('images/slider/slides'), $filename);
			}
			session()->flash('message', 'Adding slides finished successfully.');
			return back();
		}
		session()->flash('message', 'Select/add some images.');
		return back();
	}
	
	public function delete(){
		if(request('selected') != null){
			foreach(request('selected') as $slide){
				File::delete(public_path('images/slider/slides').'/'.$slide);
			}
			session()->flash('message', 'Deleting slides was successfull.');
			return back();
		}
		session()->flash('message', 'Select at least one image to remove.');
		return back();
	}
}
