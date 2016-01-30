@extends('organiser.layouts.post_header')
@section('content')
<div class="wrapper indent">
			<!--Squeeber left side content to display the college details-->
			<aside class="col-4-4">
				<div class="collegeinside">
				</div>			
			</aside>
		
<!-- content -->
			<section id="content" class="col-3-4">
				
				
				<div class="wrapper">
						<div class="wrap-col">
						<div class="box maxheight">
							<div class="border-right maxheight">
								<div class="border-bot maxheight">
									<div class="border-left maxheight">
										<div class="left-top-corner maxheight">
											<div class="right-top-corner maxheight">
												<div class="inner">
												<hc style="text-transform:capitalize;"><span>Post Lecture</span>	
												</hc>
													<div class="post">
													<form name="post-form"  id="postf-form" enctype="multipart/form-data" method="post" action="" >
														
														@if(Session::has('global'))
														<div class="field">
															<p align="center" class="post_global">{{Session::get('global')}} </p>
														</div>
														@endif 
														
														<div class="field">
															<label><strong>Lecture Details:</strong></label>
														</div>
														
														
																		
														<div class="field">
																<label2><strong>Title <required>*<required></strong></label2>
																<input required="required" e{{(Input::old('Title')) ? ' value = ' .Input::old('Title'). '' : ''}} name="Title" type="text">
																@if($errors->has('Title'))
																	<p class="post_errors">* {{$errors->first('Title')}}</p>
																@endif	
														</div>
														
														
														
														<div class="field">
																<label3><strong>Description <required>*<required></strong></label3>
																<textarea rows="2" name="Description" placeholder="Enter your text here.. " required="required" cols="20" style="" ></textarea>
    
																@if($errors->has('Description'))
																	<p class="errors">* {{$errors->first('Description')}}</p>
																@endif																	
														</div>	
													
														<div class="field">
																<label2><strong>Date <required>*<required></strong></label2>
																<input required="required" e{{(Input::old('Date')) ? ' value = ' .Input::old('Date'). '' : ''}} name="Date" type="date" />
																@if($errors->has('Date'))
																	<p class="post_errors">* {{$errors->first('Date')}}</p>
																@endif	
														</div>
														
														<div class="field">
															<label2><strong>Photo</strong></label2>
															<input type="file" e{{(Input::old('Pic')) ? ' value = ' .Input::old('Pic'). '' : ''}} name="Pic" />
															@if($errors->has('Title'))
																<p class="post_errors">* {{$errors->first('Pic')}}</p>
															@endif	
														</div>
														
														<div class="field">
															<label2><strong>Room</strong></label2>
															<select required="required" name="Room">
																  <option value="">Select Room</option>
																	@foreach($rooms as $room)
																	  <option value="{{$room->id}}">{{$room->name}}</option>
																	 @endforeach
															</select>
															@if($errors->has('Room'))
																<p class="post_errors">* {{$errors->first('Room')}}</p>
															@endif	
														</div>
														
														<div class="field">
															<label><strong>Presenter Details:</strong></label>
														</div>
														
														<div class="field">
																<label2><strong>First Name <required>*<required></strong></label2>
																<input required="required" e{{(Input::old('First_Name')) ? ' value = ' .Input::old('First_Name'). '' : ''}} name="First_Name" type="text">
																@if($errors->has('Name'))
																	<p class="post_errors">* {{$errors->first('Name')}}</p>
																@endif	
														</div>
														
														<div class="field">
																<label2><strong>Last Name <required>*<required></strong></label2>
																<input required="required" e{{(Input::old('Last_Name')) ? ' value = ' .Input::old('Last_Name'). '' : ''}} name="Last_Name" type="text">
																@if($errors->has('Last_Name'))
																	<p class="post_errors">* {{$errors->first('Last_Name')}}</p>
																@endif
														</div>
														
														
														
														<div class="field">
															{{Form::token()}}
															<label2><strong>&nbsp;</strong></label2><input  type="submit" value="Save"/>
														</div>
													
													</form>
													
													
													
												</div> 
												
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
				</div>
			</section>
			<!-- aside -->
			<aside class="col-1-4">
				<div class="inside">
								
				</div>
			</aside>
			
			
			
		</div>
		
@stop