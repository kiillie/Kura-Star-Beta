@extends('layouts.main')
@section('content')
<div class="container">
	<div class="row profile">
		<div class="col-md-3">
			<div class="row prof-img-wrapper">
				<div class="col-md-6">
					@if($user->CURATER_IMAGE == "")
						<img src="/assets/images/picture-default.png" />
					@else
						<img src="{{$user->CURATER_IMAGE}}" alt="{{$user->CURATER}}"/>
					@endif
				</div>
				<div class="col-md-6">
					<ul>
						<li><span>Articles:</span> <span>{{$count}}</span></li>
						<li><span>Favorites:</span> <span>{{$favorites}}</span></li>
					</ul>
				</div>
				<div class="col-md-12">
					{{$user->CURATER}}
				</div>
				<div class="col-md-12">
					<ul>
						<li><a href="{{URL::route('user.articles', $user->CURATER_ID)}}">Articles</a></li>
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