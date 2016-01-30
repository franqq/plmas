@if(Auth::user())
					@include('member.layouts.post_head')
					@include('member.layouts.responsive_menu_header')
					<ul class="normal-menu">
						<li><a href="{{URL::route('member-home')}}">Home</a></li>
						<li><a href="{{URL::route('notices-get')}}">Notices</a></li>
						<li><a href="{{URL::route('events-get')}}">Events</a></li>
						<li><a href="{{URL::route('offers-get')}}">Offers</a></li>
						<li><a href="{{URL::route('jobs-get')}}">Jobs</a></li>
						<li><a href="{{URL::route('newcollege-get')}}">College</a></li>
						<li>
						@include('member.layouts.search_box')
					</li>
					</ul>
@else
					@include('guest.layouts.post_head')
					@include('guest.layouts.responsive_menu_header')
					<ul class="normal-menu">
						<li><a href="{{URL::route('home')}}">Home</a></li>
						<li><a href="{{URL::route('notices-get')}}">Notices</a></li>
						<li><a href="{{URL::route('events-get')}}">Events</a></li>
						<li><a href="{{URL::route('offers-get')}}">Offers</a></li>
						<li><a href="{{URL::route('jobs-get')}}">Jobs</a></li>
						<li>
						@include('guest.layouts.search_box')
					</li>
					</ul>
@endif
@include('guest.layouts.phone_menu_header')
@yield('content')