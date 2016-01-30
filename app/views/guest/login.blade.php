@extends('guest.layouts.other_header')
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
													Login
													</span></h2>
												<div class="post">
													<form id="postf-form" method="post" action="{{URL::route('login-post')}}" >
														@if(Session::has('global'))
														<p class="login_global"> {{Session::get('global')}} </p>
														@endif
									
									
														
														<div class="field">
																<label2><strong>Login as<required>*<required></strong></label2>
																<select required="required" name="Membership">
																	  <option value="">Select Membership</option>
																	  <option value="Delegate">Delegate</option>
																	   <option value="Organiser">Organiser</option>	
																	  <option value="Admin">Admin</option>	
																</select>
																@if($errors->has('Membership'))
																<p class="post_errors">* {{$errors->first('Membership')}}</p>
																@endif
														</div>
														
														<div class="field">
															<label2><strong>Email*:</strong></label2>
															<input type="text" required="required" autofocus="true" name="Email"
															 id="Email" e{{(Input::old('Email')) ? ' value = ' .Input::old('Email'). '' : ''}} />
															@if($errors->has('Email'))
								                        	<br />
															<p class="errors" >{{$errors->first('Email')}}</p>
															@endif
														</div>
														
														<div class="field">
															<label2><strong>Password*:</strong></label2>
															<input type="password" value="" required="required" 
															name="Password" id="Password" />
															@if($errors->has('Password'))
								                        	<br />
															<p class="errors" >{{$errors->first('Password')}}</p>
															@endif
														</div>
														
														<div class="field">
															<input checked="checked" type="checkbox" /> Keep me logged in.<br /><br />
															{{Form::token()}}
															<input type="submit" value="Log In"/>
														</div>
														
														<div class="field">
															<p>
															<a>Forgot Password?</a> </p>
														</div>
														<div align="center" class="signup_link"> New to Plmas? <a href="{{URL::route('register')}}" >Register now>></a> </div>
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