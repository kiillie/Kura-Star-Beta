@extends('layouts.main')
@section('content')
<div class="defaultWidth center clear-auto bodycontent">
	<div class="contentbox">
		@if(count($curators) != 0)
			<ul class="post-list-thumb curator-list-thumb">
				@foreach($curators as $curator)
					<?php
						$exist = strpos($curator->CURATER_ID, 'fb');
						if($exist !== false){
					?>
					@foreach($fbusers as $fbuser)
						@if($fbuser->CURATER_ID == $curator->CURATER_ID)
							<li>
								<a href="{{URL::route('user.profile', $fbuser->CURATER_ID)}}" class="post-list-thumb-wrap curator-list">
									<div class="infobelow">
													
										@if($fbuser->CURATER_IMAGE != "")
											<div class="curator-img">
												<img src="{{$fbuser->CURATER_IMAGE}}" />
											</div>
										@else
											<div class="curator-img">
												<img src="/assets/images/picture-default.png" />
											</div>
										@endif
											<div class="curator-info">
												<h4>{{$fbuser->CURATER}}</h4>
												<p>{{$fbuser->CURATER_DESCRIPTION}}</p>
												<div class="clear"></div>
											</div>
																			
										<span class="smallpoints smallpoints-right"> articles</span>
														
									</div>
								</a>
							</li>
						@endif
					@endforeach
					<?php
						}
						else{
					?>
					@foreach($users as $raw)
						@if($raw->CURATER_ID == $curator->CURATER_ID)
							<li>
								<a href="{{URL::route('user.profile', $raw->CURATER_ID)}}" class="post-list-thumb-wrap curator-list">
									<div class="infobelow">
													
										@if($raw->CURATER_IMAGE != "")
											<div class="curator-img">
												<img src="{{$raw->CURATER_IMAGE}}" />
											</div>
										@else
											<div class="curator-img">
												<img src="/assets/images/picture-default.png" />
											</div>
										@endif
											<div class="curator-info">
												<h4>{{$raw->CURATER}}</h4>
												<p>{{$raw->CURATER_DESCRIPTION}}</p>
												<div class="clear"></div>
											</div>
																		
																	
										<span class="smallpoints smallpoints-right"> articles</span>
														
									</div>
								</a>
							</li>
						@endif
					@endforeach
					<?php
						}
					?>
				@endforeach
			</ul>
			<!---- start pagination ---->
				<div class="pagination">
					{{$curators->links()}}
				</div>	
			<!----- end pagination ----------->
		@else
			<div class="alert alert-danger"></div>
		@endif
							
	</div>
					
	<!---- start sidebar ---->
		@include('articles.rightbar')
		@section('rightbar')
		@show
	<!----- end sidebar ----------->
</div>
@stop