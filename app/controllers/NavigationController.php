<?php

class NavigationController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		$events = Lecture::where('id','>',0)->get();
		
		View::share('events',$events);
		return View::make('guest.home');
	}
	
	public function getRegister()
	{
		return View::make('guest.signup');
	}
	
	public function getLogin()
	{
		return View::make('guest.login');
	}
	
	public function loadEvent($id)
	{
		$squeeb = Lecture::where('id','=',$id)->first();
		View::share('squeeb',$squeeb);
		view::share('model','Event');
		
		
		return View::make('guest.squeeb');
	}

}
