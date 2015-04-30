<?php namespace KuraStar\Storage\Facebook;

interface FacebookRepository{

	public function store($cred);

	public function check($id);

	public function getUserById($id);

	public function getAllUsers();
	
	public function update($input);
	
	public function image($input);

}


?>