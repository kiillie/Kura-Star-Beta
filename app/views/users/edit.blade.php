@extends('layouts.main')
@section('content')
<script type="text/javascript" src="/assets/js/edit_profile.js"></script>
<div class="container">
	<div class="profile profile-edit">
		<div class="details row">
			<div class="profile-image col-md-2">
				@if($user->CURATER_IMAGE == "")
					<img src="/assets/images/picture-default.png" />
				@else
					<img src="{{$user->CURATER_IMAGE}}" alt="{{$user->CURATER}}"/>
				@endif
				<div class="edit-picture">
					<form name="edit-profile" class="edit-profile picture" enctype="multipart/form-data" method="POST" action="/user/update">
						<div class="btn btn-primary img-up">
							<span class="glyphicon glyphicon-upload"></span>
							<input type="file" class="profile-picture" name="prof-pic">
						</div>
						<input type="hidden" value="{{$user->CURATER_ID}}" name="id">
					</form>
				</div>
			</div>
			<div class="info col-md-7">
				<div class="edit-profile name">Name: <span class="name-val">{{$user->CURATER}}</span> <span class="edit-profile-a right"><a href="javascript:void(0);" onclick="edit_profile('name', '{{$user->CURATER_ID}}')">Edit</a></span>
					<div class="edit-section-cont"></div>
				</div>
				<div class="edit-profile email">Email: <span class="email-val">{{$user->MAIL_ADDRESS}}</span> <span class="edit-profile-a right"><a href="javascript:void(0);"> Edit</a></span></div>
				<div class="edit-profile about">About Me: <span class="desc-val">{{$user->CURATER_DESCRIPTION}}</span> <span class="edit-profile-a right"><a href="javascript:void(0);" onclick="edit_profile('about', '{{$user->CURATER_ID}}')">Edit</a></span>
					<div class="edit-section-cont"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop