<?php namespace KuraStar\Storage\Article;

use Article;

class EloquentArticleRepository implements ArticleRepository{
	
	public function store($input){
		//
		$details = htmlentities($input['inner-detail']);

		$article = Article::where('CURATION_ID', '=', $input['cur_id'])
					->update(['COUNTRY_ID' => $input['country'], 'CATEGORY_ID' => $input['category'], 'CURATION_TITLE' => $input['title'], 'CURATION_DESCRIPTION' => $input['description'], 'CURATION_DETAIL' => $details]);
		
		return $article;
	}

	public function insertImage($input){

		$imgname = str_random(40);
		if(isset($input['imgUp'])){
			$upload = $input['imgUp'];
			$folder = public_path()."/assets/images/attachments/";
			$move = $imgname.".".$upload->getClientOriginalExtension();
			$upload->move($folder, $move);
			$cur_img = "/assets/images/attachments/".$move;

			$article = Article::where('CURATION_ID', '=', $input['cur_id'])
						->update(['CURATION_IMAGE' => $cur_img ]);

		}
		else if($input['imageUrl'] != ""){
			$article = Article::where('CURATION_ID', '=', $input['cur_id'])
						->update(['CURATION_IMAGE' => $input['imageUrl']]);
		}
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

	public function getById($id){
		$article = Article::where('CURATION_ID', '=', $id)->first();

		return $article;
	}

	public function allArticles(){
		return Article::where('CURATION_STATUS', '=', 1)
						->get();
	}

	public function show($id){
		return Article::where('CURATION_ID', '=', $id)->first();
	}

	public function publish($article){
		$publish = Article::where('CURATION_ID', '=', $article['id'])->update(['CURATION_STATUS' => $article['value']]);

		return $publish;
	}

	public function incrementView($id){
		$article = Article::where('CURATION_ID', '=', $id)->first();
		$views = $article->VIEWS;

		if(\Auth::check()){
			if($article->CURATER_ID != \Auth::user()->CURATER_ID){
				$views = $views + 1;
				$increment = Article::where('CURATION_ID', '=', $id)->update(['VIEWS' => $views]);

				return $increment;
			}
			else{
				return true;
			}
		}
		else{
			$views = $views + 1;
			$increment = Article::where('CURATION_ID', '=', $id)->update(['VIEWS' => $views]);
			return $increment;
		}
	}

	public function getByUser($id){
		return Article::where('CURATER_ID', '=', $id)->get();
	}

	public function countArticlesByUser($id){
		return Article::where('CURATER_ID', '=', $id)
					->count();
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