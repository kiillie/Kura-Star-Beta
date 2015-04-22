@extends('layouts.main')
@section('content')
<div class="defaultWidth center clear-auto bodycontent">
	<div class="contentbox">
	{{ Breadcrumbs::render('profile', $user) }}
			
			<div class="curator-detail-wrap">
				<div class="pointer2"></div>
				@if($user->CURATER_IMAGE == "")
					<img src="/assets/images/picture-default.png" />
				@else
					<img src="{{$user->CURATER_IMAGE}}" />
				@endif
				<div class="labels labels2">
					<span class="countrylabel"><b>{{$count}}</b> Articles</span>
					<span class="catlabel"><b>{{$cfavorite}}</b> Favorites</span>
				</div>
				<div class="curator-info">
					<h4>{{$user->CURATER}}</h4>
					<p>{{$user->CURATER_DESCRIPTION}}</p>
					<div class="clear"></div>
				</div>
				<div class="points-detail">
					{{$count}}<span>Articles</span>
				</div>
				<div class="clear"></div>
			</div>
						
			<div id="tabs" class="tab1">
				<ul>
					<li><a href="#tabs-1">ARTICLES</a></li>
					<li><a href="#tabs-2">FAVORITES</a></li>
				</ul>
				<div id="tabs-1">
					@if(count($articles) != 0)
						<ul class="post-list-thumb">
							@foreach($articles as $article)		
								<li>
									@if(Hybrid_Auth::isConnectedWith('Facebook'))
										@if('fb'.$profile->identifier() == $article->CURATER_ID)
											<a href="{{URL::route('article.create', $article->CURATION_ID)}}" class="post-list-thumb-wrap">
										@else
											<a href="{{URL::route('article.view', $article->CURATION_ID)}}" class="post-list-thumb-wrap">
										@endif
									@else
										@if(Auth::check())
											@if(Auth::user()->CURATER_ID == $article->CURATER_ID)
												<a href="{{URL::route('article.create', $article->CURATION_ID)}}" class="post-list-thumb-wrap">
											@else
												<a href="{{URL::route('article.view', $article->CURATION_ID)}}" class="post-list-thumb-wrap">
											@endif
										@else
											<a href="{{URL::route('article.view', $article->CURATION_ID)}}" class="post-list-thumb-wrap">
										@endif
									@endif
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
				<div id="tabs-2">
					@foreach($favorites as $favorite)
						{{$favorite->CURATION_ID}}
					@endforeach
					@if(count($favorites) != 0)
						<ul class="post-list-thumb">
							@foreach($favorites as $favorite)
								@foreach($allarticles as $allarticle)
								{{$allarticle->CURATION_ID}}
									@if($favorite->CURATION_ID == $allarticle->CURATION_ID)
										<li>
											<a href="{{URL::route('article.view', $allarticle->CURATION_ID)}}" class="post-list-thumb-wrap">
												@if($allarticle->CURATION_IMAGE == "")
													<div class="postimg" style="background-image:url(/assets/images/article-default.png);"></div>
												@else
													<div class="postimg" style="background-image:url({{$allarticle->CURATION_IMAGE}});"></div>
												@endif
												<div class="labels">
													@foreach($countries as $country)
														@if($country->COUNTRY_ID == $allarticle->COUNTRY_ID)
															<span class="countrylabel"><i class="fa fa-map-marker"></i> {{$country->COUNTRY_NAME}}</span>
														@endif
													@endforeach
													@foreach($categories as $category)
														@if($category->CATEGORY_ID == $allarticle->CATEGORY_ID)
															<span class="catlabel"><i class="fa fa-hotel"></i> {{$category->CATEGORY_NAME}}</span>
														@endif
													@endforeach
												</div>
												<div class="desc">
													<h2>{{$allarticle->CURATION_TITLE}}</h2>
													<p>
														{{$allarticle->CURATION_DESCRIPTION}}
													</p>
												</div>
												<div class="infobelow">
													<span class="smallpoints smallpoints-left">{{$allarticle->VIEWS}} views</span>
													<?php
														$exist = strpos($allarticle->CURATER_ID, 'fb');
														if($exist !== false){
													?>
													@foreach($fbusers as $fbuser)
														@if($fbuser->CURATER_ID == $allarticle->CURATER_ID)
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
														@if($raw->CURATER_ID == $allarticle->CURATER_ID)
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
													<?php } ?>
												</div>
											</a>
										</li>
									@endif
								@endforeach
							@endforeach
						</ul>
						<!----- start pagination ------>
							<div class="pagination">
								{{$favorites->links()}}
							</div>		
						<!----- start pagination ------>
					@else
						<div class="alert alert-danger">
							<span>There are no favorited articles yet.</span>
						</div>
					@endif
							</div>
							
						</div>							
						
					</div>
					
	<!---- start sidebar ---->
		@include('articles.rightbar')
		@section('rightbar')
		@show
	<!----- end sidebar ----------->			
</div>
@stop