@extends('structure.top')

@section('title','Login')

<div class="container login-form">

	<div class="panel panel-default">
		<div class="panel-body">

			<h2 class="login-title grey-title"><img src='images/logo.png' class='logo'/> LOGIN</h2>

			@include('structure.errors')

			<form method='post' action='/dashboard'>

				{{ csrf_field() }}

				<div class="input-group login-userinput">
					<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					<input id="txtUser" type="email" class="form-control" name="email" placeholder="Email" required>
				</div>

				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					<input  id="txtPassword" type="password" class="form-control" name="password" placeholder="Password" required> 
				</div>

				<button class="btn btn-primary btn-block login-button orange-bg" type="submit"><span class="glyphicon glyphicon-log-in"></span> Login</button>
				<br>
				<p class="text-center">Not a member? <a href="/register">Sign up now</a> 

				<!--<div class="checkbox login-options">
					<label><input type="checkbox"/> Remember Me</label>
					<a href="#" class="login-forgot">Forgot Username/Password?</a>
				</div>	-->

			</form>			
		</div>
	</div>
</div>

@extends('structure.footer')
