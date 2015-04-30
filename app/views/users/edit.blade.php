@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/assets/css/new/styles.css"></link>
<script type="text/javascript" src="/assets/js/edit_profile.js"></script>
<div class="defaultWidth center clear-auto bodycontent">
	<div class="contentbox edit-profile">
	{{ Breadcrumbs::render('edit', $user) }}
			<div class="curator-detail-wrap">
				<div class="pointer2"></div>
				<div class="edit-image-wrap">
				@if($user->CURATER_IMAGE == "")
					<img src="/assets/images/picture-default.png" class="prof-image"/>
				@else
					<img src="{{$user->CURATER_IMAGE}}" class="prof-image"/>
				@endif
					<div class="edit-image">
						{{Form::open(['name' => 'editimage', 'class' => 'upload-image', 'enctype' =>'multipart/form-data'])}}
							<div class="upload-form">
								<label for="file-input">
									<img src="/assets/images/upload.png" class="image-up"/>
								</label>
								<input type="hidden" value="{{$user->CURATER_ID}}" name="id"/>
								<input type="file" id="file-input" name="image" accept="image/*" class="file-up"/>
								<div class="clear"></div>
							</div>
						{{Form::close()}}
					</div>
				</div>
				<div class="curator-edit">
					<div class="message">
						@if(Session::has('message'))
							<span>{{Session::get('message')}}</span>
						@endif
					</div>
					{{Form::open(['name' => 'edit', 'route' => 'user.update', 'class' => 'reg-form2 edit-form'])}}
						<h4 class="name"><input name="name" type="text" value="{{$user->CURATER}}" placeholder="Name"/></h4>
						<p class="desc"><textarea maxlength="200" name="desc" placeholder="Short Description">{{$user->CURATER_DESCRIPTION}}</textarea></p>
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