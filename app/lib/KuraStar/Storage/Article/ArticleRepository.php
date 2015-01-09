<?php namespace KuraStar\Storage\Article;

interface ArticleRepository{
	
	public function store($input);

	public function show($id);
	
	public function getByCountryCategory($country, $category);

	public function viewById();
}

?>