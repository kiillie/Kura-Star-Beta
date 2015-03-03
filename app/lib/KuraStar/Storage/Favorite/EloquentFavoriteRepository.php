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

	public function count_favorite_by_user($id){
		$favorite = Favorite::where('CURATER_ID', '=', $id)->count();

		return $favorite;
	}

	public function get_favorite_by_user($id){
		$favorites = Favorite::where('CURATER_ID', '=', $id)->get();

		return $favorites;
	}

	public function delete($article, $user){

		$favorite = Favorite::where('CURATION_ID', '=', $article)->where('CURATER_ID', '=', $user);

		return $favorite->delete();
	}

	public function check($article, $user){
		$check = Favorite::where('CURATION_ID', '=', $article)->where('CURATER_ID', '=', $user)->get();

		if(count($check) > 0){
			return false;
		}
		else{
			return true;
		}
	}

}


?>