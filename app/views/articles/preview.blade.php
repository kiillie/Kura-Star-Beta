@extends('layouts.main')
@section('content')
<link rel="stylesheet" type="text/css" href="/assets/css/temp.css"></link>
<script language="javascript" src="/assets/js/temp_art.js"></script>
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
<div class="container article">
	{{ Breadcrumbs::render('article', $article) }}
	<div class="prev-message alert alert-info"><span>This is a Preview Page. Only the curator can see this page.</span></div>
	<div class="row details">
		<div class="col-md-9 preview">
			<div class="row article-view">
				<div class="col-md-3 art-image">
					@if($article->CURATION_IMAGE == "")
						<img src="/assets/images/article-default.png" alt="{{$article->CURATION_TITLE}}" />
					@else
						<img src="{{$article->CURATION_IMAGE}}" alt="{$article->CURATION_TITLE}}" />
					@endif
				</div>
				<div class="col-md-9">
					<h2>{{$article->CURATION_TITLE}}</h2>
					<h4>Description</h4>
					<p>
						{{$article->CURATION_DESCRIPTION}}
					</p>
					<div class="social">
						<input type="button" class="btn btn-info" value="Like">
						<input type="button" class="btn btn-info" value="Tweet">
						<input type="button" class="btn btn-info" value="Google+">
						<i></i>
						<div class="right">
							<span class="views"><span class="count">{{$article->VIEWS}}</span> Views</span> &nbsp;&nbsp;&nbsp;
							<span class="fave"><a href="javascript:void(0);"><span class="glyphicon glyphicon-heart"></span> Favorite</a></span>
						</div>
					</div>
				</div>
			</div>
			<div class="count-cat">
				<ul class="list-inline">
					@foreach($countries as $country)
						@if($article->COUNTRY_ID == $country->COUNTRY_ID)
							<li class="country"><a href="{{URL::route('article.bycountry', $article->COUNTRY_ID)}}">{{$country->COUNTRY_NAME}}</a></li>
						@endif
					@endforeach
					@foreach($categories as $category)
						@if($article->CATEGORY_ID == $category->CATEGORY_ID)
							<li class="category"><a href="{{URL::route('article.bycategory', $article->CATEGORY_ID)}}">{{$category->CATEGORY_NAME}}</a></li>
						@endif
					@endforeach
				</ul>
			</div>
			<hr></hr>
			<div class="extra-details">
				{{html_entity_decode($article->CURATION_DETAIL)}}
			</div>
			<div class="pages">
				<ul class="pagination">
					<li><a href="#">&laquo;</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul>
			</div>
			<div class="ex-advertisement">
				<img src="/assets/images/Google-Adsense.jpg" alt="Advertisement"/> <img src="/assets/images/Google-Adsense.jpg" alt="Advertisement"/>
			</div>
		</div>
		<div class="col-md-3 right-bar hidden-xs">
			@include('articles.rightbar')
			@section('rightbar')
			@show
		</div>
	</div>
</div>
<script>
function count_image(){
	var count_img = $(".image-container").length;
	var cont = $(".image-container").width();
	for(i = 0; i < count_img; i++){
		$(".image-container img").eq(i).load(function(){
			var pic = new Image();
			pic.src = $(this).attr("src");

			if(pic.width < cont){
				$(this).css("width", pic.width);
			}
			else{
				$(this).css("width", "100%");
			}
		});
	}
}
</script>
@stop