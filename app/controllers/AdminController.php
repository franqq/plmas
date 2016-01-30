<?php

class AdminController extends BaseController {

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

	public function getPostRoomPage()
	{
		return View::make('admin.room');
	}
	
	public function getIndex()
	{
		$events = Lecture::where('id','>',0)->get();
		
		View::share('events',$events);
		return View::make('admin.home');
	}
	
	public function postRoom()
	{
		//verify the user input and create account
		$validator = Validator::make(Input::all(),array(
				'Name'				=>'required|max:200',
				'Capacity'				=>'required|numeric',
				
		));
		if($validator->fails())
		{
			return Redirect::route('admin-post-room')
			->withErrors($validator)
			->withInput()->with('global','Sorry!! The Room was not posted, please retry.');
		}
		else{
			$name = Input::get('Name');
			$capacity = Input::get('Capacity');
			
			$room = Room::create(array(
				'name' 		=> $name,
				'capacity' 	=> $capacity
			));
			
			if($room)
			{
				return View::make('admin.success');
			}
		}
		return Redirect::route('admin-post-room')
			->withErrors($validator)
			->withInput()->with('global','Sorry!! The Room was not posted, please retry.');
	}
	
	public function getProfile()
	{
		$id = Auth::user()->id;
		$profile = User::where('id','=',$id)->first();
		$firstname = $profile->Admin()->first()->firstname;
		$lastname = $profile->Admin()->first()->lastname;
		
		View::share('firstname',$firstname);
		View::share('lastname',$lastname);
		
		return View::make('admin.profile');
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
			return Redirect::route('admin-profile')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$firstname = Input::get('First_Name');
			$lastname = Input::get('Last_Name');
			
			$myprofile = Admin::where('user_id','=', Auth::user()->id)->first();
			$myprofile->firstname = $firstname;
			$myprofile->lastname = $lastname;
			
			$saved = $myprofile->save();
			if($saved)
			return View::make('admin.success');
		}
		return Redirect::route('admin-profile')
			->with('global','Failed!! Please retry');
	}
	public function getRooms()
	{
		$rooms = Room::where('id','>',0)->get();
		View::share('rooms',$rooms);
		return View::make('admin.rooms');
	}
	public function getStaff()
	{
		$staffs = Admin::where('user_id', '!=' , Auth::user()->id)->get();
		
		View::share('staffs',$staffs);
		return View::make('admin.staff');
	}
	public function getNewStaffPage()
	{		
		return View::make('admin.new_staff');
	}
	
	public function postNewStaff()
	{
		//verify the user input and create account
		$validator = Validator::make(Input::all(),array(
				'First_Name'				=>'required|max:50',
				'Last_Name'					=>'required|max:50',
				'Email'						=>'required|max:50|email',
				'Confirm_Email'				=>'required|same:Email',
		));
		
		if($validator->fails())
		{
			return Redirect::route('admin-new_staff')->withErrors($validator)->withInput();
		}
		else {
			$membership = 'Admin';
			$firstname = Input::get('First_Name');
			$lastname = Input::get('Last_Name');
			$email = Input::get('Email');
			$password = 'password';
			
						
			 //generate the activation codes
			 $code					= str_random(60);
			 $user = NULL;
			 $main_user = NULL;
			 //check the membership type and update the correct database
			  $main_user		= 	User::create(array(
				 						'type'		=>$membership,
				 						'email'			=>$email,
										'password'		=>Hash::make($password),
										'code'			=>$code,
										'active'		=>1
										));
			 if($main_user)
			 {
				//register the new user
				 $user		= $membership::create(array(
				 				'user_id'		=>$main_user->id,
				 				'firstname'		=>$firstname,
				 				'lastname'		=>$lastname,
				 ));
			 
					
					return View::make('admin.success');
			 }
			
		}
		return Redirect::route('admin-new_staff')->with('global','Failed! Please Try Again');

	}

	public function postgetEditStaff()
	{
		$validator = Validator::make(Input::all(),array(
				'ID'				=>'required',
		));
		
		if($validator->fails())
		{
			return View::make('admin.failed');
		}
		else {
			$id = Input::get('ID');
		
		$profile = Admin::where('id','=',$id)->first();
		$firstname = $profile->firstname;
		$lastname = $profile->lastname;
		$myid = $profile->id;
		
		View::share('firstname',$firstname);
		View::share('lastname',$lastname);
		View::share('id',$myid);
		
		return View::make('admin.editstaff');
		}
		
		return View::make('admin.failed');
	}

	public function postEditStaff()
	{
		//verify the user input and create account
		$validator = Validator::make(Input::all(),array(
				'First_Name'				=>'required|max:50',
				'Last_Name'					=>'required|max:50',
		));
		
		if($validator->fails())
		{
			return View::make('admin.failed');
		}
		else
		{
			$firstname = Input::get('First_Name');
			$lastname = Input::get('Last_Name');
			$id = Input::get('ID');
			
			$myprofile = Admin::where('id','=', $id)->first();
			$myprofile->firstname = $firstname;
			$myprofile->lastname = $lastname;
			
			$saved = $myprofile->save();
			if($saved)
			return View::make('admin.success');
		}
		return View::make('admin.failed');
	}
	
	public function postDeleteStaff()
	{
		$validator = Validator::make(Input::all(),array(
				'ID'				=>'required',
		));
		
		if($validator->fails())
		{
			return View::make('admin.failed');
		}
		else {
			
		$myid = Input::get('ID');
		
		$profile = Admin::where('id','=',$myid)->first();
		$deleted = $profile->delete();
		
		
		return View::make('admin.success');
		}
		
		return View::make('admin.failed');
	}
	
	
	
	public function postgetEditRoom()
	{
		$validator = Validator::make(Input::all(),array(
				'ID'				=>'required',
		));
		
		if($validator->fails())
		{
			return View::make('admin.failed');
		}
		else {
			
		$myid = Input::get('ID');
		
		$profile = Room::where('id','=',$myid)->first();
		$name = $profile->name;
		$capacity = $profile->capacity;
		
		View::share('name',$name);
		View::share('capacity',$capacity);
		View::share('id',$myid);
		
		return View::make('admin.editroom');
		}
		
		return View::make('admin.failed');
	}

	public function postEditRoom()
	{
		//verify the user input and create account
		$validator = Validator::make(Input::all(),array(
				'Name'				=>'required|max:50',
				'Capacity'					=>'required',
		));
		
		if($validator->fails())
		{
			return View::make('admin.failed');
		}
		else
		{
			$name = Input::get('Name');
			$capacity = Input::get('Capacity');
			$id = Input::get('ID');
			
			$myprofile = Room::where('id','=', $id)->first();
			$myprofile->name = $name;
			$myprofile->capacity = $capacity;
			
			$saved = $myprofile->save();
			if($saved)
			return View::make('admin.success');
		}
		return View::make('admin.failed');
	}


	public function postDeleteRoom()
	{
		$validator = Validator::make(Input::all(),array(
				'ID'				=>'required',
		));
		
		if($validator->fails())
		{
			return View::make('admin.failed');
		}
		else {
			
		$myid = Input::get('ID');
		
		$profile = Room::where('id','=',$myid)->first();
		$deleted = $profile->delete();
		
		
		return View::make('admin.success');
		}
		
		return View::make('admin.failed');
	}
	
	

}
