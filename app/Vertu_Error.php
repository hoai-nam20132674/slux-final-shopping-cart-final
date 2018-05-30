<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vertu_Error extends Model
{
    protected $table = 'vertu_error'; //Ten bang
	protected $guarded = []; //Cac tham so
	public $primaryKey = 'id';
	public $timestamps = true;

	public function addVertuError($request){
		$error = new Vertu_Error;
		$error->error = $request->error;
		$error->repair_description = $request->repair_description;
		$error->price = $request->price;
		$error->warranty = $request->warranty;
		$error->blog_url = $request->blog_url;
		$error->save();
	}
	public function editVertuError($request, $id){
		$error = Vertu_Error::where('id',$id)->get()->first();
		$error->error = $request->error;
		$error->repair_description = $request->repair_description;
		$error->price = $request->price;
		$error->warranty = $request->warranty;
		$error->blog_url = $request->blog_url;
		$error->save();
	}
	public function deleteVertuError($id){
		$error = Vertu_Error::where('id',$id)->get()->first();
		$error->delete();
		
	}
}
