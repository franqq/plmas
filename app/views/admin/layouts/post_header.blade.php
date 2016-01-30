@include('admin.layouts.post_head')
@include('admin.layouts.responsive_menu_header')
<ul class="normal-menu">
	<li><a href="{{URL::route('admin')}}">Home</a></li>
	<li><a href="{{URL::route('admin-rooms')}}">Rooms</a></li>
	<li><a href="{{URL::route('admin-staff')}}">Staff</a></li>
	<li><a href="{{URL::route('admin-profile')}}">Settings</a></li>
	<li><a href="{{URL::route('logout')}}">Logout</a></li>
	<li>
	@include('admin.layouts.search_box')
</li>
</ul>
@include('admin.layouts.phone_menu_header')
@yield('content')