<?php namespace KuraStar\Storage\Category;

use Category;

class EloquentCategoryRepository implements CategoryRepository{

	public function store($input){
		$category = new Category;
		$category->CATEGORY_NAME = $input['name'];

		return $category->save();
	}

	public function show(){
		return Category::all();
	}

	public function getById($id){
		return Category::where('CATEGORY_ID', $id)->get();
	}

}

?>