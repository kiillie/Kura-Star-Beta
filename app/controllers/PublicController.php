<?php

class PublicController extends BaseController{

	public function index(){
		return View::make('public.index');
	}

	public function registration(){
		return View::make('public.registration');
	}
}

?>