<?php namespace KuraStar\Storage\Article;

interface ArticleRepository{
	
	public function store($input);

	public function insertImage($input);

	public function insert($user, $id);

	public function getArticle($id);

	public function allArticles();
	
	public function articleLists();

	public function show($id);

	public function publish($article);

	public function incrementView($id);

	public function getByUser($user);

	public function countArticlesByUser($id);
	
	public function getByCountryCategory($country, $category);

	public function getByCountry($country);

	public function getByCategory($category);

	public function countCategoryByCountry($country, $category);

	public function getByRanking();

	public function countByCountry($country);

	public function delete($id);
	
	public function getArticlesOrderBy();
}

?>