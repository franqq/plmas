@extends('admin.layouts.other_header')
@section('content')
<div class="wrapper indent">
			<!--Squeeber left side content to display the college details-->
			<aside class="col-6-1">
							<div class="collegeinside">
								
							</div>
			</aside>
		
<!-- content -->
			<section id="login_content" class="col-6-2">
				
				
				
						<div class="box maxheight">
							<div class="border-right maxheight">
								<div class="border-bot maxheight">
									<div class="border-left maxheight">
										<div class="left-top-corner maxheight">
											<div class="right-top-corner maxheight">
												<div class="inner">
												<h2 style="text-transform:capitalize;"><span>
													Register Staff
													</span></h2>
												<div class="post">
													<form id="postf-form" method="post" action="{{URL::route('admin-new_staff-post')}}">
														<div class="field">
															<label2><strong>First Name*:</strong></label2>
															<input type="text" required="required" autofocus="true" name="First_Name" 
															id="First_Name" e{{(Input::old('First_Name')) ? ' value = ' .Input::old('First_Name'). '' : ''}} />
															@if($errors->has('First_Name'))
								                        	<br />
															<p class="errors">{{$errors->first('First_Name')}}</p>
															@endif
														</div>
														
														<div class="field">
															<label2><strong>Last Name*:</strong></label2>
															<input type="text" required="required" name="Last_Name" 
															id="Last_Name" e{{(Input::old('Last_Name')) ? ' value = ' .Input::old('Last_Name'). '' : ''}} />
															@if($errors->has('Last_Name'))
								                        	<br />
															<p class="errors" >{{$errors->first('Last_Name')}}</p>
															@endif
														</div>
														
														
														<div class="field">
															<label2><strong>Email*:</strong></label2>
															<input type="text" required="required"	name="Email" id="Email"
															e{{(Input::old('Email')) ? ' value = ' .Input::old('Email'). '' : ''}} />
															@if($errors->has('Email'))
								                        	<br />
															<p class="errors" >{{$errors->first('Email')}}</p>
															@endif
														</div>
														
														<div class="field">
															<label2><strong>Re-enter Email*:</strong></label2>
															<input type="text" required="required" name="Confirm_Email" id="Confirm_Email"
															e{{(Input::old('Confirm_Email')) ? ' value = ' .Input::old('Confirm_Email'). '' : ''}} />
															@if($errors->has('Confirm_Email'))
								                        	<br />
															<p class="errors" >{{$errors->first('Confirm_Email')}}</p>
															@endif
														</div>
														
														
														
														<div class="field">
															<input type="submit" value="Save"/>
															{{Form::token()}}
														</div>
														
														
														<div align="center" class="signup_link"> <a href="{{URL::route('admin-staff')}}">Registered Staff>></a> </div>
													</form>
												</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
			</section>
			
			
			
			
			
		</div>
@stop