<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class GalleryController extends Controller
{
	public static function get(){
		return File::allFiles('images/gallery/restaurant');
	}
	
    public function add(){
    	$files = request('images');
    	foreach($files as $file){
    		$file->move(public_path('images/gallery/restaurant'));
		}
		return redirect('admin/gallery');
	}
	
	public function delete(){
 		$toRemove = request('toRemove');
 		$files = static::get();
 		foreach($files as $file){
 			if(in_array($file->getFilename(), $toRemove)){
 				File::delete($file->getPathname());
			}
		}
		return back();
	}
}
