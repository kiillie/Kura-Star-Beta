@extends('users.profile')
@section('profile_content')
<div class="favorites-container">
	<h2>Favorite Articles</h2>
	<div class="row lists">
		@if(count($favorited) == 0)
			<div class="alert alert-danger">You have no favorite articles.</div>
		@else
			@foreach($favorited as $article)
				<div class="col-md-8 art-enum">
					<a href="{{URL::route('article.view', $article->CURATION_ID)}}" class="a-image left">
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
						<div class="title"><a href="{{URL::route('article.view', $article->CURATION_ID)}}"><span class="title">{{$article->CURATION_TITLE}}</span></a></div>
						<div class="date"><span>{{date("F j, Y", strtotime($article->UPDATE_DATE))}}</span></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="col-md-2">
					<span><span class="tb-title">Views:</span> <span>{{$article->VIEWS}}</span></span>
				</div>
				<div class="col-md-2">
					<?php
						$exist = strpos($article->CURATER_ID, 'fb');
						if($exist !== false){
							?>
							@foreach($fbusers as $fbuser)
								@if($fbuser->CURATER_ID == $article->CURATER_ID)
									<span><span class="tb-title">Author:</span> <span><a href="">{{$fbuser->CURATER}}</a></span></span>
								@endif
							@endforeach
							<?php
						}
						else{
					?>
						@foreach($users as $raw)
							@if($raw->CURATER_ID == $article->CURATER_ID)
							<span><span class="tb-title">Author:</span> <span><a href="">{{$raw->CURATER}}</a></span></span>
							@endif
						@endforeach
					<?php } ?>
				</div>
			@endforeach
		@endif
	</div>
</div>
@stop