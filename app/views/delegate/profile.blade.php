@extends('organiser.layouts.other_header')
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
												<h2 style="text-transform:capitalize;"><span>Update Profile</span>	
												</h2>
													
													@if(Session::has('global'))
														<p align="center" class="login_global"> {{Session::get('global')}} </p>
													@endif 
													
													<div class="login">
													<form id="loginf-form" method="post" action="{{URL::route('delegate-profile-edit')}}">
														<div class="field">
															<label><strong>First Name*:</strong></label>
															<input type="text" required="required" autofocus="true" name="First_Name" 
															id="First_Name" value = {{$firstname}} />
															@if($errors->has('First_Name'))
								                        	<br />
															<p class="errors">{{$errors->first('First_Name')}}</p>
															@endif
														</div>
														
														<div class="field">
															<label><strong>Last Name*:</strong></label>
															<input type="text" required="required" name="Last_Name" 
															id="Last_Name" value="{{$lastname}}" />
															@if($errors->has('Last_Name'))
								                        	<br />
															<p class="errors" >{{$errors->first('Last_Name')}}</p>
															@endif
														</div>
														
														
																									
														<div class="field">
															<input type="submit" value="Update"/>
															{{Form::token()}}
														</div>
														
														
														<div align="center" class="signup_link">  </div>
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