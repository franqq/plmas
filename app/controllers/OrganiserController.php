<?php

class OrganiserController extends BaseController {

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
		$myid = Auth::user()->id;
		
		$events = Lecture::where('organiser_id','=',$myid)->get();
		
		View::share('events',$events);
		return View::make('organiser.home');
	}
	
	public function loadEvent($id)
	{
		$squeeb = Lecture::where('id','=',$id)->first();
		View::share('squeeb',$squeeb);		
		
		return View::make('organiser.squeeb');
	}
	
	public function getProfile()
	{
		$id = Auth::user()->id;
		$profile = User::where('id','=',$id)->first();
		$firstname = $profile->Organiser()->first()->firstname;
		$lastname = $profile->Organiser()->first()->lastname;
		
		View::share('firstname',$firstname);
		View::share('lastname',$lastname);
		
		return View::make('organiser.profile');
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
			return Redirect::route('organiser-profile')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$firstname = Input::get('First_Name');
			$lastname = Input::get('Last_Name');
			
			$myprofile = Organiser::where('user_id','=', Auth::user()->id)->first();
			$myprofile->firstname = $firstname;
			$myprofile->lastname = $lastname;
			
			$saved = $myprofile->save();
			if($saved)
			return View::make('organiser.success');
		}
		return Redirect::route('organiser-profile')
			->with('global','Failed!! Please retry');
	}

}
