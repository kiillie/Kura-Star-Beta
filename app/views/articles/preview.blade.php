@extends('layouts.main')
@section('content')
<script type="text/javascript" src="/assets/js/plugins/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/plugins/jquery.fancybox.css?v=2.1.5" media="screen" /> 
<script>
$(document).ready(function(){
	$(".art-added-img").fancybox({
		openEffect	: 'elastic',
    	closeEffect	: 'elastic',
    	helpers : {
    		title : {
    			type : 'inside'
    		}
    	}
    });

});
</script>
<link rel="stylesheet" href="/assets/css/new/styles.css">
<script>
	$("title").text("{{$article->CURATION_TITLE}}");
	$("head").append('<meta name="description" content="{{addslashes($article->CURATION_DESCRIPTION)}}">');
</script>
<div class="defaultWidth center clear-auto bodycontent">
	<div class="contentbox">
		{{ Breadcrumbs::render('article', $article) }}
				
		<div class="curator-detail-wrap article-detail-wrap">
			<div class="pointer2"></div>
				@if($article->CURATION_IMAGE == "")
					<div class="postimg postimg2" style=""><img src="/assets/images/article-default.png" /></div>
				@else
					<div class="postimg postimg2" style=""><img src="{{$article->CURATION_IMAGE}}" /></div>
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
			<div class="curator-info">
				<h4>{{$article->CURATION_TITLE}}</h4>
				<p>{{$article->CURATION_DESCRIPTION}}</p>
			</div>
			<div class="infobelow">
				<span class="smallpoints smallpoints-left"><img src="/assets/images/social-sample.png" /></span>
				<div class="profile-thumb-wrap">
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
					<?php } ?>
				</div>
			</div>
			<div class="points-detail">
				{{$article->VIEWS}} <span>views</span>
			</div>
			<div class="clear"></div>
		</div>
						
						
		<div class="curator-detail-wrap article-detail-wrap">
			<ul class="post-detail-list">
			{{html_entity_decode($article->CURATION_DETAIL)}}				
			</ul>
							
			<div class="article-curator">
				<span class="social-sample"><img src="/assets/images/social-sample.png"></span>
				<?php
					$exist = strpos($article->CURATER_ID, 'fb');
					if($exist !== false){
				?>
				@foreach($fbusers as $fbuser)
					@if($fbuser->CURATER_ID == $article->CURATER_ID)
						<a href="" class="curator-detail-wrap" style="box-shadow:none; border:solid 1px #ee7500; margin-top:50px;">
							@if($fbuser->CURATER_IMAGE == "")
								<img src="/assets/images/article-default.png">
							@else
								<img src="{{$fbuser->CURATER_IMAGE}}">
							@endif
							<div class="labels labels2">
								<span class="countrylabel"><b>{{$coart[$fbuser->CURATER_ID]}}</b> Articles</span>
								<span class="catlabel"><b>{{$cofave[$fbuser->CURATER_ID]}}</b> Favorites</span>
							</div>
							<div class="curator-info">
								<h4>{{$fbuser->CURATER}}</h4>
								<p>{{$fbuser->CURATER_DESCRIPTION}}</p>
								<div class="clear"></div>
							</div>
							<div class="points-detail">
								{{$article->VIEWS}}<span> Views</span>
							</div>
							<div class="clear"></div>
						</a>
					@endif
				@endforeach
				<?php
					}
					else{
				?>
				@foreach($users as $raw)
					@if($raw->CURATER_ID == $article->CURATER_ID)
						<a href="" class="curator-detail-wrap" style="box-shadow:none; border:solid 1px #ee7500; margin-top:50px;">
							@if($raw->CURATER_IMAGE == "")
								<img src="/assets/images/article-default.png">
							@else
								<img src="{{$raw->CURATER_IMAGE}}">
							@endif
							<div class="labels labels2">
								<span class="countrylabel"><b>{{$coart[$raw->CURATER_ID]}}</b> Articles</span>
								<span class="catlabel"><b>{{$cofave[$raw->CURATER_ID]}}</b> Favorites</span>
							</div>
							<div class="curator-info">
								<h4>{{$raw->CURATER}}</h4>
								<p>{{$raw->CURATER_DESCRIPTION}}</p>
								<div class="clear"></div>
							</div>
							<div class="points-detail">
								{{$article->VIEWS}}<span> VIEWS</span>
							</div>
							<div class="clear"></div>
						</a>
					@endif
				@endforeach
				<?php } ?>
			</div>
							
			<a href="#" class="reportpost"><i class="fa fa-exclamation-triangle"></i>&nbsp; REPORT POST</a>
							
			<div class="clear"></div>
							
		</div>
						
						
	</div>
					
	<!---- start sidebar ---->
		@include('articles.rightbar')
		@section('rightbar')
		@show
	<!----- end sidebar ----------->
					
					
</div>
@stop