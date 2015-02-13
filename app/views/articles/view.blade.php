@extends('layouts.main')
@section('content')
<script language="javascript" src="/assets/js/temp_art.js"></script>
<div class="container article">
	{{ Breadcrumbs::render('view_article') }}
	<div class="row details">
		<div class="col-md-9 view">
			<div class="row article-view">
				<div class="col-md-3">
					<img src="/assets/images/article-default.png" alt="Title" width="150" height="215" />
				</div>
				<div class="col-md-9">
					<h2>{{$article->CURATION_TITLE}}</h2>
					<h4>Description</h4>
					<p>
						{{$article->CURATION_DESCRIPTION}}
					</p>
					<div class="social">
						<input type="button" class="btn btn-info" value="Like">
						<input type="button" class="btn btn-info" value="Tweet">
						<input type="button" class="btn btn-info" value="Google+">
						<i></i>
						<div class="right">
							<span class="views">{{$article->VIEWS}} Views</span> <span><a href="javascript:void(0);" onclick="favorite_article({{$article->CURATION_ID}}, {{Auth::user()->CURATER_ID}})">Favorite</a></span>
						</div>
					</div>
				</div>
			</div>
			<div class="count-cat">
				<ul class="list-inline">
					@foreach($countries as $country)
						@if($article->COUNTRY_ID == $country->COUNTRY_ID)
							<li class="country"><a href="{{URL::route('article.bycountry', $article->COUNTRY_ID)}}">{{$country->COUNTRY_NAME}}</a></li>
						@endif
					@endforeach
					@foreach($categories as $category)
						@if($article->CATEGORY_ID == $category->CATEGORY_ID)
							<li class="category"><a href="{{URL::route('article.bycategory', $article->CATEGORY_ID)}}">{{$category->CATEGORY_NAME}}</a></li>
						@endif
					@endforeach
				</ul>
			</div>
			<hr></hr>
			<div class="extra-details">
				{{html_entity_decode($article->CURATION_DETAIL)}}
			</div>
			<div class="pages">
				<ul class="pagination">
					<li><a href="#">&laquo;</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul>
			</div>
			<div class="ex-advertisement">
				<img src="/assets/images/Google-Adsense.jpg" alt="Advertisement"/> <img src="/assets/images/Google-Adsense.jpg" alt="Advertisement"/>
			</div>
		</div>
		<div class="col-md-3 right-bar hidden-xs">
			@include('articles.rightbar')
			@section('rightbar')
			@show
		</div>
	</div>
</div>
@stop