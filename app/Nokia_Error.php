<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nokia_Error extends Model
{
    protected $table = 'nokia_error'; //Ten bang
	protected $guarded = []; //Cac tham so
	public $primaryKey = 'id';
	public $timestamps = true;

	public function addNokiaError($request){
		$error = new Nokia_Error;
		$error->error = $request->error;
		$error->repair_description = $request->repair_description;
		$error->price = $request->price;
		$error->warranty = $request->warranty;
		$error->blog_url = $request->blog_url;
		$error->save();
	}
	public function editNokiaError($request, $id){
		$error = Nokia_Error::where('id',$id)->get()->first();
		$error->error = $request->error;
		$error->repair_description = $request->repair_description;
		$error->price = $request->price;
		$error->warranty = $request->warranty;
		$error->blog_url = $request->blog_url;
		$error->save();
	}
	public function deleteNokiaError($id){
		$error = Nokia_Error::where('id',$id)->get()->first();
		$error->delete();
		
	}
}
