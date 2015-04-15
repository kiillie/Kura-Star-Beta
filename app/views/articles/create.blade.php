@extends('layouts.main')
@section('content')
<div class="defaultWidth center clear-auto bodycontent">
	<div class="contentbox nosidebar">
		<div class="breadcrumb"><a href="#">HOME</a> &middot; <span>CREATE</span></div>
						
		<div class="divider"><span>fill up custom post below</span></div>
		<form class="createform">
			<div class="custompost">
				<div class="linewrap">
					<div class="leftbox">
						<label>image preview</label>
						<div class="imgplaceholder"></div>
						<input type="file" id="inputFile" />
						<label>or paste image link below</label>
						<input type="text" id="inputFile2" class="urllink" />
					</div>
					<div class="rightbox">
									
						<div class="linewrap">
							<div class="leftbox leftbox2">
								<label>Select A Country</label>
								<select id="cty">
									@foreach($continents as $continent)
					        			<option disabled>-----{{$continent->CONTINENT_NAME}}-----</li>
							    		@foreach($countries as $country)
							    			@if($country->CONTINENT_ID == $continent->CONTINENT_ID)
												@if($article->CONTINENT_ID == $country->COUNTRY_ID)
													<option selected value="{{$country->COUNTRY_ID}}">{{$country->COUNTRY_NAME}}</li>
												@else
													<option value="{{$country->COUNTRY_ID}}">{{$country->COUNTRY_NAME}}</li>
												@endif
							    			@endif
							    		@endforeach
							    	@endforeach
								</select>
							</div>
							<div class="leftbox leftbox2">
								<label>Select A Category</label>
								<select id="cat">
									@foreach($categories as $category)
										@if($article->CATEGORY_ID == $category->CATEGORY_ID)
											<option selected value="{{$category->CATEGORY_ID}}">{{$category->CATEGORY_NAME}}</option>
										@else
											<option value="{{$country->COUNTRY_ID}}">{{$country->COUNTRY_NAME}}</li>
										@endif
									@endforeach
								</select>
							</div>
						</div>
											
						<label>details</label>
						<input type="text" placeholder="Title" value="{{$article->CURATION_TITLE}}"/>
					</div>
					<div class="rightbox">
						<label>limit to 150 characters only</label>
						<textarea placeholder="Description" maxlength="150">{{$article->CURATION_DESCRIPTION}}</textarea>
					</div>
				</div>
			</div>
							
			<div class="divider"><span>or fill up reference post below</span></div>
							
			<div class="referpost">
									
								
				<div id="tabs" class="tab1 tab2">
					<ul>
						<li><a onclick="edit_addon('0', 'text', 'addon', 'new', 'new')" href="#tabs-1">TEXT</a></li>
						<li><a onclick="edit_addon('0', 'picture', 'addon', 'new', 'new')" href="#tabs-2">PICTURE</a></li>
						<li><a onclick="edit_addon('0', 'reference', 'addon', 'new', 'new')" href="#tabs-3">REFERENCE</a></li>
						<li><a onclick="edit_addon('0', 'link', 'addon', 'new', 'new')" href="#tabs-4">LINK</a></li>
						<li><a onclick="edit_addon('0', 'twitter', 'addon', 'new', 'new')" href="#tabs-5">TWITTER</a></li>
						<li><a onclick="edit_addon('0', 'video', 'addon', 'new', 'new')" href="#tabs-6">YOUTUBE</a></li>
						<li><a onclick="edit_addon('0', 'tag', 'addon', 'new', 'new')" href="#tabs-7">H2 TAG</a></li>
					</ul>
									
					<div class="post-list-thumb">
									
						<div id="tabs-1">
							<form method="POST" action="http://kurastar.com/addon/new" accept-charset="UTF-8" name="text"><input name="_token" type="hidden" value="mtZ6Khq6VWMElrQphPwayqmVkoSsEgSmNTcT9nSn"><textarea placeholder="Put your text here" class="form-control texts"></textarea><input type="button" value="Add" class="btn btn-default add" onclick="addItem('0', 'text', 'new')"><input type="button" class="btn btn-default cancel" value="Cancel" onclick="cancel_add('0', 'text', 'new')"><input type="hidden" class="type" value="0"></form>										</div>
						<div id="tabs-2">
							<p>content</p>
						</div>
						<div id="tabs-3">
							<form method="POST" action="http://kurastar.com/addon/new" accept-charset="UTF-8" name="reference"><input name="_token" type="hidden" value="mtZ6Khq6VWMElrQphPwayqmVkoSsEgSmNTcT9nSn"><textarea class="form-control ref-desc" name="ref-desc" placeholder="Add a description"></textarea><input type="text" placeholder="Please put the URL of the reference" class="form-control ref-url"><input type="button" class="btn btn-default" value="Add" onclick="addItem('0', 'reference', 'new')"><input type="button" class="btn btn-default" value="Cancel" onclick="cancel_add('0', 'reference', 'new')"></form>
						</div>
						<div id="tabs-4">
							<form method="POST" action="http://kurastar.com/addon/new" accept-charset="UTF-8" name="link"><input name="_token" type="hidden" value="mtZ6Khq6VWMElrQphPwayqmVkoSsEgSmNTcT9nSn"><div class="link-wrap"><input type="text" class="form-control link-url" placeholder="URL of the Link"><input type="button" class="btn btn-default check-link" value="Check" onclick="link_check('0', 'link', 'new')"><input type="button" class="btn btn-default cancel-link" onclick="cancel_add('0', 'link', 'new')" value="Cancel"></div></form>
						</div>
						<div id="tabs-5">
							<form method="POST" action="http://kurastar.com/addon/new" accept-charset="UTF-8" name="twitter"><input name="_token" type="hidden" value="mtZ6Khq6VWMElrQphPwayqmVkoSsEgSmNTcT9nSn"><input type="text" class="form-control url-tweet" placeholder="Put the URL of a tweet here"><a href="javascript:void(0)" onclick="addclass_modal('new-tweet', 0)" data-toggle="modal" data-target="#twitterSearch"><span class="glyphicon glyphicon-search"></span>Search for tweets.</a><br><br><input type="button" class="btn btn-default check-tweet" onclick="addItem('0', 'twitter', 'new')" value="Add"><input type="button" class="btn btn-default" onclick="cancel_add('0', 'twitter', 'new')" value="Cancel"></form>
						</div>
						<div id="tabs-6">
							<form method="POST" action="http://kurastar.com/addon/new" accept-charset="UTF-8" name="video"><input name="_token" type="hidden" value="mtZ6Khq6VWMElrQphPwayqmVkoSsEgSmNTcT9nSn"><div class="vid-url-container"><input type="text" class="vid-url form-control" placeholder="Video URL"><input type="button" value="Check" class="btn btn-default add" onclick="extract_video('0', 'video', 'new')"><input type="button" value="Cancel" class="btn btn-default" onclick="cancel_add('0', 'video', 'new')"></div></form>
						</div>
						<div id="tabs-7">
							<form method="POST" action="http://kurastar.com/addon/new" accept-charset="UTF-8" name="tag"><input name="_token" type="hidden" value="mtZ6Khq6VWMElrQphPwayqmVkoSsEgSmNTcT9nSn"><select class="form-control tag-heading" onchange="select_htype('0', 'tag', 'new')"><option value="normal">Normal Heading</option><option value="sub">Subheading</option></select><span class="tag-bullet" style="color: rgba(237, 113, 0, 1);">■</span><input type="text" class="form-control tag" placeholder="Tag Title"><hr class="tag-hr" style="border-color: rgba(237, 113, 0, 1)"><input type="button" value="Add" class="btn btn-default add" onclick="addItem('0', 'tag', 'new')"><input type="button" class="btn btn-default cancel" onclick="cancel_add('0', 'tag', 'new')" value="Cancel"></form>
						</div>
									
					</div>
									
				</div>						
								
				<div class="addons-container">
					<ul class="sortable list-unstyled">
						<?php
							try{
								echo file_get_contents(public_path()."/assets/articles/".$curation.".php");
							}
							catch(Exception $e){
								fopen(public_path()."/assets/articles/".$curation.".php", "w");
							}
						?>
					</ul>
				</div>
							
								
			</div>
		</form>
						
												
						
						
	</div>
					
					<!---- start sidebar ---->
					<!----- end sidebar ----------->
					
					
</div>
<script language="javascript" src="/assets/js/create.js"></script>
@stop