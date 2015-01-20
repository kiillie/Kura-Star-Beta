<?php namespace KuraStar\Storage\Article;

interface ArticleRepository{
	
	public function store($input);

	public function allArticles();

	public function show($id);
	
	public function getByCountryCategory($country, $category);

	public function getByCountry($country);

	public function getByCategory($category);

	public function countCategoryByCountry($country, $category);

	public function viewById();
}

?>