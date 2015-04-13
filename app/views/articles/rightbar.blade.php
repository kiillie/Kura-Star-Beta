@section('rightbar')
<div class="sidebox">
	<div class="sideboxcontent ad300">
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
<div class="sideboxcontent rankwrap">
	<h3 class="sidetitle">Ranking Article</h3>
		<ul class="rankarticle">
			<?php $r = 1;?>
			@foreach($rank as $ranking)
			<li>
				<a href="#">
					<span class="rank rank1">{{$r}}</span>
					@if($ranking->CURATION_IMAGE != "")
						<div class="siderankimage"style="background-image:url({{$ranking->CURATION_IMAGE}});"></div>
					@else
						<div class="siderankimage"style="background-image:url(/assets/images/article-default.png);"></div>
					@endif
					<h4 class="ranktitle">{{$ranking->CURATION_TITLE}}</h4>
					<span class="smallpoints smallpoints-right">{{$ranking->VIEWS}} Views</span>
				</a>
			</li>
			<?php $r++; ?>
			@endforeach
		</ul>
</div>
<div class="sideboxcontent rankwrap">
				<h3 class="sidetitle">Ranking Country</h3>
					<ul class="rankarticle rankcountry">
						<?php
							$count = 0;
							$limit = 5;
						?>
					@foreach($ctryrank as $ctry => $val)
						<?php
							if($val == 0){
									break;
							}
							if($count < $limit){
							?>
							@foreach($countries as $country)
								@if($country->COUNTRY_ID == $ctry)
									<li>
										<a href="#">
											<span class="rank rank1">{{$count+1}}</span>
											<h4 class="ranktitle"><img src="{{$country->FLAG_IMAGE}}" />{{$country->COUNTRY_NAME}}</h4>
											<span class="smallpoints smallpoints-right">14,091 Articles</span>
										</a>
									</li>
								@endif
							@endforeach
							<?php
							}
								$count++;
							?>
						@endforeach
						</ul>
			</div>
</div>
@stop