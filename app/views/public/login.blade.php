@extends('layouts.main')
@section('content')
<div class="defaultWidth center clear-auto bodycontent registration">
	<div class="log-form">
		<h2 class="title">Already have an account?</h2>
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
				&nbsp;{{Form::label('remember', ' Remember Me')}}
			</div>
			<div>{{Form::submit('Login', ['class'	=> 'form-control btn btn-primary'])}}</div>
		{{Form::close()}}
		<div class="social-login">
			<br/>
			<h6>Or Login with:</h6>
			<div class="facebook">
			   <a href="fbauth"><img src="/assets/images/facebook.png"></a>
			</div>
			<div class="twitter">
				{{HTML::image('assets/images/twitter.png')}}
			</div>
		</div>
	</div>
</div>
@stop