@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/assets/css/new/styles.css"></link>
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
					<span class="countrylabel"><b>{{$artcount}}</b> Articles</span>
					<span class="catlabel"><b>{{$cfavorite}}</b> Favorites</span>
				</div>
				<div class="curator-info">
					<div class="message">
						@if(Session::has('message'))
							<span>{{Session::get('message')}}</span>
						@endif
					</div>
					<h4>{{$user->CURATER}}</h4>
					<p>{{$user->CURATER_DESCRIPTION}}</p>
						<br>
					<div class="clear"></div>
					@if(Auth::check())
						@if(Auth::user()->CURATER_ID == $user->CURATER_ID)
							<div class="edit-wrap">
								<p class="edit">
									<a href="{{URL::route('user.edit', $user->CURATER_ID)}}">プロフィールを編集する</a>
								</p>
								<div class="clear"></div>
							</div>
						@endif
					@else
						@if(Hybrid_Auth::isConnectedWith('Facebook'))
							@if('fb'.$profile->identifier == $user->CURATER_ID)
								<div class="edit-wrap">
									<p class="cv-button">
										<a href="{{URL::route('user.edit', $user->CURATER_ID)}}">プロフィールを編集する</a>
									</p>
									<div class="clear"></div>
								</div>
							@endif
						@endif
					@endif
				</div>
				<div class="points-detail">
					<span class="view-span">{{$count}}</span><span>Views</span>
				</div>
				<div class="clear"></div>
			</div>
			<div id="tabs" class="tab1">
				@if(Auth::check())
					@if(Auth::user()->CURATER_ID == $user->CURATER_ID)
						<ul class="own">
							<li><a href="#drafts">DRAFTS</a></li>
							<li><a href="#articles">ARTICLES</a></li>
							<li><a href="#favorites">FAVORITES</a></li>
						</ul>
					@else
						<ul class="unown">
							<li><a href="#articles">ARTICLES</a></li>
							<li><a href="#favorites">FAVORITES</a></li>
						</ul>
					@endif
				@else
					@if(Hybrid_Auth::isConnectedWith('Facebook'))
						@if('fb'.$profile->identifier == $user->CURATER_ID)
							<ul class="own">
									<li><a href="#drafts">DRAFTS</a></li>
									<li><a href="#articles">ARTICLES</a></li>
									<li><a href="#favorites">FAVORITES</a></li>
							</ul>
						@else
							<ul class="unown">
								<li><a href="#articles">ARTICLES</a></li>
								<li><a href="#favorites">FAVORITES</a></li>
							</ul>
						@endif
					@else
						<ul class="unown">
							<li><a href="#articles">ARTICLES</a></li>
							<li><a href="#favorites">FAVORITES</a></li>
						</ul>
					@endif
				@endif
			@if(Auth::check())
				@if(Auth::user()->CURATER_ID == $user->CURATER_ID)
				<div id="drafts">
					@if(count($drafts) != 0)
						<ul class="post-list-thumb">
							@foreach($drafts as $draft)		
								<li>
									@if(Hybrid_Auth::isConnectedWith('Facebook'))
										@if('fb'.$profile->identifier == $draft->CURATER_ID)
											<a href="{{URL::route('article.create', $draft->CURATION_ID)}}" class="post-list-thumb-wrap">
										@else
											<a href="{{URL::route('article.view', $draft->CURATION_ID)}}" class="post-list-thumb-wrap">
										@endif
									@else
										@if(Auth::check())
											@if(Auth::user()->CURATER_ID == $draft->CURATER_ID)
												<a href="{{URL::route('article.create', $draft->CURATION_ID)}}" class="post-list-thumb-wrap">
											@else
												<a href="{{URL::route('article.view', $draft->CURATION_ID)}}" class="post-list-thumb-wrap">
											@endif
										@else
											<a href="{{URL::route('article.view', $draft->CURATION_ID)}}" class="post-list-thumb-wrap">
										@endif
									@endif
										@if($draft->CURATION_IMAGE == "")
											<div class="postimg" style="background-image:url(/assets/images/article-default.png);"></div>
										@else
											<div class="postimg" style="background-image:url({{$draft->CURATION_IMAGE}});"></div>
										@endif
										<div class="labels">
											@foreach($countries as $country)
												@if($country->COUNTRY_ID == $draft->COUNTRY_ID)
													<span class="countrylabel"><i class="fa fa-map-marker"></i> {{$country->COUNTRY_NAME}}</span>
												@endif
											@endforeach
											@foreach($categories as $category)
												@if($category->CATEGORY_ID == $draft->CATEGORY_ID)
													<span class="catlabel"><i class="fa fa-hotel"></i> {{$category->CATEGORY_NAME}}</span>
												@endif
											@endforeach
										</div>
										<div class="desc">
											<h2>{{$draft->CURATION_TITLE}}</h2>
											<p>
												{{$draft->CURATION_DESCRIPTION}}
											</p>
										</div>
										<div class="infobelow">
											<span class="smallpoints smallpoints-left">{{$draft->VIEWS}} views</span>
											<?php
												$exist = strpos($draft->CURATER_ID, 'fb');
												if($exist !== false){
											?>
											@foreach($fbusers as $fbuser)
												@if($fbuser->CURATER_ID == $draft->CURATER_ID)
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
												@if($raw->CURATER_ID == $draft->CURATER_ID)
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
							{{$drafts->links()}}
						</div>		
					<!----- start pagination ------>
					@else
						<div class="alert alert-danger">
							<span>There are no articles yet.</span>
						</div>
					@endif
				</div>
				@endif
			@endif
				<div id="articles">
					@if(count($articles) != 0)
						<ul class="post-list-thumb">
							@foreach($articles as $article)		
								<li>
									@if(Hybrid_Auth::isConnectedWith('Facebook'))
										@if('fb'.$profile->identifier == $article->CURATER_ID)
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
				<div id="favorites">
					@if(count($favorites) != 0)
						<ul class="post-list-thumb">
							@foreach($favorites as $favorite)
								@foreach($allarticles as $allarticle)
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
<script type="text/javascript" src="/assets/js/custom.js"></script>
@stop