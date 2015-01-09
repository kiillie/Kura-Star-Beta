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

	public function show($id){
		return Article::where('CURATION_ID', '=', $id)->first();
	}

	public function getByCountryCategory($country, $category){
		return Article::where('COUNTRY_ID', '=', $country)
						->where('CATEGORY_ID', '=', $category)
						->get();
	}

	public function viewById(){
		//
	}

}
?>