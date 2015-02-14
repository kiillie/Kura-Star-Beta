<?php namespace KuraStar\Storage;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider{

	public function register(){
		$this->app->bind(
				'KuraStar\Storage\User\UserRepository',
				'KuraStar\Storage\User\EloquentUserRepository'
			);
		$this->app->bind(
				'KuraStar\Storage\Country\CountryRepository',
				'KuraStar\Storage\Country\EloquentCountryRepository'
			);
		$this->app->bind(
				'KuraStar\Storage\Continent\ContinentRepository',
				'KuraStar\Storage\Continent\EloquentContinentRepository'
			);
		$this->app->bind(
				'KuraStar\Storage\Category\CategoryRepository',
				'KuraStar\Storage\Category\EloquentCategoryRepository'
			);
		$this->app->bind(
				'KuraStar\Storage\Article\ArticleRepository',
				'KuraStar\Storage\Article\EloquentArticleRepository'
			);
		$this->app->bind(
				'KuraStar\Storage\Favorite\FavoriteRepository',
				'KuraStar\Storage\Favorite\EloquentFavoriteRepository'
			);
	}
}

?>