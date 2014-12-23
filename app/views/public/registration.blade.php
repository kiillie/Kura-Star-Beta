@extends('layouts.main')
@section('content')
<div class="container">
	{{ Breadcrumbs::render('registration') }}
	<div class="reglog-wrapper row">
		<div class="col-xs-6">
			@if(Session::has('message'))
				<span>{{Session::get('message')}}</span>
			@endif
			<div class="reg-form">
				<h2>User Registration</h2>
				<div class="reg-inputs">
					<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus tellus, iaculis et sollicitudin ut, gravida quis nisi. Praesent et convallis lorem, id sollicitudin mauris.</p>
					{{Form::open(['name' => 'register', 'route' => 'user.registration'])}}
						<div class="form-group">
							{{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
						</div>
						<div class="form-group">
							{{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
						</div>
						<div class="form-group">
							{{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])}}
						</div>
						<div class="form-group">
							{{Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Confirm Password'])}}
						</div>
						<div>{{Form::submit('Submit', ['class'	=> 'form-control btn btn-primary'])}}</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
		<div class="col-xs-6">
			@if(Session::has('message_login'))
				<span>{{Session::get('message_login')}}</span>
			@endif
			<div class="log-form">
				<h2>Login</h2>
				{{Form::open(['name' => 'login', 'route' => 'login'])}}
					<div class="form-group">
							{{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
					</div>
					<div class="form-group">
						{{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Confirm Password'])}}
					</div>
					<div class="form-group">
						{{Form::checkbox('remember_me')}}
						{{Form::label('remember_me', 'Remember Me', ['style' => 'vertical-align:top; font-weight: normal;'])}}
					</div>
					<div>{{Form::submit('Login', ['class'	=> 'form-control btn btn-primary'])}}</div>
				{{Form::close()}}
				<div class="social-login row">
					<br/>
					<h6>Or Login with:</h6>
					<div class="facebook col-xs-6">
						{{HTML::image('assets/images/facebook.png')}}
					</div>
					<div class="google col-xs-6">
						{{HTML::image('assets/images/google.png')}}
					</div>
					<div class="twitter col-xs-6">
						{{HTML::image('assets/images/twitter.png')}}
					</div>
					<div class="yahoo col-xs-6">
						{{HTML::image('assets/images/yahoojapan.png')}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop