@extends('layouts.main')
@section('content')
<div class="container">
	<div class="profile profile-edit">
		<div class="details">
			<div class="profile-image"></div>
			<div class="info">
				<div class="name">Name: {{$user->CURATER}}</div>
				<div class="email">Email: {{$user->MAIL_ADDRESS}}</div>
				<div class="about">About Me: {{$user->CURATER_DESCRIPTION}}</div>
			</div>
		</div>
	</div>
</div>
@stop