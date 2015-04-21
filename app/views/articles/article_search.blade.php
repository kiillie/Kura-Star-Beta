@extends('layouts.main')
@section('content')
	<div class="defaultWidth center clear-auto bodycontent bycountry">
		<div class="contentbox">
		{{ Breadcrumbs::render('search', $ctry, $cat)}}
			<h2 class="whatsnew"><span><div class="search-results">{{$ctry->COUNTRY_NAME}}, {{$cat->CATEGORY_NAME}} result ({{count($articles)}} items):</div></span></h2>
			@if(count($articles) != 0)
				<ul class="post-list-thumb">
					@foreach($articles as $article)		
						<li>
							<a href="{{URL::route('article.view', $article->CURATION_ID)}}" class="post-list-thumb-wrap">
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
									<span class="smallpoints smallpoints-left">{{$article->VIEWS}} views</span>
									<?php
										$exist = strpos($article->CURATER_ID, 'fb');
										if($exist !== false){
									?>
									@foreach($fbusers as $fbuser)
										@if($fbuser->CURATER_ID == $article->CURATER_ID)
											<div class="profile-thumb-wrap">
												@if($fbuser->CURATER_IMAGE == "")
													<img src="/assets/images/picture-default.png" />
												@else
													<img src="{{$fbuser->CURATER_IMAGE}}" />
												@endif
												<div class="curator">
													<span>CURATOR</span><br />
													<h3>{{$fbuser->CURATER}}</h3>
												</div>
											</div>
										@endif
									@endforeach
									<?php
										}
										else{
									?>
									@foreach($users as $raw)
										@if($raw->CURATER_ID == $article->CURATER_ID)
											<div class="profile-thumb-wrap">
												@if($raw->CURATER_IMAGE == "")
													<img src="/assets/images/picture-default.png" />
												@else
													<img src="{{$raw->CURATER_IMAGE}}" />
												@endif
												<div class="curator">
													<span>CURATOR</span><br />
													<h3>{{$raw->CURATER}}</h3>
												</div>
											</div>
										@endif
									@endforeach
									<?php
										}
									?>
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
				<div class="alert alert-danger">
					<span>There are no articles yet.</span>
				</div>
			@endif
		
		</div>
		<!---- start sidebar ---->
			@include('articles.rightbar')
			@section('rightbar')
			@show
		<!----- end sidebar ----------->
	</div>
@stop