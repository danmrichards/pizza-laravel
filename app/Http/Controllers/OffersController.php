<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use File;

class OffersController extends Controller
{
    public function add(){
    	$offers = Offer::all();
    	return view('admin.offers.add')->with(compact('offers'));
	}
	
	public function create(){
 
    	$this->validate(request(), [
    		'offer_name' => 'required',
			'offer_desc' => 'required'
		]);
    	
    	$image = request('image');
		$offer = Offer::create(request([
			'offer_name',
			'offer_desc'
		]));
		if($image!=null){
			$filename = $image->getFilename().'.'.$image->getClientOriginalExtension();
			$offer->image_name = $filename;
			$image->move(public_path('/images/offers/'), $filename);
		}
		$offer->save();
		session()->flash('message', 'Offer successfully created.');
		return redirect('/admin/offers');
    }
	
	public function edit(Offer $offer){
 		return view('admin.offers.edit')->with(compact('offer'));
	}
	
	public function update(Offer $offer){
		$this->validate(request(), [
			'offer_name' => 'required',
			'offer_desc' => 'required'
		]);
		
		if(request('image') != null)
		{
			$image = request('image');
			$filename = $image->getFilename().'.'.$image->getClientOriginalExtension();
			$offer->image_name = $filename;
			$image->move(public_path('/images/offers/'), $filename);
		}
		$offer->offer_name = request('offer_name');
		$offer->offer_desc = request('offer_desc');
		$offer->save();
		session()->flash('message', 'Offer successfully updated.');
		return redirect('/admin/offers');
	}
	
	public function deleteImage(Offer $offer){
		if(request('deleteImage') != null){
			$filename = $offer->image_name;
			$offer->image_name = null;
			$offer->save();
			File::delete('images/offers/'.$filename);
			session()->flash('message', 'Image successfully deleted.');
			return back();
		}
		session()->flash('message', 'Select an image.');
		return back();
		
	}
	
	public function delete(Offer $offer){
		$offer->delete();
		return redirect('/admin/offers');
	}
}
