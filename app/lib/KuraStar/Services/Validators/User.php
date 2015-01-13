<?php namespace KuraStar\Services\Validators;

class User extends Validator{

	public static $rules = array(
		'name'	=>	'required',
		'email'	=>	'required|email|unique:T_CURATER,"MAIL_ADDRESS"',
		'password' => 'required|min:8',
		'confirm_password' => 'required|same:password'
		);

	public function getErrors(){
		return Validator::getErrors();
	}
}

?>