@include('organiser.layouts.post_head')
@include('organiser.layouts.responsive_menu_header')
<ul class="normal-menu">
	<li><a href="{{URL::route('organiser')}}">Home</a></li>
	<li><a href="{{URL::route('organiser-post')}}">Create Event</a></li>
	<li><a href="{{URL::route('organiser-profile')}}">Settings</a></li>
	<li><a href="{{URL::route('logout')}}">Logout</a></li>
	<li>
	@include('organiser.layouts.search_box')
</li>
</ul>
@include('organiser.layouts.phone_menu_header')
@yield('content')