@extends('layouts.main')
@section('content')
<div class="defaultWidth center clear-auto bodycontent">
	<div class="contentbox">
		<div class="breadcrumb"><a href="#">HOME</a> &middot; <a href="#">CURATORS</a> &middot; <span>渡瀬理恵</span></div>
			
			<div class="curator-detail-wrap">
				<div class="pointer2"></div>
				<img src="{{$user->CURATER_IMAGE}}" />
				<div class="labels labels2">
					<span class="countrylabel"><b>{{$count}}</b> Articles</span>
					<span class="catlabel"><b>{{$favorites}}</b> Favorites</span>
				</div>
				<div class="curator-info">
					<h4>{{$user->CURATER}}</h4>
					<p>{{$user->CURATER_DESCRIPTION}}</p>
					<div class="clear"></div>
				</div>
				<div class="points-detail">
					11,600<span>points</span>
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
											<span class="smallpoints smallpoints-left">{{$article->VIEWS}}</span>
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
					<ul class="post-list-thumb">
														<li>
										<a href class="post-list-thumb-wrap">
											<div class="postimg" style="background-image:url(images/post/img1.jpg);"></div>
											<div class="labels">
												<span class="countrylabel"><i class="fa fa-map-marker"></i> Philippines</span>
												<span class="catlabel"><i class="fa fa-hotel"></i> Hotel</span>
											</div>
											<div class="desc">
												<h2>Amora Hotel Jamison and Restaurant</h2>
												<p>
												Located 3 minutes’ walk from Harbourside Shopping Centre, Novotel Sydney Darling Harbour. Located 3 minutes’ walk from Harbourside Shopping Centre, Novotel Sydney Darling Harbour...
												</p>
											</div>
											<div class="infobelow">
												<span class="smallpoints smallpoints-left">14,091 pts</span>
												<div class="profile-thumb-wrap">
													<img src="images/profile/profile1.jpg" />
													<div class="curator">
														<span>CURATOR</span><br />
														<h3>Mitsutaka Suzuki</h3>
													</div>
												</div>
											</div>
										</a>
									</li>
																		<li>
										<a href class="post-list-thumb-wrap">
											<div class="postimg" style="background-image:url(images/post/img1.jpg);"></div>
											<div class="labels">
												<span class="countrylabel"><i class="fa fa-map-marker"></i> Philippines</span>
												<span class="catlabel"><i class="fa fa-hotel"></i> Hotel</span>
											</div>
											<div class="desc">
												<h2>Amora Hotel Jamison and Restaurant</h2>
												<p>
												Located 3 minutes’ walk from Harbourside Shopping Centre, Novotel Sydney Darling Harbour. Located 3 minutes’ walk from Harbourside Shopping Centre, Novotel Sydney Darling Harbour...
												</p>
											</div>
											<div class="infobelow">
												<span class="smallpoints smallpoints-left">14,091 pts</span>
												<div class="profile-thumb-wrap">
													<img src="images/profile/profile1.jpg" />
													<div class="curator">
														<span>CURATOR</span><br />
														<h3>Mitsutaka Suzuki</h3>
													</div>
												</div>
											</div>
										</a>
									</li>
																		<li>
										<a href class="post-list-thumb-wrap">
											<div class="postimg" style="background-image:url(images/post/img1.jpg);"></div>
											<div class="labels">
												<span class="countrylabel"><i class="fa fa-map-marker"></i> Philippines</span>
												<span class="catlabel"><i class="fa fa-hotel"></i> Hotel</span>
											</div>
											<div class="desc">
												<h2>Amora Hotel Jamison and Restaurant</h2>
												<p>
												Located 3 minutes’ walk from Harbourside Shopping Centre, Novotel Sydney Darling Harbour. Located 3 minutes’ walk from Harbourside Shopping Centre, Novotel Sydney Darling Harbour...
												</p>
											</div>
											<div class="infobelow">
												<span class="smallpoints smallpoints-left">14,091 pts</span>
												<div class="profile-thumb-wrap">
													<img src="images/profile/profile1.jpg" />
													<div class="curator">
														<span>CURATOR</span><br />
														<h3>Mitsutaka Suzuki</h3>
													</div>
												</div>
											</div>
										</a>
									</li>
																	</ul>
								
								<!----- start pagination ------>
								
								<div class="pagination">
									<a href="#" class="selected">1</a>
									<a href="#">2</a>
									<a href="#">3</a>
									<a href="#">4</a>
								</div>
								<!----- start pagination ------>
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