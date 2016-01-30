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
												<h2 style="text-transform:capitalize;"><span>
													{{$squeeb->title}} 
													</span></h2>
												<div class="fullsqueeb">
												<squeebimg>
													{{HTML::image(isset($squeeb->Photo()->first()->path) ? $squeeb->Photo()->first()->path : 'pics/default.png','$squeeb->title')}}
												</squeebimg>
												<squeebdesc>
													<strong>Presented by {{$squeeb->Presenter()->first()->firstname.' '.$squeeb->Presenter()->first()->lastname}}</strong>
													<br /><br />
													{{$squeeb->overview}}
												</squeebdesc>
												@if(Session::has('global'))
														<br /><br />
														<div class="field">
															<p align="center" class="post_global">{{Session::get('global')}} </p>
														</div>
												@else
												@endif
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