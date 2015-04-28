@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/assets/css/new/styles.css"></link>
<script type="text/javascript" src="/assets/js/edit_profile.js"></script>
<div class="defaultWidth center clear-auto bodycontent">
	<div class="contentbox edit-profile">
	{{ Breadcrumbs::render('edit', $user) }}
			<div class="curator-detail-wrap">
				<div class="pointer2"></div>
				@if($user->CURATER_IMAGE == "")
					<img src="/assets/images/picture-default.png" />
				@else
					<img src="{{$user->CURATER_IMAGE}}" />
				@endif
					<div class="edit-image">
						{{Form::open(['name' => 'editimage', 'class' => 'edit-image', 'enctype' =>'multipart/form-data'])}}
							<input type="file" name="image" accept="image/*"/>
						{{Form::close()}}
					</div>
				<div class="curator-info">
					<h4 class="name">{{$user->CURATER}}</h4>
					<p class="email">{{$user->MAIL_ADDRESS}}</p>
					<p class="desc">{{$user->CURATER_DESCRIPTION}}</p>
					<div class="editbtn">
						<input type="button" value="Edit" onclick="edit_profile({{$user->CURATER_ID}})"/>
					</div>
					<div class="clear"></div>
				</div>
				<div class="curator-edit">
					{{Form::open(['name' => 'edit', 'route' => 'user.update', 'class' => 'reg-form2 edit-form'])}}
						<h4 class="name"><input name="name" type="text" value="{{$user->CURATER}}" placeholder="Name"/></h4>
						<p class="email"><input type="text" name="email" placeholder="Email" value="{{$user->MAIL_ADDRESS}}"></p>
						<p class="desc"><textarea name="desc">{{$user->CURATER_DESCRIPTION}}</textarea></p>
						<input type="hidden" value="{{$user->CURATER_ID}}" name="id"/>
						<div class="editbtn">
							<input type="submit" value="Update"/>
						</div>
					{{Form::close()}}
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
	</div>
</div>
@stop