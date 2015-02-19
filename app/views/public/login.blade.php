@extends('layouts.main')
@section('content')
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
						{{HTML::image('assets/images/facebook.png')}}
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