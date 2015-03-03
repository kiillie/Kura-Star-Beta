<?php namespace KuraStar\Storage\Favorite;

interface FavoriteRepository{

	public function store($article, $user);

	public function count_favorite_by_user($id);

	public function get_favorite_by_user($id);

	public function delete($article, $user);

	public function check($article, $user);

}

?>