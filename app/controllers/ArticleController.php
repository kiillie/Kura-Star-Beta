<?php

class ArticleController extends BaseController{
	
	public function index(){
		return View::make('articles.create');
	}
	public function show(){
		return View::make('articles.view');
	}
}

?>