@include('structure.top')

@section('title','Register')

<div class="container login-form">

    <div class="panel panel-default">
        <div class="panel-body">

            <h2 class="login-title grey-title"><img src='images/logo.png' class='logo'/> REGISTER</h2>

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

                <button class="btn btn-primary btn-block login-button orange-bg" type="submit"><span class="glyphicon glyphicon-log-in"></span> Register</button>  
                <br>
                <p class="text-center">Already a member? Login <a href="/login">here</a>   
            </form>         
        </div>
    </div>
</div>

@include('structure.footer')
