<?php 


/**
* 
*/
class StoreController extends BaseController
{
	
	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf',array('on'=>'post'));
	}

	public function getIndex(){
		return View::make('store.index')
		->with('products',Product::take(6)->orderBy('created_at','DESC')->get());
	}

	public function getView($id){
		return View::make('store.view')->with('product',Product::find($id));
	}
	public function getCategory($cat_id){
		return View::make('store.category')
		->with('products',Product::where('category_id' ,'=',$cat_id)->paginate(5))
		->with('category',Category::find($cat_id));
	}

	public function getSearch(){
		$keyword = Input::get('keyword');

		return View::make('store.search')
		->with('products',Product::where('title','LIKE','%'.$keyword.'%')->get())
		->with('keyword',$keyword);
	}
}