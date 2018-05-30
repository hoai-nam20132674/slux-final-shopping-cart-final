<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custumer_Register extends Model
{
    protected $table = 'custumer_register'; //Ten bang
	protected $guarded = []; //Cac tham so
	public $primaryKey = 'id';
	public $timestamps = true;

	public function addCustumerRegisterN($request){
		$custumer = new Custumer_Register;
		$custumer->dong = 'Nokia 8800';
		$custumer->message = $request->message;
		$custumer->name = $request->name;
		$custumer->error= $request->error;
		$custumer->phone_number = $request->phone_number;
		$custumer->save();
	}
	public function addCustumerRegisterV($request){
		$custumer = new Custumer_Register;
		$custumer->dong = 'Vertu';
		$custumer->message = $request->message;
		$custumer->name = $request->name;
		$custumer->error= $request->error;
		$custumer->phone_number = $request->phone_number;
		$custumer->save();
	}
}