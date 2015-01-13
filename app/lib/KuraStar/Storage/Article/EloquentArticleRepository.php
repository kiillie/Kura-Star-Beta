<?php namespace KuraStar\Storage\Article;

use Article;

class EloquentArticleRepository implements ArticleRepository{
	
	public function store($input){
		//
		$article = new Article;
		$article->COUNTRY_ID = $input['country'];
		$article->CATEGORY_ID = $input['category'];
		$article->CURATER_ID = 1;
		$article->CURATION_TITLE = $input['title'];
		$article->CURATION_DESCRIPTION = $input['description'];
		$article->CURATION_DETAIL = $input['art-text-add'];
		$article->CURATION_IMAGE = "";
		$article->TAG = $input['art-heading'];

		return $article->save();
	}

	public function allArticles(){
		return Article::all();
	}

	public function show($id){
		return Article::where('CURATION_ID', '=', $id)->first();
	}

	public function getByCountryCategory($country, $category){
		return Article::where('COUNTRY_ID', '=', $country)
						->where('CATEGORY_ID', '=', $category)
						->get();
	}

	public function getByCountry($country){
		return Article::where('COUNTRY_ID', '=', $country)
						->get();
	}

	public function getByCategory($category){
		return Article::where('CATEGORY_ID', '=', $category)
						->get();
	}

	public function countCategoryByCountry($country, $category){
		return Article::where('COUNTRY_ID', '=', $country)
						->where('CATEGORY_ID', '=', $category)
						->count();
	}

	public function viewById(){
		//
	}

}
?>