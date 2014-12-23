<?php namespace KuraStar\Storage\User;

interface UserRepository{
	
	public function store($input);

	public function update($id, $input);

	public function delete($id);
}


?>