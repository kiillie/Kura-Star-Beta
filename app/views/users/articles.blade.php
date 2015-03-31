@extends('users.profile')
@section('profile_content')
<div class="article-container">
	<h2>My Articles</h2>
	<div class="row table">
		<div class="col-md-8">
		</div>
		<div class="col-md-2">
			<span>Views</span>
		</div>
		<div class="col-md-2">
			<span>Favorited</span>
		</div>
	</div>
	<div class="row lists">
		@if(Session::has('message'))
			<div class="alert alert-danger">{{Session::get('message')}}</div>
		@endif
		@if(count($articles) == 0)
			<div class="alert alert-danger">There no Articles made yet.</div>
		@else
			@foreach($articles as $article)
				<div class="col-md-8 art-enum">
					<a href="{{URL::route('article.create', $article->CURATION_ID)}}" class="a-image left">
						@if($article->CURATION_IMAGE == "")
							<img src="/assets/images/small-default.png" alt="{{$article->CURATION_TITLE}}" />
						@else
							<img src="{{$article->CURATION_IMAGE}}" alt="{{$article->CURATION_TITLE}}" />
						@endif
					</a>
					<div class="detail-wrap left">
						@foreach($categories as $category)
							@if($article->CATEGORY_ID == $category->CATEGORY_ID)
								<div class="cat"><span>{{$category->CATEGORY_NAME}}</span></div>
							@endif
						@endforeach
						<div class="title"><a href="{{URL::route('article.create', $article->CURATION_ID)}}"><span class="title">{{$article->CURATION_TITLE}}</span></a></div>
						<div class="date"><span>{{date("F j, Y", strtotime($article->UPDATE_DATE))}}</span></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="col-md-2">
					{{$article->VIEWS}}
				</div>
				<div class="col-md-2">
					<span>{{$article->PV}}</span>
				</div>
			@endforeach
		@endif
	</div>
</div>
@stop