<?php

 /**
 * 
 */
 class UsersController extends BaseController
 {
 	public function __constract(){
 		parent::__constract();
 		$this->beforeFilter('csrf',array('on'=>'post'));
 	}

 	public function getNewaccount(){
 		return View::make('users.newaccount');
 	}

 	public function postCreate(){
 		$validator = Validator::make(Input::all(),User::$rules);

 		if ($validator->passes()) {
 			$user = new User();
 			$user->firstname = Input::get('firstname');
 			$user->lastname = Input::get('lastname');
 			$user->email = Input::get('email');
 			$user->password = Hash::make(Input::get('password'));
 			$user->telephone = Input::get('telephone');
 			$user->save();

 			return Redirect::to('users/signin')
 			->with('message','Thank you for creating a new account please sign in ');
 		}

 		return Redirect::to('users/newaccount')
 		->with('message','Someting went Wrong')
 		->withErrors($validator)
 		->withInput();
 	}
 	
 	public function getSignin(){
 		return View::make('users.signin');
 	}
 	
 	public function postSignin(){
 		if(Auth::attempt(array('email'=>Input::get('email'),'password'=>Input::get('password')))){
 			return Redirect::to('/')->with('message','Thanks for signing in');
 		}
 		return Redirect::to('users/signin')->with('message','Your email/password was incorect');
 	}
 	
 	public function getSignout(){
 		Auth::logout();
 		return Redirect::to('users/signin')->with('message','you have been signed out');
 	}
 }