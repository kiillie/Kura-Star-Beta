@extends('../layouts.main')
@section('content')
<!--------------------start main banner ------------------------->	
				<div class="mainbanner">
					<div class="flexslider">
						<ul class="slides">
							<li><img src="/assets/images/new/main_image.jpg" /></li>
							<li><img src="/assets/images/new/main_image2.jpg" /></li>
						</ul>
					</div>
					<div class="defaultWidth center searchwrap">
					{{Form::open(['name'=>'search', 'role'=>'form', 'method'=>'post', 'route'=>'article.search'])}}
						<div class="searchwrap-inner">
							<div class="transwrap">
								<input id="cty" type="text" value="Select a Country" readonly />
							</div>
							<div class="transwrap">
								<input id="cat" type="text" value="Select a Category" readonly />
							</div>
							<input type="submit" class="search-btn" value="" />
							
							<div class="dropcountry">
							<div class="pointer"></div>
							
							<div class="mCustomScrollbar light" data-mcs-theme="minimal-dark">
							
							<div class="droplistcountry">
								<input type="hidden" class="sel-id ctry" name="ctry-sel"/>
								@foreach($continents as $continent)
									<div>
								        <h4>{{$continent->CONTINENT_NAME}}</h4>
								        <ul>
										@foreach($countries as $country)
											@if($country->CONTINENT_ID == $continent->CONTINENT_ID)
												<li class="item" value="{{$country->COUNTRY_ID}}"><a>{{$country->COUNTRY_NAME}}</a></li>
											@endif
										@endforeach
										</ul>
									</div>
								@endforeach
								<div></div>
							</div>
		
							</div>
							
							</div>
							
							
							<div class="dropcategory">
							<div class="pointer"></div>
							
							<div class="mCustomScrollbar light" data-mcs-theme="minimal-dark">
								
							
								<div class="droplistcategory">
									<input type="hidden" class="sel-id cat" name="cat-sel" />
									<div>
										<ul>
											@foreach($categories as $category)
											<li class="item" value="{{$category->CATEGORY_ID}}"><a>{{$category->CATEGORY_NAME}}</a></li>
											@endforeach
										</ul>
									</div>
									<div></div>
								</div>
							
							
							
							
							</div>
							
							</div>
							
						</div>
					{{Form::close()}}
					</div>
				</div>
<!--------------------end main banner ------------------------->					
				
				<!-------------->
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