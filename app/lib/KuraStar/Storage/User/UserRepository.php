<?php namespace KuraStar\Storage\User;

interface UserRepository{
	
	public function store($input);

	public function getUserById($id);

	public function allUsers();
	
	public function update($input);
	
	public function image($input);

	public function delete($id);
}


?>