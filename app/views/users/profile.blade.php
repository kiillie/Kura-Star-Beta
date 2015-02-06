@extends('layouts.main')
@section('content')
<div class="container">
	<div class="row profile">
		<div class="col-md-3">
			<div class="row prof-img-wrapper">
				<div class="col-md-6">
					<img src="/assets/images/picture-default.png" />
				</div>
				<div class="col-md-6">
					<ul>
						<li>0</li>
						<li>{{$count}}</li>
						<li>0</li>
					</ul>
				</div>
				<div class="col-md-12">
					{{$user->CURATER}} |
					<a href="">Edit Profile</a>
				</div>
				<div class="col-md-12">
					<ul>
						<li><a href="#">Notifications</a></li>
						<li><a href="{{URL::route('user.articles', $user->CURATER_ID)}}">My Articles</a></li>
						<li><a href="#">Favorite Articles</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			@yield('profile_content')
		</div>
	</div>
</div>
@stop