<?php namespace KuraStar\Storage\Favorite;

interface FavoriteRepository{

	public function store($article, $user);

	public function delete($article, $user);

	public function check($article, $user);

}

?>