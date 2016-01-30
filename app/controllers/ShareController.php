<?php

class ShareController extends BaseController {

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

	//facebook and twitter shares
	public function tweetSqueeb($id)
	{
		//update the number of shared times
		$squeeb = Lecture::where('id','=',$id);
		if($squeeb->count())
		{
			$squeeb = $squeeb->first();
			if($squeeb->save())
			{
				$twitterlink = 'https://twitter.com/share?text=Check%20out%20on%20squeeber.com%20&url=';
				$currentlink = URL::current();
				$link = $twitterlink.$currentlink;
				return Redirect::away($link);
			}
		}
	}
	public function facebookSqueeb($id)
	{
		//update the number of shared times
		$squeeb = Lecture::where('id','=',$id);
		if($squeeb->count())
		{
			$squeeb = $squeeb->first();
			if($squeeb->save()){
				return Redirect::away('https://www.facebook.com/sharer.php?u={{URL::current()}}');
			}
		}
	}
}
