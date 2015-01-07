<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Country extends Eloquent implements UserInterface, RemindableInterface{

	use UserTrait, RemindableTrait;

	const CREATED_AT = 'REGISTER_DATE';
	const UPDATED_AT = 'UPDATE_DATE';
	
	protected $table = 'm_country';

	protected $fillable = ['COUNTRY_NAME', 'CONTINENT_ID', 'STOP_FLAG'];
}

?>