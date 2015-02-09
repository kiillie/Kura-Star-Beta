@extends('layouts.main')
@section('content')
<div class="container">
	<div class="prev-message alert alert-info"><span>This is a Preview Page. Only the curator can see this page.</span></div>
	<div class="row">
		<div class="col-md-9">
			<h2>{{$article->CURATION_TITLE}}</h2>
			<div>{{$article->VIEWS}}</div>
		</div>
		<div class="col-md-3">
			<div class="edit-area">
				<div class="art-edit">
					<a href="{{URL::route('article.create', $article->CURATION_ID)}}">Edit this Article</a>
				</div>
				<div class="art-user">
					<img src="" alt=""/> <span>{{$user->CURATER}}</span>
				</div>
			</div>
		</div>
	</div>
</div>
@stop