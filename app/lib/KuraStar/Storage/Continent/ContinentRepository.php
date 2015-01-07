<?php namespace KuraStar\Storage\Continent;

interface ContinentRepository{

	public function store($input);
	public function show();
	public function getById($id);

}


?>