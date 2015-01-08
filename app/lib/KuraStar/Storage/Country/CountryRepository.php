<?php namespace KuraStar\Storage\Country;

interface CountryRepository{
	
	public function show();

	public function store($input);

	public function showCountryByContinent();
	
	public function getById($id);
}

?>