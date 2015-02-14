<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Favorite extends Eloquent implements UserInterface, RemindableInterface{

	use UserTrait, RemindableTrait;

	const CREATED_AT = 'REGISTER_DATE';
	
	protected $table = 't_favorite';

	protected $fillable = ['CURATION_ID', 'CURATER_ID', 'REGISTER_DATE'];

	public function setUpdatedAt($value)
	{
	   //Do-nothing
	}
	public function getUpdatedAtColumn()
	{
	    //Do-nothing
	}
}

?>