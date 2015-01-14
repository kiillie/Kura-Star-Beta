<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	const CREATED_AT = 'REGISTER_DATE';
	const UPDATED_AT = 'UPDATE_DATE';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 't_curater';
	protected $primaryKey = 'CURATER_ID';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $fillable = ['CURATER', 'MAIL_ADDRESS', 'password', 'CURATER_IMAGE', 'CURATER_DESCRIPTION', 'CURATER_SITE', 'STOP_FLAG'];


	public function getAuthIdentifier(){
		return $this->getKey();
	}

}
