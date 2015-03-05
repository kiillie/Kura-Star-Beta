@extends('layouts.main')
@section('content')
<script>
    window.fbAsyncInit = function() {
        FB.init({
          appId      : '787791034642434',
          xfbml      : true,
          version    : 'v2.1'
        });
         FB.getLoginStatus(function(response) {
		  if (response.status === 'connected') {
		    console.log('Logged in.');
		  }
		  else {
		    FB.login();
		  }
		});
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

</script>
<div class="container">
	
	<div class="reglog-wrapper row">
		<div class="col-md-12">
			<div class="log-form">
				<h2>Login</h2>
					@if(Session::has('message_login'))
					<div class="form-group">
						<span class="label label-danger">{{Session::get('message_login')}}</span>
					</div>
					@endif
				{{Form::open(['name' => 'login', 'route' => 'user.login'])}}
					<div class="form-group">
							{{Form::text('log_email', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
					</div>
					<div class="form-group">
						{{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])}}
					</div>
					<div class="form-group">
						{{Form::checkbox('remember')}}
						{{Form::label('remember', 'Remember Me', ['style' => 'vertical-align:top; font-weight: normal;'])}}
					</div>
					<div>{{Form::submit('Login', ['class'	=> 'form-control btn btn-primary'])}}</div>
				{{Form::close()}}
				<div class="social-login row">
					<br/>
					<h6>Or Login with:</h6>
					<div class="facebook col-md-6">
						<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop