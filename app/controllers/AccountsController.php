<?php

class AccountsController extends BaseController {

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

	public function postRegister()
	{
		//verify the user input and create account
		$validator = Validator::make(Input::all(),array(
				'Membership'				=>'required',
				'First_Name'				=>'required|max:50',
				'Last_Name'					=>'required|max:50',
				'Email'						=>'required|max:50|email',
				'Confirm_Email'				=>'required|same:Email',
				'Password'					=>'required',
		));
		
		if($validator->fails())
		{
			return Redirect::route('register')
			->withErrors($validator)
			->withInput();
		}
		else {
			$membership = Input::get('Membership');
			$firstname = Input::get('First_Name');
			$lastname = Input::get('Last_Name');
			$email = Input::get('Email');
			$password = Input::get('Password');
			
						
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
										'active'		=>0
										));
			 if($main_user)
			 {
				//register the new user
				 $user		= $membership::create(array(
				 				'user_id'		=>$main_user->id,
				 				'firstname'		=>$firstname,
				 				'lastname'		=>$lastname,
				 ));
			 



				 if($user)
				 {
				 	Mail::send('emails.auth.activate',
						 array(
								'link' 		=>URL::route('account-activation-get',$membership.'/'.$code),
								'password'	=>$password
						 ),
						function($message) use ($user)
						{
								$message->to($user->email)->subject('Activate Your Account');
						}
					);
					
					return Redirect::route('register')->with('email_sent_success','Activation Successful')
					->with('global','Your Account Has Been Created Successfully.<br />An activation link has been sent your Email:'.
					$email);
					
				 }
			 }
			
		}
		return Redirect::route('register')->with('global','Failed! Please Try Again');

	}

	//method to redirect to the new users page
	public function getCompleteActivation($membership,$code)
	{
		//activate the account where code is code and redirect to login page with success message
		$user = User::where('code', '=', $code)->where('active', '=', FALSE);
		if($user->count())
		{
			$user = $user->first();
			
			$user->active = TRUE;
			$user->code = NULL;
			if($user->save()){
				
			return Redirect::route('login')->with('global','Congratulations!! Your Account has been activated.');
			}
			else if($user->code == NULL || $user->active == TRUE){
				return Redirect::route('login')->with('global','Your account is active. Please enter your login details to proceed.');
			}
		}
		return Redirect::route('signup')->with('global','Some unknown error occured. Please try again. Create a Squeeber Account');
	}

public function postLogIn()
	{
		$validator = Validator::make(Input::all(),array(
				'Email'				=>'required|email',
				'Password'			=>'required'
		));
		
		if($validator->fails())
		{
			return Redirect::route('login')
			->withErrors($validator)
			->withInput();
		}
		else{
			$type = Input::get('Membership');
			
			$auth = Auth::attempt(array(
				'email' 		=> Input::get('Email'),
				'password' 		=> Input::get('Password'),
				'type' 	   		=> $type,
				'active'		=> TRUE,
			));
			
			if($auth)
			{
				// select the account to load and redirect to the intended page
				//admin
				if($type == 'Admin')
				{
					return Redirect::route('admin');
				}
				//organiser
				elseif ($type == 'Organiser') {
					return Redirect::route('organiser');
				}
				//delegate
				else {
					return Redirect::route('delegate');
				}
				
			}
			else{
				return Redirect::route('login')
				->with('global','Email or Phone - Password Mismatch');
			}
		}
	}
	public function logOut()
	{
		Auth::logout();
		return Redirect::route('login');
	}
}
