@extends('layouts.main')
@section('content')
<div class="defaultWidth center clear-auto bodycontent">
<div class="contentbox">
<h2 class="whatsnew">What's New <span>Check the list below for our latest updates</span></h2>
<ul class="post-list-thumb">
@if(count($articles) != 0)
@foreach($articles as $article)
	<li>
		<a href class="post-list-thumb-wrap">
			@if($article->CURATION_IMAGE == "")
				<div class="postimg" style="background-image:url(/assets/images/article-default.png);"></div>
			@else
				<div class="postimg" style="background-image:url({{$article->CURATION_IMAGE}});"></div>
			@endif
			
			<div class="labels">
			@foreach($countries as $country)
				@if($country->COUNTRY_ID == $article->COUNTRY_ID)
					<span class="countrylabel"><i class="fa fa-map-marker"></i> {{$country->COUNTRY_NAME}}</span>
				@endif
			@endforeach
			@foreach($categories as $category)
				@if($category->CATEGORY_ID == $article->CATEGORY_ID)
					<span class="catlabel"><i class="fa fa-hotel"></i> {{$category->CATEGORY_NAME}}</span>
				@endif
			@endforeach
			</div>
			<div class="desc">
				<h2>{{$article->CURATION_TITLE}}</h2>
				<p>
					{{$article->CURATION_DESCRIPTION}}
				</p>
			</div>
			<div class="infobelow">
				<span class="smallpoints smallpoints-left">{{$article->VIEWS}} Views</span>
				<div class="profile-thumb-wrap">
					<?php
						$exist = strpos($article->CURATER_ID, 'fb');
						if($exist !== false){
					?>
						@foreach($fbusers as $fbuser)
							@if($fbuser->CURATER_ID == $article->CURATER_ID)
								<img src="{{$fbuser->CURATER_IMAGE}}" />
								<div class="curator">
								<span>CURATOR</span><br />
									<h3>{{$fbuser->CURATER}}</h3>
								</div>
							@endif
						@endforeach
					<?php
						}
						else{
					?>
					@foreach($users as $raw)
						@if($raw->CURATER_ID == $article->CURATER_ID)
								<img src="{{$raw->CURATER_IMAGE}}" />
								<div class="curator">
								<span>CURATOR</span><br />
									<h3>{{$raw->CURATER}}</h3>
								</div>
						@endif
					@endforeach
					<?php
					}
					?>
					
								</div>
							</div>
							</a>
					</li>
				@endforeach
				</ul>
				<!----- start pagination ------>
					<div class="pagination">
						{{$articles->links()}}
					</div>
				<!----- start pagination ------>
				@else
					<span>There are no articles yet.</span>
				@endif
</div>
@stop