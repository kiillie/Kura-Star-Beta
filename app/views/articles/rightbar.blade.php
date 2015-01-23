@section('rightbar')
<div class="advertisement">
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
<div class="rank-article">
	<div class="rank-title"><h4>Ranking Article</h4><hr></hr></div>
	<ul>
		@foreach($rank as $ranking)
			<li><span class="glyphicon glyphicon-bookmark"></span> <a href="{{URL::route('article.view', $ranking->CURATION_ID)}}"><img src="/assets/images/rank-article-default.png" alt="Title" /> {{$ranking->CURATION_TITLE}}</a></li>
		@endforeach
	</ul>
</div>
<div class="rank-country">
	<div class="rank-title"><h4>Ranking Country</h4><hr></hr></div>
	<ul>
		<?php
			$count = 0;
			$limit = 5;

		?>
		@foreach($ctryrank as $ctry => $val)
		<?php 
		if($count < $limit){
		?>
		@foreach($countries as $country)
			@if($country->COUNTRY_ID == $ctry)
			<li><span class="glyphicon glyphicon-bookmark"></span><a href="{{URL::route('article.bycountry', $country->COUNTRY_ID)}}"><img src="/assets/images/rank-article-default.png" />{{$country->COUNTRY_NAME}}</a></li>
			@endif
		@endforeach
		<?php
		}
		$count++;

			?>

		@endforeach
	</ul>
</div>
@stop