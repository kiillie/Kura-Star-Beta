@extends('layouts.main')
<?php
include(app_path().'\include\fb_authentication.php');
?>
@section('content')
<div class="container">
	{{ Breadcrumbs::render('registration') }}
	<div class="reglog-wrapper row">
		<div class=""></div>
		<div class="col-md-6">
			<div class="reg-form">
				<h2>User Registration</h2>
				<div class="reg-inputs">
					@if(Session::has('message'))
						@if(is_array(Session::get('message')))
							@foreach(Session::get('message') as $message)
								<span class="label label-danger">{{$message['0']}}</span>
							@endforeach
						@else
							<span class="label label-danger">{{Session::get('message')}}</span>
						@endif
					@endif
					<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus tellus, iaculis et sollicitudin ut, gravida quis nisi. Praesent et convallis lorem, id sollicitudin mauris.</p>
					{{Form::open(['name' => 'register', 'route' => 'user.registration', 'role' => 'form'])}}
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
		<div class="col-md-6">
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
					<?php
					    echo '<a href="' . $helper->getLoginUrl() . '"><img src="/assets/images/facebook.png"></a>';
					?>
					</div>
					<div class="twitter col-md-6">
						{{HTML::image('assets/images/twitter.png')}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop