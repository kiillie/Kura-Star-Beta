@extends('users.profile')
@section('profile_content')
<div class="notification-container">
	<div class="row lists">
		@if(count($notifications) == 0)
		<div class="alert alert-danger">There are no new notifications.</div>
		@else
			@foreach($notifications as $notification)
				<div class="alert alert-warning">{{html_entity_decode($notification->MESSAGE)}}</div>
			@endforeach
		@endif
	</div>
</div>
@stop