<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slides_Header extends Model
{
    protected $table = 'slides_header'; //Ten bang
	protected $guarded = []; //Cac tham so
	public $primaryKey = 'id';
	public $timestamps = true;

	public function addSlide($request){
		$slide = new Slides_Header;
		$file_name = $request->file('image')->getClientOriginalName();
		$request->file('image')->move('uploads/images/slides/',$file_name);
		$slide->blog_url = $request->blog_url;
		$slide->title = $request->title;
		$slide->image = $file_name;
		$slide->save();
	}
	public function editSlide($request,$id){
		$slide = Slides_Header::where('id',$id)->get()->first();
		if($request->hasFile('image')){
			$file_name = $request->file('image')->getClientOriginalName();
			$request->file('image')->move('uploads/images/slides/',$file_name);
			$slide->blog_url = $request->blog_url;
			$slide->title = $request->title;
			$slide->image = $file_name;
			$slide->save();
		}
		else{
			$slide->blog_url = $request->blog_url;
			$slide->title = $request->title;
			$slide->save();
		}
	}
}
