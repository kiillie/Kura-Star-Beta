<?php namespace KuraStar\Storage\Twitter;

interface TwitterRepository{

	public function store($cred);

	public function check($id);

}


?>