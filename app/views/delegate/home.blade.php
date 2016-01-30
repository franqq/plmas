@extends('delegate.layouts.main_header')
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
												<hc style="text-transform:capitalize;"><span>Upcoming Events</span>	
												</hc>
													 
												<ul class="mysqueeb">
														
														@foreach($events as $event)
														<div class="news-feed">
															<li>
																<a href="{{URL::route('delegate-event-get',$event->id)}}">
																	<mainimg>
																		{{HTML::image(isset($event->Photo()->first()->path) ? $event->Photo()->first()->path : 'pics/default.png',$event->title)}} 
																	</mainimg>
																</a>
																<stime>8h.</stime>
																<strong><a href="{{URL::route('delegate-event-get',$event->id)}}">{{$event->title}}
																{{HTML::image('images/event.png')}}
																</a>
																</strong>
																
																<psquib>
																{{$event->overview}}<a href="{{URL::route('delegate-event-get',$event->id)}}"> ...see more</a>
																</psquib>
																@include('delegate.layouts.other_share')
															</li>
														</div>
														@endforeach
														
												  </ul>
												  
												  <div align="center" class="see-more">
													  <a href="" > See More </a>
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