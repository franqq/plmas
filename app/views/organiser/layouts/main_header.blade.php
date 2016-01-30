@include('organiser.layouts.head')
@include('organiser.layouts.responsive_menu_header')

					<ul class="normal-menu">
						<li class="current"><a href="{{URL::route('organiser')}}">Home</a></li>
						<li><a href="{{URL::route('organiser-event')}}">Create Event</a></li>
						<li><a href="{{URL::route('organiser-profile')}}">Settings</a></li>
						<li><a href="{{URL::route('organiser-profile')}}">Logout</a></li>
						<li>
						@include('guest.layouts.search_box')
						</li>
					</ul>
@include('organiser.layouts.phone_menu_header')
@yield('content')