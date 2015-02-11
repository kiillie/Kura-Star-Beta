@extends('layouts.main')
@section('content')
<link rel="stylesheet" type="text/css" href="/assets/css/temp.css"></link>
<link rel="stylesheet" type="text/css" href="/assets/css/style.css"></link>
<div class="container preview">
	<div class="prev-message alert alert-info"><span>This is a Preview Page. Only the curator can see this page.</span></div>
	<div class="row">
		<div class="col-md-8">
			<h2>{{$article->CURATION_TITLE}}</h2>
			<div class="art-desc">{{$article->CURATION_DESCRIPTION}}</div>
			<div class="fave-views">
				<div class="fave-wrapper right">
					<div class="views left">{{$article->VIEWS}} <span>views</span></div>
					<div class="fave left">
						<a href="javascript:void(0);" onclick="favorite_addon({{$article->CURATION_ID}})">
							<img src="#" alt="Favorite" />
						</a>
						<div class="fave-count">
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<hr></hr>
			<div class="">
				{{html_entity_decode($article->CURATION_DETAIL)}}
			</div>
		</div>
		<div class="col-md-4 article">
			<div class="edit-area">
				<div class="art-edit">
					<a href="{{URL::route('article.create', $article->CURATION_ID)}}">Edit this Article</a>
				</div>
				<div class="art-user">
					<img src="" alt=""/> <span>{{$user->CURATER}}</span>
				</div>
				<h2>Advertisements</h2>
				@include('articles.rightbar')
				@section('rightbar')
				@show
			</div>
		</div>
	</div>
</div>
@stop