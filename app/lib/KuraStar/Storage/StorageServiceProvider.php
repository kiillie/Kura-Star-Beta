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
	}
}

?>