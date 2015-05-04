@extends('layouts.main')
@section('content')
	<div class="defaultWidth center clear-auto bodycontent">
		<div class="contentbox nosidebar">
			{{ Breadcrumbs::render('login') }}
				
				<div class="reg-form">
					<div class="regbox" style="margin:0 auto; float:none;">
						<h3 class="default-title">Already have an account?</h3>
						@if(Session::has('message_login'))
							<div class="form-group">
								<span class="label label-danger" style="color:red;">{{Session::get('message_login')}}</span>
							</div>
						@endif
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus tellus, iaculis et sollicitudin ut, gravida quis nisi. Praesent et convallis lorem, id sollicitudin mauris.</p>
						{{Form::open(['name' => 'login', 'route' => 'user.login', 'class' => 'reg-form2'])}}
							{{Form::text('log_email', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
							{{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])}}
							<label class="chx">{{Form::checkbox('remember')}} remember me</label>
							{{Form::submit('Login', ['class'	=> 'form-control btn btn-primary'])}}
						{{Form::close()}}
						
						<div class="social-login">
							<br/>
							<h6>Or Login with:</h6>
							<div class="facebook">
							   <a href="fbauth"><img src="/assets/images/facebook.png"></a>
							</div>
						</div>
					</div>	
						
				</div>
												
						
						
		</div>
					
					<!---- start sidebar ---->
					<!----- end sidebar ----------->
					
					
	</div>
@stop