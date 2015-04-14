@section('banner')
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
								<input id="cty" type="text" value="Select A Country" readonly />
							</div>
							<div class="transwrap">
								<input id="cat" type="text" value="Select A Category" readonly />
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
														<li value="{{$country->COUNTRY_ID}}"><a>{{$country->COUNTRY_NAME}}</a></li>
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
												<li value="{{$category->CATEGORY_ID}}"><a>{{$category->CATEGORY_NAME}}</a></li>
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
@stop