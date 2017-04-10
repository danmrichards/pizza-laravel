<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
class OffersController extends Controller
{
    public function add(){
    	$offers = Offer::all();
    	return view('admin.offers.add')->with(compact('offers'));
	}
	
	public function create(){
 
//    	$this->validate(request(), [
//    		'offerName' => 'required',
//			'offerDesc' => 'required'
//		]);
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
		
		return redirect('/admin/offers');
    }
	
	public function edit(Offer $offer){
 		return view('admin.offers.edit')->with(compact('offer'));
	}
	
	public function delete(Offer $offer){
	
	}
}
