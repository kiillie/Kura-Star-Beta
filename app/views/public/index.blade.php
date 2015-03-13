@extends('../layouts.main')
@section('content')
<script src="/assets/js/custom.js"></script>
<div class="menu-header">
	<div class="header-slide">
		<div class="header">
			<ul class="bxslider">
				<li><img src="/assets/images/header/header1.jpg" /></li>
				<li><img src="/assets/images/header/header2.jpg" /></li>
				<li><img src="/assets/images/header/header3.jpg" /></li>
			</ul>
		</div>
		<div class="container hidden-xs">
			<div class="search-form">
				<div class="head-search">
					{{Form::open(['name'=>'search', 'role'=>'form', 'method'=>'post', 'route'=>'article.search'])}}
					<div class="country">
							<div class="dropdown">
					       		<button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"><span class="val-select">Select A Country</span> <span class="caret"></span></button>
					        	<input type="hidden" class="sel-id" name="ctry-sel">
					        	<ul class="dropdown-menu nav-ctry" role="menu">
					        		@foreach($continents as $continent)
					        			<li class="disabled">{{$continent->CONTINENT_NAME}}</li>
							    		@foreach($countries as $country)
							    			@if($country->CONTINENT_ID == $continent->CONTINENT_ID)
							    				<li class="item" value="{{$country->COUNTRY_ID}}">{{$country->COUNTRY_NAME}}</li>
							    			@endif
							    		@endforeach
							    	@endforeach
						    	</ul>
						    </div>
						</div>
						<div class="category">
							<div class="dropdown">
						    	<button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"><span class="val-select">Select A Category</span> <span class="caret"></span></button>
					        	<input type="hidden" class="sel-id" name="cat-sel">
					        	<ul class="dropdown-menu nav-cat" role="menu">
									@foreach($categories as $category)
										<li class="item" value="{{$category->CATEGORY_ID}}">{{$category->CATEGORY_NAME}}</li>
									@endforeach
						    	</ul>
						    </div>
						</div>
						<div class="search-btn">
							<input type="submit" class="form-control" href="article.view" value="Search"/>
						</div>
						{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-2 hidden-xs cat-sidebar">
			@include('articles.leftbar')
			@section('leftbar')
			@show
		</div>
		<div class="col-md-7 col-xs-12 latest">
			@if(count($articles) != 0)
				@foreach($articles as $article)
					<div class="latest-group">
						<div class="row">
							<div class="col-md-2 col-xs-6">
								@if($article->CURATION_IMAGE == "")
									<a href="{{URL::route('article.view', $article->CURATION_ID)}}"><img src="/assets/images/article-default.png" alt="Name" /></a>
								@else
									<a href="{{URL::route('article.view', $article->CURATION_ID)}}"><img src="{{$article->CURATION_IMAGE}}" alt="Name" /></a>
								@endif
							</div>
							<div class="col-md-8 col-xs-12">
								<h3><a href="{{URL::route('article.view', $article->CURATION_ID)}}">{{$article->CURATION_TITLE}}</a></h3>
								<hr></hr>
								<p>{{$article->CURATION_DESCRIPTION}}</p>
							</div>
							<div class="col-md-2 user-detail col-xs-12">
								<?php
									$exist = strpos($article->CURATER_ID, 'fb');
									if($exist !== false){
										?>
											@foreach($fbusers as $fbuser)
												@if($fbuser->CURATER_ID == $article->CURATER_ID)
													<span class="hidden-xs"><a href="{{URL::route('user.profile', $article->CURATER_ID)}}">{{$fbuser->CURATER}}</a></span>
													<span class="visible-xs"><i>- <a href="{{URL::route('user.profile', $article->CURATER_ID)}}">{{$fbuser->CURATER}}</a></i></span>
												@endif
											@endforeach
									<?php
									}
									else{
								?>
									@foreach($users as $raw)
										@if($raw->CURATER_ID == $article->CURATER_ID)
											<span class="hidden-xs"><a href="{{URL::route('user.profile', $article->CURATER_ID)}}">{{$raw->CURATER}}</a></span>
											<span class="visible-xs"><i>- <a href="{{URL::route('user.profile', $article->CURATER_ID)}}">{{$raw->CURATER}}</a></i></span>
										@endif
									@endforeach
								<?php
									}
								?>
							</div>
						</div>
						<div class="count-cat">
							<ul class="list-inline">
								@foreach($countries as $country)
									@if($country->COUNTRY_ID == $article->COUNTRY_ID)
										<li class="country"><a href="{{URL::route('article.bycountry', $article->COUNTRY_ID)}}">{{$country->COUNTRY_NAME}}</a></li>
									@endif
								@endforeach
								@foreach($categories as $category)
									@if($category->CATEGORY_ID == $article->CATEGORY_ID)
										<li class="category"><a href="{{URL::route('article.bycategory', $article->CATEGORY_ID)}}">{{$category->CATEGORY_NAME}}</a></li>
									@endif
								@endforeach
							</ul>
						</div>
					</div>
				@endforeach
				<div class="pagination">
						{{$articles->links()}}
					</div>
			@else
				<div class="alert alert-danger">
					<span>There are no articles yet.</span>
				</div>
			@endif
		</div>
		<div class="col-md-3 hidden-xs advertisement">
			<h2>Advertisements</h2>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- Stinger スマホ用 -->
			<ins class="adsbygoogle"
			     style="display:inline-block;width:100%;height:250px"
			     data-ad-client="ca-pub-7072204464883997"
			     data-ad-slot="8045729462"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
	</div>
</div>
@stop