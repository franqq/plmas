	<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//home route	
Route::get('/',array(
	'as' => 'home',
	'uses' => 'NavigationController@getIndex'
));
Route::get('/register',array(
	'as' => 'register',
	'uses' => 'NavigationController@getRegister'
));
Route::get('/login',array(
	'as' => 'login',
	'uses' => 'NavigationController@getLogin'
));

//tweet squeeb	
Route::get('/tweet/squeeb/{id}',array(
	'as' => 'tweet-squeeb',
	'uses' => 'ShareController@tweetSqueeb'
));

//facebook squeeb	
Route::get('/facebook/squeeb/{id}',array(
	'as' => 'facebook-squeeb',
	'uses' => 'ShareController@facebookSqueeb'
));

//load event	
	Route::get('/event/{id}',array(
		'as' => 'event-get',
		'uses' => 'NavigationController@loadEvent'
	));

//get route to complete registration page
Route::get('account/activation/{membership}/{code}',array(
	'as'		=>		'account-activation-get',
	'uses'		=>		'AccountsController@getCompleteActivation'
));


/*
* CSRF protection
* */
Route::group(array('before' => 'csrf'),function(){
	//post activate squeeb
	Route::post('/register',array(
		'as' => 'register-post',
		'uses' => 'AccountsController@postRegister'
	));
	
	//post activate squeeb
	Route::post('/login',array(
		'as' => 'login-post',
		'uses' => 'AccountsController@postLogin'
	));
	
});



Route::group(array('before'=>'auth'),function(){
//routes for an event organiser
//home route	
Route::get('/organiser/post',array(
	'as' => 'organiser-event',
	'uses' => 'PostLectureController@getPostPage'
));
Route::get('/organiser',array(
	'as' => 'organiser',
	'uses' => 'OrganiserController@getIndex'
));

Route::get('/organiser/profile',array(
	'as' => 'organiser-profile',
	'uses' => 'OrganiserController@getProfile'
));

//load event	
Route::get('/organiser/event/{id}',array(
	'as' => 'organiser-event-get',
	'uses' => 'OrganiserController@loadEvent'
));
//edit event	
Route::get('/organiser/edit/{id}',array(
	'as' => 'organiser-edit-get',
	'uses' => 'PostLectureController@editEvent'
));


/*
* CSRF protection
* */
Route::group(array('before' => 'csrf'),function(){
	//post activate squeeb
	Route::post('/organiser/post',array(
		'as' => 'organiser-post',
		'uses' => 'PostLectureController@postLecture'
	));
	//edit event	
	Route::post('/organiser/edit/',array(
	'as' => 'organiser-post-edit',
	'uses' => 'PostLectureController@postEditEvent'
	));
	Route::post('/organiser/profile/edit',array(
	'as' => 'organiser-profile-edit',
	'uses' => 'OrganiserController@postEditProfile'
	));
});


//routes for an admin
//home route	
//home route
Route::get('/admin',array(
	'as' => 'admin',
	'uses' => 'AdminController@getIndex'
));
Route::get('/admin/post/room',array(
	'as' => 'admin-post-room',
	'uses' => 'AdminController@getPostRoomPage'
));
Route::get('/admin/profile',array(
	'as' => 'admin-profile',
	'uses' => 'AdminController@getProfile'
));
Route::get('/admin/rooms',array(
	'as' => 'admin-rooms',
	'uses' => 'AdminController@getRooms'
));

Route::get('/admin/staff',array(
	'as' => 'admin-staff',
	'uses' => 'AdminController@getStaff'
));

Route::get('/admin/new_staff',array(
	'as' => 'admin-new_staff',
	'uses' => 'AdminController@getNewStaffPage'
));




/*
* CSRF protection
* */
Route::group(array('before' => 'csrf'),function(){
	//post activate squeeb
	Route::post('/admin/post/room',array(
		'as' => 'admin-post-room',
		'uses' => 'AdminController@postRoom'
	));
	
	Route::post('/admin/profile/edit',array(
	'as' => 'admin-profile-edit',
	'uses' => 'AdminController@postEditProfile'
	));
	
	Route::post('/admin/new_staff',array(
	'as' => 'admin-new_staff-post',
	'uses' => 'AdminController@postNewStaff'
	));
	
	Route::post('/admin/edit/staff',array(
	'as' => 'admin-edit-staff',
	'uses' => 'AdminController@postgetEditStaff'
	));
	
	Route::post('/admin/edit/staff/post',array(
	'as' => 'admin-edit-staff-post',
	'uses' => 'AdminController@postEditStaff'
	));
	
	Route::post('/admin/delete/staff/',array(
	'as' => 'admin-delete-staff',
	'uses' => 'AdminController@postDeleteStaff'
	));
	
	Route::post('/admin/edit/room',array(
	'as' => 'admin-edit-room',
	'uses' => 'AdminController@postgetEditRoom'
	));
	
	Route::post('/admin/edit/room/post',array(
	'as' => 'admin-edit-room-post',
	'uses' => 'AdminController@postEditRoom'
	));
	Route::post('/admin/delete/room/',array(
	'as' => 'admin-delete-room',
	'uses' => 'AdminController@postDeleteRoom'
	));
	
});


//routes for the delegates
//home route
Route::get('/delegate',array(
	'as' => 'delegate',
	'uses' => 'DelegateController@getIndex'
));

Route::get('/delegate/events',array(
	'as' => 'delegate-events',
	'uses' => 'DelegateController@getMyEvents'
));

//load event	
Route::get('/delegate/event/{id}',array(
	'as' => 'delegate-event-get',
	'uses' => 'DelegateController@loadEvent'
));
//load event	
Route::get('/delegate/attend/{id}',array(
	'as' => 'delegate-event-attend',
	'uses' => 'DelegateController@attendEvent'
));

Route::get('/delegate/profile',array(
	'as' => 'delegate-profile',
	'uses' => 'DelegateController@getProfile'
));


Route::group(array('before' => 'csrf'),function(){
	Route::post('/delegate/profile/edit',array(
	'as' => 'delegate-profile-edit',
	'uses' => 'DelegateController@postEditProfile'
	));
});


//common routes
Route::get('/logout',array(
	'as' => 'logout',
	'uses' => 'AccountsController@logOut'
));

});
