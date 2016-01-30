					<div class='response-menu'>
						<div>{{HTML::image('images/menu2.png','menu')}}</div>
						<select onChange="location=this.value">
							<option></option>
							<option value="{{URL::route('home')}}">Home</option>
							<option value="{{URL::route('login')}}">Login</option>
							<option value="{{URL::route('register')}}">Sign Up</option>
							<option value="#">Search</option>
						</select>
					</div>
				</nav>
			</div>
			
		</header>