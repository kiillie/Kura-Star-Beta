@extends('layouts.main')
@section('content')
	<div class="container article search">
		<ul class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li><a href="#">{{$ctry->COUNTRY_NAME}}</a></li>
			<li><a href="#">{{$cat->CATEGORY_NAME}}</a></li>
		</ul>
		<div class="row">
			<div class="col-md-9">
				<div class="search-results">{{$ctry->COUNTRY_NAME}}, {{$cat->CATEGORY_NAME}} result ({{count($articles)}} items):</div>
				<hr></hr>
				<div class="cat-list">
					<div class="row">
						@foreach($categories as $category)
							<div class="col-md-3 col-xs-3">
								<a href="{{$category->CATEGORY_ID}}">{{$category->CATEGORY_NAME}}</a> <span><a class="label label-info" href="#">(2)</a></span>
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
					<div class="col-md-10 col-xs-12 article-results">
						@if(count($articles) == 0)
							<div class="alert alert-danger">
								<span class="article-message">There are no articles in <a href="#">{{$ctry->COUNTRY_NAME}}</a> under <a href="#">{{$cat->CATEGORY_NAME}}</a> category.</span>
							</div>
						@else
							@foreach($articles as $article)
									<div class="article-group">
										<div class="row">
											<div class="col-md-2 col-xs-6">
												<img src="/assets/images/temp/thumb50.JPG" alt="Name" />
											</div>
											<div class="col-md-8 col-xs-12">
												<h3><a href="{{URL::route('article.view', $article->CURATION_ID)}}">{{$article->CURATION_TITLE}}</a></h3>
												<hr></hr>
												<p>{{$article->CURATION_DESCRIPTION}}</p>
											</div>
											<div class="col-md-2 col-xs-12">
												<span class="hidden-xs">Name</span>
												<span class="visible-xs"><i>- Name</i></span>
											</div>
										</div>
										<div class="count-cat">
											<ul class="list-inline">
												<li class="country"><a href="#">{{$ctry->COUNTRY_NAME}}</a></li>
												<li class="category"><a href="">{{$cat->CATEGORY_NAME}}</a></li>
											</ul>
										</div>
									</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
			<div class="col-md-3 hidden-xs">
				@include('articles.rightbar')
				@section('rightbar')
				@show
			</div>
		</div>
	</div>
@stop