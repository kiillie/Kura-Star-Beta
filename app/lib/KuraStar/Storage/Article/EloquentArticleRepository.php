<?php namespace KuraStar\Storage\Article;

use Article;

class EloquentArticleRepository implements ArticleRepository{
	
	public function store($input){
		//
		$article = new Article;
		$article->COUNTRY_ID = $input['country'];
		$article->CATEGORY_ID = $input['category'];
		$article->CURATER_ID = \Auth::user()->CURATER_ID;
		$article->CURATION_TITLE = $input['title'];
		$article->CURATION_DESCRIPTION = $input['description'];
		$article->CURATION_DETAIL = $input['art-text-add'];
		$article->CURATION_IMAGE = "";
		$article->TAG = $input['art-heading'];

		return $article->save();
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