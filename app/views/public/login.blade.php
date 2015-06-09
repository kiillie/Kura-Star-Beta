@extends('layouts.main')
@section('content')
	<div class="defaultWidth center clear-auto bodycontent">
		<div class="contentbox nosidebar">
			{{ Breadcrumbs::render('login') }}
				
				<div class="reg-form">
					<div class="regbox" style="margin:0 auto; float:none;">
						<h3 class="default-title">アカウントをお持ちの方</h3>
						@if(Session::has('message_login'))
							<div class="form-group">
								<span class="label label-danger" style="color:red;">{{Session::get('message_login')}}</span>
							</div>
						@endif
						<p>くら☆スタは、海外の暮らしや遊びを共有したり、調べたりすることができるサイトです。あなたの知っている海外の情報を記事にして投稿してみよう！</p>
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
							<!-- <div class="twitter">
							   <a href="#"><img src="/assets/images/twitter.png"></a>
							</div> -->
						</div>
					</div>	
						
				</div>
												
						
						
		</div>
					
					<!---- start sidebar ---->
					<!----- end sidebar ----------->
					
					
	</div>
@stop