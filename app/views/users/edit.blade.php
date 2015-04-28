@extends('layouts.main')
@section('content')
<div class="defaultWidth center clear-auto bodycontent">
	<div class="contentbox">
	{{ Breadcrumbs::render('profile', $user) }}
			<div class="curator-detail-wrap">
				<div class="pointer2"></div>
				@if($user->CURATER_IMAGE == "")
					<img src="/assets/images/picture-default.png" />
				@else
					<img src="{{$user->CURATER_IMAGE}}" />
				@endif
				<div class="labels labels2">
					<span class="countrylabel"><b>{{$count}}</b> Articles</span>
					<span class="catlabel"><b>{{$cfavorite}}</b> Favorites</span>
				</div>
				<div class="curator-info">
					<h4>{{$user->CURATER}}</h4>
					<p>{{$user->CURATER_DESCRIPTION}}</p>
					<div class="clear"></div>
				</div>
				<div class="points-detail">
					{{$count}}<span>Articles</span>
				</div>
				<div class="clear"></div>
			</div>
	</div>
</div>
@stop