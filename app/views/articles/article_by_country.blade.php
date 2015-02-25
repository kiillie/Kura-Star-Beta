@extends('layouts.main')
@section('content')
<div class="container article by-country">
	<div class="row">
		<div class="col-md-9">
			<div class="search-results">{{$ctry->COUNTRY_NAME}} results ({{count($articles)}} items):</div>
			<hr></hr>
			<div class="cat-list">
			<div class="row">
					@foreach($categories as $category)
						<div class="col-md-3 col-xs-3">
									<a href="{{URL::route('article.bycategory', $category->CATEGORY_ID)}}">{{$category->CATEGORY_NAME}}</a> <span><a class="label label-info" href="{{URL::route('article.bycategory', $category->CATEGORY_ID)}}">{{$artcount[$category->CATEGORY_ID]}}</a></span>
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
					@if(count($articles) != 0)
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
											@foreach($users as $user)
												@if($user->CURATER_ID == $article->CURATER_ID)
													<span class="hidden-xs"><a href="{{URL::route('user.profile', $article->CURATER_ID)}}">{{$user->CURATER}}</a></span>
													<span class="visible-xs"><i>- <a href="{{URL::route('user.profile', $article->CURATER_ID)}}">{{$user->CURATER}}</a></i></span>
												@endif
											@endforeach
										</div>
									</div>
									<div class="count-cat">
										<ul class="list-inline">
											<li class="country"><a href=" {{URL::route('article.bycountry', $article->COUNTRY_ID)}}">{{$ctry->COUNTRY_NAME}}</a></li>
											@foreach($categories as $category)
												@if($category->CATEGORY_ID == $article->CATEGORY_ID)
													<li class="category"><a href="{{URL::route('article.bycategory', $article->CATEGORY_ID)}}">{{$category->CATEGORY_NAME}}</a></li>
												@endif
											@endforeach
										</ul>
									</div>
								</div>
						@endforeach
					@else
						<div class="alert alert-danger">There are no Articles in <a href="{{URL::route('article.bycountry', $ctry->COUNTRY_ID)}}">{{$ctry->COUNTRY_NAME}}</a></div>
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