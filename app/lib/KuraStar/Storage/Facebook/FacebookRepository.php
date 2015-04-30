<?php namespace KuraStar\Storage\Facebook;

interface FacebookRepository{

	public function store($cred);

	public function check($id);

	public function getUserById($id);

	public function getAllUsers();
	
	public function update();
	
	public function image($input);

}


?>