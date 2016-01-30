@extends('organiser.layouts.main_header')
@section('content')

<div class="wrapper indent">
			<!--Squeeber left side content to display the college details-->
			<aside class="col-4-4">
							<div class="collegeinside">
								
								@include('guest.layouts.college_details')
								
								
								<ul class="services">
								
								</ul>
								</div>
								
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
												<hc style="text-transform:capitalize;"><span>Success</span>	
												</hc>
													 
												<ul class="Upcoming Lectures">
													
													<squeebdesc>
														<br /><br />
														Congratulations!! Details posted successfully.													
														</squeebdesc>
												
												<div class="activatesqueeb">
													<form id="activatesqueeb-form" method="get" action="{{URL::route('delegate')}}" >
														
														
														<div class="field">
															<input type="submit" value="Continue"/>
														</div>
													</form>	
													<br /><br />												
												</div>
														
																	
																	
														
												  </ul>
												  
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