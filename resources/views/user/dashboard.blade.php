@extends('structure.top')
  @include('structure.nav') 

  @section('title','Dashboard')
  <div class='container'>
    <div class='row'>

      @extends('structure.errors')

      <div class='col-md-12'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <h2>My Profile</h2>
          </div>
        </div>
        <div class='panel panel-body'>
            <div class='col-md-3'>
              <div class='panel panel-default'>
                <div class='panel-body text-center'>

                  <img src='/images/profile_pic.png' class='profile_pic'/>

                  <h3 class='text-uppercase'>{{ Auth::user()->name }}</h3>

                  <a href='mailto:{{ Auth::user()->email }}' title='Come in contact!'>{{ Auth::user()->email }}</a>
                </div><!-- panel-body end-->
              </div>
            </div>

            <div class='col-md-9'>
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
            </div><!-- col-md-9 end -->
        </div>
      </div>


    </div>
  </div>

@extends('structure.footer')