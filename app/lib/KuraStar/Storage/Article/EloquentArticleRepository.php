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
			
			$picture = Article::where('CURATION_ID', '=', $input['cur_id'])->first();
			if($picture['CURATION_IMAGE'] != ""){
				if(unlink(public_path().$picture['CURATION_IMAGE'])){
					$article = Article::where('CURATION_ID', '=', $input['cur_id'])
								->update(['CURATION_IMAGE' => $cur_img ]);
				}
			}
			else{
				$article = Article::where('CURATION_ID', '=', $input['cur_id'])
					->update(['CURATION_IMAGE' => $cur_img ]);
			}
		}
		else if(isset($input['imageUrl'])){
			if($input['imageUrl'] != ""){
				$url = parse_url($input['imageUrl']);
				$parts = pathinfo($url['path']);
				$filename = $parts['filename'].".".$parts['extension'];
				$path = public_path()."/assets/images/attachments/".$filename;
				$file = "/assets/images/attachments/".$filename;
				if(file_exists($path)){
					$rand = str_random(7);
					$filename = $parts['filename']."_".$rand.".".$parts['extension'];
					$path = public_path()."/assets/images/attachments/".$filename;
					$file = "/assets/images/attachments/".$filename;
				}
				if(fopen($path, "w")){
					if(\File::copy($input['imageUrl'], $path)){
						$picture = Article::where('CURATION_ID', '=', $input['cur_id'])->first();
						if($picture['CURATION_IMAGE'] != ""){
							if(file_exists($picture['CURATION_IMAGE'])){
								if(unlink(public_path().$picture['CURATION_IMAGE'])){
									$article = Article::where('CURATION_ID', '=', $input['cur_id'])
										->update(['CURATION_IMAGE' => $file]);
								}
							}
							else{
								$article = Article::where('CURATION_ID', '=', $input['cur_id'])
										->update(['CURATION_IMAGE' => $file]);
							}
						} 
						else{
							$article = Article::where('CURATION_ID', '=', $input['cur_id'])
									->update(['CURATION_IMAGE' => $file]);
						}
					}
				}
			}
		}
		else if(isset($input['googleImage'])){
			$picture = Article::where('CURATION_ID', '=', $input['cur_id'])->first();
			if($picture['CURATION_IMAGE'] != ""){
				if(unlink(public_path().$picture['CURATION_IMAGE'])){
					$article = Article::where('CURATION_ID', '=', $input['cur_id'])
								->update(['CURATION_IMAGE' => $input['googleImage']]);
				}
			}
			else{
				$article = Article::where('CURATION_ID', '=', $input['cur_id'])
					->update(['CURATION_IMAGE' => $input['googleImage']]);
			}
		}
		return $article;
	}

	public function insert($user, $id){
		$article = new Article;
		$article->CURATER_ID = $id;

		return $article->save();
	}
	
	public function insertDetails($input){
		$details = Article::where('CURATION_ID', '=', $input['id'])->update(['CURATION_DETAIL' => $input['details']]);
	}
	
	public function getArticle($id){
		$article = Article::where('CURATER_ID', '=', $id)->max('REGISTER_DATE');
		return Article::where('CURATER_ID', '=', $id)
						->where('REGISTER_DATE', '=', $article)->first();
	}

	public function getById($id){
		$article = Article::where('CURATION_ID', '=', $id)->first();

		return $article;
	}

	public function allArticles(){
		return Article::where('CURATION_STATUS', '=', 1)
						->orderBy('VIEWS', 'DESC')
						->paginate(12);
	}
	
	public function articleLists(){
		return Article::all();
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
				$views = $views + 3;
				$increment = Article::where('CURATION_ID', '=', $id)->update(['VIEWS' => $views]);

				return $increment;
			}
			else{
				return true;
			}
		}
		else{
			$views = $views + 3;
			$increment = Article::where('CURATION_ID', '=', $id)->update(['VIEWS' => $views]);
			return $increment;
		}
	}

	public function getByUser($id){
		return Article::where('CURATER_ID', '=', $id)->where('CURATION_STATUS', '=', 1)->paginate(12);
	}
	
	public function getDraftsByUser($id){
		return Article::where('CURATER_ID', '=', $id)->where('CURATION_STATUS', '=', 0)->paginate(12);
	}

	public function countArticlesByUser($id){
		return Article::where('CURATER_ID', '=', $id)
					->where('CURATION_STATUS', '=', 1)
					->count();
	}

	public function getByCountryCategory($country, $category){
		return Article::where('COUNTRY_ID', '=', $country)
						->where('CATEGORY_ID', '=', $category)
						->where('CURATION_STATUS', '=', 1)
						->paginate(12);
	}

	public function getByCountry($country){
		return Article::where('COUNTRY_ID', '=', $country)
						->where('CURATION_STATUS', '=', 1)
						->paginate(12);
	}

	public function getByCategory($category){
		return Article::where('CATEGORY_ID', '=', $category)
						->where('CURATION_STATUS', '=', 1)
						->paginate(12);
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

	public function delete($id){
		$html = file_get_contents(public_path()."/assets/articles/{$id}.php");
		$count = 0;
		$selected = Article::where('CURATION_ID', '=', $id)->first();
		$html = trim($html);
		if($html != ""){
			libxml_use_internal_errors(true);
			$dom = new \DOMDocument();
			try{
				if($dom->loadHtml($html)){
					if(count(libxml_get_errors()) == 0){
						foreach($dom->getElementsByTagName('img') as $img){
							if (filter_var($img->getAttribute('src'), FILTER_VALIDATE_URL) === false) {
								if(file_exists(public_path().$img->getAttribute('src'))){
									if(!unlink(public_path().$img->getAttribute('src'))){
										$count++;
									}
								}
								else{
									$count++;
								}
							}
						}
					}
					else{
						$count = 0;
					}
				}
				else{
					$count = 0;
				}
			}
			catch(Exception $e){
				$count = 0;
			}
		}
		if($count == 0){
			if(file_exists(public_path().'/assets/articles/'.$id.'.php')){
				if(unlink(public_path().'/assets/articles/'.$id.'.php')){
					if($selected->CURATION_IMAGE == ""){
						$article = Article::where('CURATION_ID', '=', $id);
						return $article->delete();
					}
					else{
						if(file_exists(public_path().$selected->CURATION_IMAGE)){
							if(unlink(public_path().$selected->CURATION_IMAGE)){
								$article = Article::where('CURATION_ID', '=', $id);
								return $article->delete();
							}
							else{
								return false;
							}
						}
						else{
							$article = Article::where('CURATION_ID', '=', $id);
							return $article->delete();
						}
					} 
				}
			}
			else{ 
				if($selected->CURATION_IMAGE == ""){
					$article = Article::where('CURATION_ID', '=', $id);
					return $article->delete();
				}
				else{
					if(file_exists(public_path().$selected->CURATION_IMAGE)){
						if(unlink(public_path().$selected->CURATION_IMAGE)){
							$article = Article::where('CURATION_ID', '=', $id);
							return $article->delete();
						}
						else{
							return false;
						}
					}
					else{
						$article = Article::where('CURATION_ID', '=', $id);
						return $article->delete();
					}
				}
			}
		}
		else{
			return false;
		}
	}
	
	public function getArticlesOrderBy(){
		$articles = \DB::table('t_curation')
                        ->select(\DB::raw('*, COUNT("CURATER_ID") AS curaters'))
                        ->orderBy('curaters', 'DESC')
                        ->groupBy('CURATER_ID')
                        ->paginate(12);
		return $articles;
	}

}
?>