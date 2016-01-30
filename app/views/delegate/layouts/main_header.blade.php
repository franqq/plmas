@include('delegate.layouts.head')
@include('delegate.layouts.responsive_menu_header')

					<ul class="normal-menu">
						<li class="current"><a href="{{URL::route('delegate')}}">Home</a></li>
						<li><a href="{{URL::route('delegate-profile')}}">Profile</a></li>
						<li><a href="{{URL::route('logout')}}">Logout</a></li>
						<li>
						@include('guest.layouts.search_box')
						</li>
					</ul>
@include('delegate.layouts.phone_menu_header')
@yield('content')