<?php

class PostLectureController extends BaseController {

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

	public function getPostPage()
	{
		$rooms = Room::where('id','>',0)->get();
		View::share('rooms',$rooms);
		return View::make('organiser.post');
	}
	
	public function postLecture()
	{
			 	 
		//verify the user input and create account
		$validator = Validator::make(Input::all(),array(
				'Title'					=>'required|max:200',
				'Description'			=>'required',
				'Date'					=>'required',
				'First_Name'			=>'required|max:120',
				'Last_Name'				=>'required|max:120',
				'Pic' 					=> 'image|max:3000',
				'Room' 					=> 'required'
		));
		if($validator->fails())
		{
			return Redirect::route('organiser')
			->withErrors($validator)
			->withInput()->with('global','Sorry!! Your Event was not posted, please retry.');
		}
		else {
					$title = Input::get('Title');
					$description = Input::get('Description');
					$firstname = Input::get('First_Name');
					$lastname = Input::get('Last_Name');
					$date_view = Input::get('Date');
					$date = date('Y-m-d',(strtotime($date_view)));
					$file = Input::file('Pic');
					$roomid = Input::get('Room');
					
					
					
					if(Auth::user())
					$organiserid = Auth::user()->id;
					else
					$organiserid = 0;
					
					//save the presenter details
					$presenter = Presenter::create(array('firstname'=>$firstname,'lastname'=>$lastname));
					
					$pic_id = 0;
					
					//post photo
					if($file!=null)
					{	 
					 	//photos validation
				        $destinationPath = 'pics';
				        $ext      = $file->guessClientExtension();  // Get real extension according to mime type
				        $fullname = $file->getClientOriginalName(); // Client file name, including the extension of the client
				        $hashname = date('H.i.s').'-'.md5($fullname).'.'.$ext; // Hash processed file name, including the real extension
				        $upload_success = $file->move($destinationPath, $hashname);
						//Set the photo path name to hashname
						$pic = Photo::create(array('path'=>'pics/'.$hashname));
						if($pic)
						$pic_id = $pic->id;
					}
					
					if($presenter)
					{
						//save all the other details
						$post = Lecture::create(array('organiser_id' => $organiserid,
													  'presenter_id' => $presenter->id,
													  'room_id' 	 => $roomid,
													  'pic_id'		 => $pic_id,
													  'title'		 => $title,
													  'overview'	 => $description,
													  'date'		 => $date,
													  'attendance'   => 0
													  ));
						if($post)
						return View::make('organiser.success');
					}
		}
	}

	public function editEvent($id)
	{
		$rooms = Room::where('id','>',0)->get();
		View::share('rooms',$rooms);
		
		$squeeb = Lecture::where('id','=',$id)->first();
		View::share('squeeb',$squeeb);		
		
		return View::make('organiser.edit');
	}

	public function postEditEvent()
	{
		//verify the user input and create account
		$validator = Validator::make(Input::all(),array(
				'Id'					=>'required',
				'Title'					=>'required|max:200',
				'Description'			=>'required',
				'Date'					=>'required',
				'First_Name'			=>'required|max:120',
				'Last_Name'				=>'required|max:120',
				'Pic' 					=> 'image|max:3000',
				'Room' 					=> 'required'
		));
		if($validator->fails())
		{
			return Redirect::back()
			->withErrors($validator)
			->withInput()->with('global','Sorry!! Your Event was not edited, please retry.');
		}
		else {
					$id = Input::get('Id');
					$title = Input::get('Title');
					$description = Input::get('Description');
					$firstname = Input::get('First_Name');
					$lastname = Input::get('Last_Name');
					$date = Input::get('Date');
					$file = Input::file('Pic');
					$roomid = Input::get('Room');
					
					
					
					if(Auth::user())
					$organiserid = Auth::user()->id;
					else
					$organiserid = 0;
					
					$eventedit = Lecture::where('id','=',$id);
					
					$pic_id = 0;
					
					//post photo
					if($file!=null)
					{	 
					 	//photos validation
				        $destinationPath = 'pics';
				        $ext      = $file->guessClientExtension();  // Get real extension according to mime type
				        $fullname = $file->getClientOriginalName(); // Client file name, including the extension of the client
				        $hashname = date('H.i.s').'-'.md5($fullname).'.'.$ext; // Hash processed file name, including the real extension
				        $upload_success = $file->move($destinationPath, $hashname);
						//Set the photo path name to hashname
						$pic = Photo::create(array('path'=>'pics/'.$hashname));
						if($pic)
						$pic_id = $pic->id;
					}
					
					
					if($eventedit->count())
					{
						$eventedit = $eventedit->first();
						
						//edit the details
						$eventedit->organiser_id = $organiserid;
						$eventedit->room_id 	 = $roomid;
						$eventedit->pic_id		 = $pic_id;
						$eventedit->title		 = $title;
						$eventedit->overview	 = $description;
						$eventedit->date		 = $date;
						
						$presenter_edit = Presenter::where('id','=',$eventedit->presenter_id);
						if($presenter_edit->count())
						$presenter_edit = $presenter_edit->first();
						
						$presenter_edit->firstname = $firstname;
						$presenter_edit->lastname = $lastname;
						$saved1 = $presenter_edit->save();
						$saved2 = $eventedit->save();
						
						return View::make('organiser.success');
					}					
					
		}
		return Redirect::back()
			->withInput()->with('global','Sorry!! Your Event was not edited, please retry.');
		
	}

}
