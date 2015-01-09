<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Article extends Eloquent implements UserInterface, RemindableInterface{

	use UserTrait, RemindableTrait;

	const CREATED_AT = 'REGISTER_DATE';
	const UPDATED_AT = 'UPDATE_DATE';
	
	protected $table = 't_curation';

	protected $fillable = ['COUNTRY_ID', 'CATEGORY_ID', 'CURATER_ID', 'CURATION_TITLE', 'CURATION_DESCRIPTION', 'CURATION_DETAIL', 
							'CURATION_IMAGE', 'PV', 'TAG', 'CURATION_STATUS'];
}

?>