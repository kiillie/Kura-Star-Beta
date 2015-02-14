<?php namespace KuraStar\Storage\Favorite;

use Favorite;

class EloquentFavoriteRepository implements FavoriteRepository{

	public function store($article, $user){
		//
		$favorite = new Favorite;
		$favorite->CURATION_ID = $article;
		$favorite->CURATER_ID = $user;

		return $favorite->save();
	}

	public function delete($article, $user){

		$favorite = Favorite::where('CURATION_ID', '=', $article)->where('CURATER_ID', '=', $user);

		return $favorite->delete();
	}

	public function check($article, $user){
		$check = Favorite::where('CURATION_ID', '=', $article)->where('CURATER_ID', '=', $user)->first();

		if($check != NULL){
			return true;
		}
		else{
			return false;
		}
	}

}


?>