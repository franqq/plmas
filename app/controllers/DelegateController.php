<?php

class DelegateController extends BaseController {

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
		$events = Lecture::where('id','>',0)->orderBy('id','DESC')->get();
		
		View::share('events',$events);
		return View::make('delegate.home');
	}
	
	public function loadEvent($id)
	{
		$squeeb = Lecture::where('id','=',$id)->first();
		View::share('squeeb',$squeeb);		
		
		return View::make('delegate.squeeb');
	}
	
	public function attendEvent($id)
	{
		$squeeb = Lecture::where('id','=',$id)->first();
		$capacity = $squeeb->Room()->first()->capacity;
		$attendance = $squeeb->attendance;
		if($attendance <= $capacity-1)
		{
			$squeeb->attendance = $squeeb->attendance + 1;
			$save=$squeeb->save;
			return View::make('delegate.attendsuccess');
		}
		return View::make('delegate.attendfail');
	}
	
	public function getProfile()
	{
		$id = Auth::user()->id;
		$profile = User::where('id','=',$id)->first();
		$firstname = $profile->Delegate()->first()->firstname;
		$lastname = $profile->Delegate()->first()->lastname;
		
		View::share('firstname',$firstname);
		View::share('lastname',$lastname);
		
		return View::make('delegate.profile');
	}
	public function postEditProfile()
	{
		//verify the user input and create account
		$validator = Validator::make(Input::all(),array(
				'First_Name'				=>'required|max:50',
				'Last_Name'					=>'required|max:50',
		));
		
		if($validator->fails())
		{
			return Redirect::route('delegate-profile')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$firstname = Input::get('First_Name');
			$lastname = Input::get('Last_Name');
			
			$myprofile = Delegate::where('user_id','=', Auth::user()->id)->first();
			$myprofile->firstname = $firstname;
			$myprofile->lastname = $lastname;
			
			$saved = $myprofile->save();
			if($saved)
			return View::make('delegate.success');
		}
		return Redirect::route('delegate-profile')
			->with('global','Failed!! Please retry');
	}
	public function getMyEvents()
	{
		
	}

}
