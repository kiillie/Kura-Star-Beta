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
								<?php
									$c = 1;
								?>
								@foreach($rank as $ranking)
									<li>
										<a href="{{URL::route('article.view', $ranking->CURATION_ID)}}">
											<span class="rank rank1">{{$c}}</span>
											@if($ranking->CURATION_IMAGE == "")
												<div class="siderankimage"style="background-image:url(/assets/images/article-default.png);"></div>
											@else
												<div class="siderankimage"style="background-image:url({{$ranking->CURATION_IMAGE}});"></div>
											@endif
											<h4 class="ranktitle">{{$ranking->CURATION_TITLE}}</h4>
											<span class="smallpoints smallpoints-right">{{$ranking->VIEWS}} views</span>
										</a>
									</li>
								<?php
									$c++;
								?>
								@endforeach
							</ul>
						</div>
						<div class="sideboxcontent rankwrap">
							<h3 class="sidetitle">Ranking Country</h3>
							<ul class="rankarticle rankcountry">
								<?php
									$count = 0;
									$limit = 5;
									print_r($ctryrank);
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
											<a href="{{URL::route('article.bycountry', $country->COUNTRY_ID)}}">
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