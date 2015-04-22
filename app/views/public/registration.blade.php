@extends('layouts.main')
@section('content')
<div class="defaultWidth center clear-auto bodycontent">
	<div class="contentbox nosidebar">
		{{ Breadcrumbs::render('registration') }}
					
		<div class="reg-form">
			<div class="regbox">
				<h3 class="default-title">Not Registered Yet?</h3>
					@if(Session::has('message'))
						@if(is_array(Session::get('message')))
							@foreach(Session::get('message') as $message)
								<span class="label label-danger">{{$message['0']}}</span>
							@endforeach
						@else
							<span class="label label-danger">{{Session::get('message')}}</span>
						@endif
					@endif
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus tellus, iaculis et sollicitudin ut, gravida quis nisi. Praesent et convallis lorem, id sollicitudin mauris.</p>							{{Form::open(['name' => 'register', 'route' => 'user.registration', 'role' => 'form', 'class' => 'reg-form2'])}}
				{{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
					{{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
					{{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])}}
					{{Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Confirm Password'])}}
					{{Form::submit('Submit')}}
				{{Form::close()}}
			</div>
			<div class="regbox">
				<h3 class="default-title">Already have an account?</h3>
					@if(Session::has('message_login'))
						<div class="form-group">
							<span class="label label-danger">{{Session::get('message_login')}}</span>
						</div>
					@endif
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus tellus, iaculis et sollicitudin ut, gravida quis nisi. Praesent et convallis lorem, id sollicitudin mauris.</p>
				{{Form::open(['name' => 'login', 'route' => 'user.login', 'class' => 'reg-form2'])}}
					{{Form::text('log_email', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
					{{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])}}
					<label class="chx">{{Form::checkbox('remember')}}remember me</label>
					{{Form::submit('Login', ['class'	=> 'form-control btn btn-primary'])}}
				{{Form::close()}}
			</div>
							
						
		</div>
												
						
						
	</div>
					
					<!---- start sidebar ---->
					<!----- end sidebar ----------->
					
					
</div>
@stop