@include('structure.top')

<div class="container login-form">
    <h2 class="login-title">- Register -</h2>
    <div class="panel panel-default">
        <div class="panel-body">

            @include('structure.errors')

            <form method='POST' action='/register'>

                {{ csrf_field() }}

                <div class="input-group login-userinput">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input id="txtUser" type="text" class="form-control" name="email" placeholder="Email" required>
                </div>

                <div class="input-group login-userinput">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input id="txtUser" type="text" class="form-control" name="name" placeholder="Username" required>
                </div>

                <div class="input-group login-userinput">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input  id="txtPassword" type="password" class="form-control" name="password" placeholder="Password" required> 
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input  id="txtPassword" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required> 
                </div>

                <button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i> Register</button>    
            </form>         
        </div>
    </div>
</div>

@include('structure.footer')
