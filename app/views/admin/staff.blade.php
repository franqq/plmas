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
												<hc style="text-transform:capitalize;"><span>Listed Staff</span>	
												</hc>
													<div class="post">
														<br /><br />
														<table border="" width="100%" height="100%" >
															<tr height="40px" >
																<td  ><strong>Firstname</strong></td>
																<td  ><strong>Last Name</strong></td>
																<td align="center" ><strong>Edit</strong></td>
																<td align="center" ><strong>Remove</strong></td>
															</tr>
															@foreach($staffs as $staff)
															<tr height="40px">
																<td >{{$staff->firstname}}</td>
																<td >{{$staff->lastname}}</td>
																<td > 
																	<form name="edit-form"  id="postf-form" method="post" action="{{URL::route('admin-edit-staff')}}" >
																			<input type="hidden" name="ID" value="{{$staff->id}}" />
																			{{Form::token()}}
																			<label2><strong>&nbsp;</strong></label2><input  type="submit" value="Edit"/>
																	</form>
																</td>
																<td >
																	<form name="delete-form"  id="postf-form" method="post" action="{{URL::route('admin-delete-staff')}}" >
																			<input type="hidden" name="ID" value="{{$staff->id}}" />
																			{{Form::token()}}
																			<label2><strong>&nbsp;</strong></label2><input  type="submit" value="Delete"/>
																	</form>
																</td>
															</tr>
															
															@endforeach
														</table>
														<br /><br />
														<form id="postf-form">
															<div align="center" class="signup_link"><a href="{{URL::route('admin-new_staff')}}" >Add More Staff>></a> </div>
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