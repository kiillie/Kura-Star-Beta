<?php

use KuraStar\Storage\Category\CategoryRepository as Category;

class CategoryController extends BaseController{

	protected $category;

	public function __construct(Category $category){
		$this->category = $category;
	}

	public function create(){
		return View::make('admin.create_category');
	}

	public function store(){
		$category = $this->category->store(Input::all());

		if($category){
			return Redirect::route('category.create')
					->with('message', 'Category Successfully Added.');
		}
		else{
			return Redirect::route('category.create')
					->with('message', 'Category was not added.');
		}
	}
}

?>