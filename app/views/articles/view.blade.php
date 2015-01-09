@extends('layouts.main')
@section('content')
<div class="container article">
	{{ Breadcrumbs::render('view_article') }}
	<div class="row details">
		<div class="col-md-9">
			<div class="row">
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
							<a href="#">Preview</a>
						</div>
					</div>
					
				</div>
			</div>
			<div class="count-cat">
				<ul class="list-inline">
					<li class="country"><a href="#">{{$country->COUNTRY_NAME}}</a></li>
					<li class="category"><a href="#">{{$category->CATEGORY_NAME}}</a></li>
				</ul>
			</div>
			<hr></hr>
			<div class="extra-details">
				<h2>{{$article->TAG}}</h2>
				<hr></hr>
				<p>
					{{$article->CURATION_DETAIL}}
				</p>
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