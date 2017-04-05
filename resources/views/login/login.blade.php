@extends('structure.top')

@section('title','Login')

<div class="container login-form">
	<h2 class="login-title">- Login -</h2>
	<div class="panel panel-default">
		<div class="panel-body">

			@include('structure.errors')

			<form method='post' action='/home'>

				{{ csrf_field() }}

				<div class="input-group login-userinput">
					<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					<input id="txtUser" type="email" class="form-control" name="email" placeholder="Email" required>
				</div>

				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					<input  id="txtPassword" type="password" class="form-control" name="password" placeholder="Password" required> 
				</div>

				<button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i> Login</button>
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
