<?php

class ArticleController extends BaseController{
	
	public function index(){
		return View::make('articles.create');
	}
}

?>