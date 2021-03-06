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
								<a href="{{URL::route('article.bycategory', $category->CATEGORY_ID)}}">{{$category->CATEGORY_NAME}}</a> <span><a class="label label-info" href="#">{{$artcount[$category->CATEGORY_ID]}}</a></span>
							</div>
						@endforeach
					</div>
				</div>
				<hr></hr>
				<div class="row">
					<div class="col-md-2 hidden-xs cat-sidebar">
						@include('articles.leftbar')
						@section('leftbar')
						@show
					</div>
					<div class="col-md-10 col-xs-12 article-results">
						@if(count($articles) == 0)
							<div class="alert alert-danger">
								<span class="article-message">There are no articles in <a href="{{URL::route('article.bycountry', $ctry->COUNTRY_ID)}}">{{$ctry->COUNTRY_NAME}}</a> under <a href="{{URL::route('article.bycategory', $cat->CATEGORY_ID)}}">{{$cat->CATEGORY_NAME}}</a> category.</span>
							</div>
						@else
							@foreach($articles as $article)
									<div class="article-group">
										<div class="row">
											<div class="col-md-2 col-xs-6">
												@if($article->CURATION_IMAGE == ""){
													<img src="/assets/images/article-default.png" alt="{{$article->CURATION_TITLE}}" />
												@else
													<img src="{{$article->CURATION_IMAGE}}" alt="{{$article->CURATION_TITLE}}" />
												@endif
											</div>
											<div class="col-md-8 col-xs-12">
												<h3><a href="{{URL::route('article.view', $article->CURATION_ID)}}">{{$article->CURATION_TITLE}}</a></h3>
												<hr></hr>
												<p>{{$article->CURATION_DESCRIPTION}}</p>
											</div>
											<div class="col-md-2 user-detail col-xs-12">
												<?php
													$exist = strpos($article->CURATER_ID, 'fb');
													if($exist !== false){
														?>
															@foreach($fbusers as $fbuser)
																@if($fbuser->CURATER_ID == $article->CURATER_ID)
																	<span class="hidden-xs"><a href="{{URL::route('user.profile', $article->CURATER_ID)}}">{{$fbuser->CURATER}}</a></span>
																	<span class="visible-xs"><i>- <a href="{{URL::route('user.profile', $article->CURATER_ID)}}">{{$fbuser->CURATER}}</a></i></span>
																@endif
															@endforeach
														<?php
													}
													else{
												?>
												@foreach($users as $raw)
													@if($raw->CURATER_ID == $article->CURATER_ID)
														<span class="hidden-xs"><a href="{{URL::route('user.profile', $article->CURATER_ID)}}">{{$raw->CURATER}}</a></span>
														<span class="visible-xs"><i>- <a href="{{URL::route('user.profile', $article->CURATER_ID)}}">{{$raw->CURATER}}</a></i></span>
													@endif
												@endforeach
												<?php } ?>
											</div>
										</div>
										<div class="count-cat">
											<ul class="list-inline">
												<li class="country"><a href="{{URL::route('article.bycountry', $ctry->COUNTRY_ID)}}">{{$ctry->COUNTRY_NAME}}</a></li>
												<li class="category"><a href="{{URL::route('article.bycategory', $cat->CATEGORY_ID)}}">{{$cat->CATEGORY_NAME}}</a></li>
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