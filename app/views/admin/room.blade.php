@extends('admin.layouts.post_header')
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
												<hc style="text-transform:capitalize;"><span>Post Room</span>	
												</hc>
													<div class="post">
													<form name="post-form"  id="postf-form" enctype="multipart/form-data" method="post" action="{{URL::route('admin-post-room')}}" >
														
														@if(Session::has('global'))
														<div class="field">
															<p align="center" class="post_global">{{Session::get('global')}} </p>
														</div>
														@endif 
														
														<div class="field">
															<label><strong>Room Details:</strong></label>
														</div>
														
														
																		
														<div class="field">
																<label2><strong>Name <required>*<required></strong></label2>
																<input required="required" e{{(Input::old('Name')) ? ' value = ' .Input::old('Name'). '' : ''}} name="Name" type="text">
																@if($errors->has('Name'))
																	<p class="post_errors">* {{$errors->first('Name')}}</p>
																@endif	
														</div>
														
														<div class="field">
																<label2><strong>Capacity <required>*<required></strong></label2>
																<input required="required" e{{(Input::old('Capacity')) ? ' value = ' .Input::old('Capacity'). '' : ''}} name="Capacity" type="text">
																@if($errors->has('Capacity'))
																	<p class="post_errors">* {{$errors->first('Capacity')}}</p>
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