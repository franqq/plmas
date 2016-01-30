					<div class='response-menu'>
						<div>{{HTML::image('images/menu2.png','menu')}}</div>
						<select onChange="location=this.value">
							<option></option>
							<option value="{{URL::route('home')}}">Home</option>
							<option value="{{URL::route('admin-rooms')}}">Rooms</option>
							<option value="{{URL::route('admin-staff')}}">Staff</option>
							<option value="{{URL::route('admin-profile')}}">Settings</option>
							<option value="{{URL::route('logout')}}">Logout</option>
						</select>
					</div>
				</nav>
			</div>
			
		</header>