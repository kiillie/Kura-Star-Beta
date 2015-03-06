<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class FacebookUser extends Eloquent implements UserInterface, RemindableInterface{

	use UserTrait, RemindableTrait;

	const CREATED_AT = 'REGISTER_DATE';
	const UPDATED_AT = 'UPDATE_DATE';
	
	protected $table = 'fb_users';

	protected $fillable = ['FB_ID', 'CURATER', 'CURATER_IMAGE', 'CURATER_DESCRIPTION'];
}

?>