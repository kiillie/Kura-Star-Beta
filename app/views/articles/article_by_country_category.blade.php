@extends('layouts.main')
@section('content')
	<div class="container article search">
		<ul class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li><a href="#">{{$ctry['name']}}</a></li>
			<li><a href="#">{{$cat['name']}}</a></li>
		</ul>
		<div class="row">
			<div class="col-md-9">
				<div class="search-results">{{$ctry['name']}}, {{$cat['name']}} result (1 - 10 items):</div>
				<hr></hr>
				<div class="cat-list">
					<div class="row">
						@foreach($categories as $category)
							<div class="col-md-3">
								<a href="{{$category->CATEGORY_ID}}">{{$category->CATEGORY_NAME}}</a> <span><a href="#">(2)</a></span>
							</div>
						@endforeach
					</div>
				</div>
				<hr></hr>
				<div class="row">
					<div class="col-md-2 hidden-xs cat-sidebar">
						<ul class="nav nav-pills nav-stacked">
							<li><a href="{{URL::route('index')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
							<li><a href="{{URL::route('article.view')}}"><span class="glyphicon glyphicon-cutlery"></span> Gourmet</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-music"></span> Leisure</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-briefcase"></span> Fashion</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Study</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-usd"></span> Business</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-tower"></span> Hotel</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-pushpin"></span> Buzz</a></li>
						</ul>
					</div>
					<div class="col-md-10 col-xs-12 latest">
						<div class="latest-group">
							<div class="row">
								<div class="col-md-2 col-xs-6">
									<img src="/assets/images/temp/thumb50.JPG" alt="Name" />
								</div>
								<div class="col-md-8 col-xs-12">
									<h3>Title</h3>
									<hr></hr>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi libero, viverra nec eleifend vel, malesuada pretium nibh. Pellentesque iaculis luctus mollis. Integer pharetra venenatis dui, nec elementum mauris. Nam a tellus nec mauris pharetra porta. Fusce at mi ornare, volutpat tellus vel, convallis magna. Ut condimentum posuere ipsum, sit amet tempus turpis placerat vel. Mauris feugiat, eros quis consequat laoreet, ipsum felis viverra justo, nec consequat nisi ex quis augue. Sed convallis ornare massa, eu sollicitudin sem. Nulla facilisi.</p>
								</div>
								<div class="col-md-2 col-xs-12">
									<span class="hidden-xs">Name</span>
									<span class="visible-xs"><i>- Name</i></span>
								</div>
							</div>
							<div class="count-cat">
								<ul class="list-inline">
									<li class="country"><a href="#">Philippines</a></li>
									<li class="category"><a href="">Fashion</a></li>
								</ul>
							</div>
						</div>
						<div class="latest-group">
							<div class="row">
								<div class="col-md-2 col-xs-6">
									<img src="/assets/images/temp/thumb57.JPG" alt="Name" />
								</div>
								<div class="col-md-8 col-xs-12">
									<h3>Title</h3>
									<hr></hr>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi libero, viverra nec eleifend vel, malesuada pretium nibh. Pellentesque iaculis luctus mollis. Integer pharetra venenatis dui, nec elementum mauris. Nam a tellus nec mauris pharetra porta. Fusce at mi ornare, volutpat tellus vel, convallis magna. Ut condimentum posuere ipsum, sit amet tempus turpis placerat vel. Mauris feugiat, eros quis consequat laoreet, ipsum felis viverra justo, nec consequat nisi ex quis augue. Sed convallis ornare massa, eu sollicitudin sem. Nulla facilisi.</p>
								</div>
								<div class="col-md-2 col-xs-12">
									<span class="hidden-xs">Name</span>
									<span class="visible-xs"><i>- Name</i></span>
								</div>
							</div>
							<div class="count-cat">
								<ul class="list-inline">
									<li class="country"><a href="#">Philippines</a></li>
									<li class="category"><a href="">Travel & Outing</a></li>
								</ul>
							</div>
						</div>
						<div class="latest-group">
							<div class="row">
								<div class="col-md-2 col-xs-6">
									<img src="/assets/images/temp/thumb62.jpg" alt="Name" />
								</div>
								<div class="col-md-8 col-xs-12">
									<h3>Title</h3>
									<hr></hr>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi libero, viverra nec eleifend vel, malesuada pretium nibh. Pellentesque iaculis luctus mollis. Integer pharetra venenatis dui, nec elementum mauris. Nam a tellus nec mauris pharetra porta. Fusce at mi ornare, volutpat tellus vel, convallis magna. Ut condimentum posuere ipsum, sit amet tempus turpis placerat vel. Mauris feugiat, eros quis consequat laoreet, ipsum felis viverra justo, nec consequat nisi ex quis augue. Sed convallis ornare massa, eu sollicitudin sem. Nulla facilisi.</p>
								</div>
								<div class="col-md-2 col-xs-12">
									<span class="hidden-xs">Name</span>
									<span class="visible-xs"><i>- Name</i></span>
								</div>
							</div>
							<div class="count-cat">
								<ul class="list-inline">
									<li class="country"><a href="#">Philippines</a></li>
									<li class="category"><a href="">Fashion</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				@include('articles.rightbar')
				@section('rightbar')
				@show
			</div>
		</div>
	</div>
@stop