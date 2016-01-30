					<div class='response-menu'>
						<div>{{HTML::image('images/menu2.png','menu')}}</div>
						<select onChange="location=this.value">
							<option></option>
							<option value="{{URL::route('delegate')}}">Home</option>
							<option value="{{URL::route('delegate-profile')}}">Settings</option>
							<option value="#">Search</option>
							<option value="{{URL::route('logout')}}">Logout</option>
						</select>
					</div>
				</nav>
			</div>
			
		</header>