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
						<li><span>Articles:</span> <span>{{$count}}</span></li>
						<li><span>Favorites:</span> <span>{{$favorites}}</span></li>
					</ul>
				</div>
				<div class="col-md-12">
					{{$user->CURATER}} 
					@if(Auth::check())
					| <a href="{{URL::route('user.edit', Auth::user()->CURATER_ID)}}">Edit Profile</a>
					@endif
				</div>
				<div class="col-md-12">
					<ul>
						<li><a href="{{URL::route('user.profile', $user->CURATER_ID)}}">Notifications</a></li>
						<li><a href="{{URL::route('user.articles', $user->CURATER_ID)}}">My Articles</a></li>
						<li><a href="{{URL::route('articles.favorited', $user->CURATER_ID)}}">Favorite Articles</a></li>
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