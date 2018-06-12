<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Systems extends Model
{
    protected $table = 'systems'; //Ten bang
	protected $guarded = []; //Cac tham so
	public $primaryKey = 'id';
	public $timestamps = true;

	public function editSystems($request){
		Systems::truncate();
		$system = new Systems;
		$system->title=$request->title;
		$system->keywords=$request->keywords;
		$system->description = $request->description;
		$system->site_name = $request->site_name;
		$system->og_image = $request->og_image;
		$system->logo_website = $request->logo_website;
		$system->logo_title = $request->logo_title;
		$system->phone_number= $request->phone_number;
		$system->address = $request->address;
		$system->email = $request->email;
		$system->facebook = $request->facebook;
		$system->youtube = $request->youtube;
		$system->instagram = $request->instagram;
		$system->linkedin = $request->linkedin;
		$system->twitter = $request->twitter;
		$system->script = $request->script;
		$system->slogan = $request->slogan;
		$system->time = $request->time;
		$system->save();
	}
}
