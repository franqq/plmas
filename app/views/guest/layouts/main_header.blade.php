@include('guest.layouts.head')
@include('guest.layouts.responsive_menu_header')

					<ul class="normal-menu">
						<li class="current"><a href="{{URL::route('home')}}">Home</a></li>
						<li><a href="{{URL::route('login')}}">Login</a></li>
						<li><a href="{{URL::route('register')}}">Sign Up</a></li>
						<li>
						@include('guest.layouts.search_box')
						</li>
					</ul>
@include('guest.layouts.phone_menu_header')
@yield('content')