@extends('layouts.main')
@section('content')
<div class="container article by-category">
	<div class="row">
		<div class="col-md-9">
			<div class="search-results">{{$cat->CATEGORY_NAME}} results ({{count($articles)}} items):</div>
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
											@foreach($countries as $country)
												@if($country->COUNTRY_ID == $article->COUNTRY_ID)
													<li class="country"><a href=" {{URL::route('article.bycountry', $article->COUNTRY_ID)}}">{{$country->COUNTRY_NAME}}</a></li>
												@endif
											@endforeach
											<li class="category"><a href="{{URL::route('article.bycategory', $article->CATEGORY_ID)}}">{{$cat->CATEGORY_NAME}}</li>
										</ul>
									</div>
								</div>
						@endforeach
					@else
						<div class="alert alert-danger">There are no Articles with <a href="{{URL::route('article.bycategory', $cat->CATEGORY_ID)}}">{{$cat->CATEGORY_NAME}}</a> category.</div>
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