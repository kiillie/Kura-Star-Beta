@extends('layouts.main')
@section('content')
<div class="defaultWidth center clear-auto bodycontent">
	<div class="contentbox nosidebar">
		<div class="breadcrumb"><a href="#">HOME</a> &middot; <span>CREATE</span></div>
						
		<div class="divider"><span>fill up custom post below</span></div>
		<div class="createform">
			<div class="custompost">
				<div class="linewrap">
					<div class="leftbox">
						<label>image preview</label>
						@if($article->CURATION_IMAGE == "")
							<div class="imgplaceholder"><img src="/assets/images/new/blank-img.png" alt="{{$article->CURATION_TITLE}}" /></div>
						@else
							<div class="imgplaceholder"><img src="{{$article->CURATION_IMAGE}}" alt="{{$article->CURATION_TITLE}}" /></div>
						@endif
						{{Form::open(['name'=>'insert-img', 'class'=>'img-form', 'role'=>'form', 'method'=>'post', 'enctype'=>'multipart/form-data', 'url' => 'article/image'])}}
							<div class="img-upload col-md-4" style="display:none;">
								<label>Upload a File</label>
								<input type="file" id="inputFile" />
							</div>
							<div class="img-url">
								<label>Paste Image Link Below</label>
								<input type="text" id="inputFile2" class="urllink" />
							</div>
							<div class="img-btns">
								<input type="submit" class="btn btn-default art-url-submit" name="art-submit" value="Set">
								<a href="javascript:void(0)" class="disp-def" onclick="select_type_img()">Click to Upload an Image</a>
							</div>
						{{Form::close()}}
					</div>
					{{ Form::open(['name'=>'article', 'role'=>'form', 'route'=>'article.store', 'method'=>'post', 'enctype'=>"multipart/form-data"]) }}
					<div class="rightbox">
									
						<div class="linewrap">
							<div class="leftbox leftbox2">
								<label>Select A Country</label>
								<select id="cty">
									@foreach($continents as $continent)
					        			<option disabled>-----{{$continent->CONTINENT_NAME}}-----</li>
							    		@foreach($countries as $country)
							    			@if($country->CONTINENT_ID == $continent->CONTINENT_ID)
												@if($article->COUNTRY_ID == $country->COUNTRY_ID)
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
											<option value="{{$category->CATEGORY_ID}}">{{$category->CATEGORY_NAME}}</li>
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
						@if(Session::has('curation'))
								<input type="hidden" class="cur-id" name="cur_id" value="{{Session::get('curation')}}">
						@else
						<input type="hidden" class="cur-id" name="cur_id" value="{{$curation}}">
						@endif
					{{Form::close()}}
				</div>
			</div>
							
			<div class="divider"><span>or fill up reference post below</span></div>
							
			<div class="referpost">
									
								
				<div id="tabs" class="tab1 tab2">
					<ul>
						<li><a onclick="edit_addon('0', 'text', 'addon', 'new', 'new')" href="#text">TEXT</a></li>
						<li><a onclick="edit_addon('0', 'picture', 'addon', 'new', 'new')" href="#picture">PICTURE</a></li>
						<li><a onclick="edit_addon('0', 'reference', 'addon', 'new', 'new')" href="#reference">REFERENCE</a></li>
						<li><a onclick="edit_addon('0', 'link', 'addon', 'new', 'new')" href="#link">LINK</a></li>
						<li><a onclick="edit_addon('0', 'twitter', 'addon', 'new', 'new')" href="#twitter">TWITTER</a></li>
						<li><a onclick="edit_addon('0', 'video', 'addon', 'new', 'new')" href="#video">YOUTUBE</a></li>
						<li><a onclick="edit_addon('0', 'tag', 'addon', 'new', 'new')" href="#tag">H2 TAG</a></li>
					</ul>
									
					<div class="post-list-thumb">
									
						<div id="text">
							<div class="new-addon row">
								<div class="new-item">
								</div>
							</div>
						</div>
						<div id="picture">
							<div class="new-addon row">
								<div class="new-item">
								</div>
							</div>
						</div>
						<div id="reference">
							<div class="new-addon row">
								<div class="new-item">
								</div>
							</div>
						</div>
						<div id="link">
							<div class="new-addon row">
								<div class="new-item">
								</div>
							</div>
						</div>
						<div id="twitter">
							<div class="new-addon row">
								<div class="new-item">
								</div>
							</div>
						</div>
						<div id="video">
							<div class="new-addon row">
								<div class="new-item">
								</div>
							</div>
						</div>
						<div id="tag">
							<div class="new-addon row">
								<div class="new-item">
								</div>
							</div>
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
		</div>
		<div class="createbtn">
			@if(Session::has('curation'))
				<input class="btn btn-default preview" href="{{URL::route('article.preview', Session::get('curation'))}}" value="Preview" />
			@else
				<input class="btn btn-default preview" href="{{URL::route('article.preview', $curation)}}" value="Preview" />
			@endif
			<input type="submit" class="btn btn-default save" onclick="validate_article()" value="Save" />
			@if(Session::has('curation'))
				@if(Session::has('status'))
					@if(Session::get('status') == 0)
						<input type="button" class="btn btn-default publish unpublished" onclick="publish_article({{Session::get('curation')}})" value="Publish" />
					@else
						<input type="button" class="btn btn-default publish published" onclick="publish_article({{Session::get('curation')}})" value="Unpublish" />
					@endif
				@else
					@if(($status) == 0)
						<input type="button" class="btn btn-default publish unpublished" onclick="publish_article({{Session::get('curation')}})" value="Publish" />
					@else
						<input type="button" class="btn btn-default publish published" onclick="publish_article({{Session::get('curation')}})" value="Unpublish" />
					@endif
				@endif
			@else
				@if(Session::has('status'))
					@if(Session::get('status') == 0)
						<input type="button" class="btn btn-default publish unpublished" onclick="publish_article({{$curation}})" value="Publish" />
					@else
						<input type="button" class="btn btn-default publish published" onclick="publish_article({{$curation}})" value="Unpublish" />
					@endif
				@else
					@if(($status) == 0)
						<input type="button" class="btn btn-default publish unpublished" onclick="publish_article({{$curation}})" value="Publish" />
					@else
						<input type="button" class="btn btn-default publish published" onclick="publish_article({{$curation}})" value="Unpublish" />
					@endif
				@endif
			@endif
			@if(Session::has('curation'))
				<input type="button" class="btn btn-default delete" value="Delete" onclick="delete_article({{Session::get('curation')}}, {{$article->CURATER_ID}})" />
			@else
				<input type="button" class="btn btn-default delete" value="Delete" onclick="delete_article({{$curation}}, {{$article->CURATER_ID}})" />
			@endif
		</div>		
												
						
						
	</div>
					
					<!---- start sidebar ---->
					<!----- end sidebar ----------->
					
					
</div>
<script language="javascript" src="/assets/js/create.js"></script>
<script language="javascript" src="/assets/js/temp_art.js"></script>
<script language="javascript" src="/assets/js/article.js"></script>
@stop