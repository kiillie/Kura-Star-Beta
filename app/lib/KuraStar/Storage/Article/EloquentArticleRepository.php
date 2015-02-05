<?php namespace KuraStar\Storage\Article;

use Article;

class EloquentArticleRepository implements ArticleRepository{
	
	public function store($input){
		//
		$article = Article::where('CURATION_ID', '=', $input['cur_id'])
						->update(['COUNTRY_ID' => $input['country'], 'CATEGORY_ID' => $input['category'], 'CURATION_TITLE' => $input['title'], 'CURATION_DESCRIPTION' => $input['description'] ]);

		return $article;
	}

	public function insert(){
		$article = new Article;
		$article->CURATER_ID = \Auth::user()->CURATER_ID;

		return $article->save();
	}

	public function getArticle(){
		$article = Article::where('CURATER_ID', '=', \Auth::user()->CURATER_ID)->max('REGISTER_DATE');
		return Article::where('CURATER_ID', '=', \Auth::user()->CURATER_ID)
						->where('REGISTER_DATE', '=', $article)->first();
	}

	public function allArticles(){
		return Article::where('CURATION_STATUS', '=', 1)
						->get();
	}

	public function show($id){
		return Article::where('CURATION_ID', '=', $id)->first();
	}

	public function getByCountryCategory($country, $category){
		return Article::where('COUNTRY_ID', '=', $country)
						->where('CATEGORY_ID', '=', $category)
						->where('CURATION_STATUS', '=', 1)
						->get();
	}

	public function getByCountry($country){
		return Article::where('COUNTRY_ID', '=', $country)
						->where('CURATION_STATUS', '=', 1)
						->get();
	}

	public function getByCategory($category){
		return Article::where('CATEGORY_ID', '=', $category)
						->where('CURATION_STATUS', '=', 1)
						->get();
	}

	public function countCategoryByCountry($country, $category){
		return Article::where('COUNTRY_ID', '=', $country)
						->where('CATEGORY_ID', '=', $category)
						->where('CURATION_STATUS', '=', 1)
						->count();
	}

	public function viewById(){
		//
	}

	public function getByRanking(){
		return Article::where('CURATION_STATUS', '=', 1)
				->orderBy('VIEWS', 'desc')
				->take(5)
				->get();
	}

	public function countByCountry($country){
		return Article::where('COUNTRY_ID', '=', $country)
						->where('CURATION_STATUS', '=', 1)
						->count();

	}

}
?>