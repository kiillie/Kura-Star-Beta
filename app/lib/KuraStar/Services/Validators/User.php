<?php namespace KuraStar\Services\Validators;

class User extends Validator{

	public static $rules = array(
		'name'	=>	'required',
		'email'	=>	'required|email|unique:t_curater,"MAIL_ADDRESS"',
		'password' => 'required|min:8',
		'confirm_password' => 'required|same:password'
		);

	public function getErrors(){
		return Validator::getErrors();
	}
}

?>