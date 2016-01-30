@include('guest.layouts.head')
@include('guest.layouts.responsive_menu_header')
					<ul class="normal-menu">
						<li><a href="{{URL::route('home')}}">Home</a></li>
						<li><a href="{{URL::route('notices-get')}}">Notices</a></li>
						<li><a href="{{URL::route('events-get')}}">Events</a></li>
						<li><a href="{{URL::route('offers-get')}}">Offers</a></li>
						<li class="current" ><a href="{{URL::route('jobs-get')}}">Jobs</a></li>
						<li>
						@include('guest.layouts.search_box')
					</ul>
@include('guest.layouts.phone_menu_header')
@yield('content')