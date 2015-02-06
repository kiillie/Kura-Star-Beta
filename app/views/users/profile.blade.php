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
						<li>10</li>
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
						<li><a href="#">My Articles</a></li>
						<li><a href="#">Favorite Articles</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="alert alert-danger">Notifications</div>
		</div>
	</div>
</div>
@stop