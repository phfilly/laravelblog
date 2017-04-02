@extends('structure.top')
  @include('structure.nav') 

  @section('title','Dashboard')
  <div class='container'>
    <div class='row'>

      @extends('structure.errors')

      <h1>My Profile</h1>

      <div style='max-width:540px;margin:auto'>

        <form method='POST' action='/my-dashboard'>
                  {{ csrf_field() }}

                  <div class="input-group login-userinput">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                      <input id="txtUser" type="text" class="form-control" name="email" placeholder="Email" required value='{{ Auth::user()->email }}'>
                  </div>

                  <div class="input-group login-userinput">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                      <input id="txtUser" type="text" class="form-control" name="name" placeholder="Username" required value='{{ Auth::user()->name }}'>
                  </div>

                  <!--<div class="input-group login-userinput">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                      <input  id="txtPassword" type="password" class="form-control" name="password" placeholder="Password" required> 
                  </div>

                  <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                      <input  id="txtPassword" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required> 
                  </div>-->

                  <button class="btn btn-primary btn-block login-button" type="submit" style='max-width:150px;margin:auto'><i class="fa fa-sign-in"></i> Update</button>  
        </form>

      </div>
    </div>
  </div>

@extends('structure.footer')