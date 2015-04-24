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
	$(window).load(function(){
		$(".avgrund-popup").css("top", $(this).scrollTop()+300);
	});
	function openDialog(type) {
		if(type == 'google'){
			$("#google-search").css("display", "block");
			Avgrund.show( "#google-search" );
			$("#google-search .img-text").val("");
			$("#google-search #contentwrapper").html("<ul id='content' class='post-list-thumb'></ul>");
		}
		else if('twitter'){
			$("#twitter-search").css("display", "block");
			$("#twitter-search .tweet-results").html("");
			$("#twitter-search .search-value").val("");
			Avgrund.show("#twitter-search");
			
		}
	}
	function closeDialog() {
		$("#google-search .img-text").val("");
		$("#google-search #contentwrapper").html("<ul id='content' class='post-list-thumb'></ul>");
		Avgrund.hide();
	}
</script>
<div class="defaultWidth center clear-auto bodycontent">
	<div class="contentbox nosidebar">
		{{ Breadcrumbs::render('create') }}
		
		<div class="divider"><span>fill up custom post below</span></div>
		<div class="createform">
			<div class="custompost">
				<div class="linewrap">
					<div class="leftbox">
						<label>Image Preview</label>
						@if($article->CURATION_IMAGE == "")
							<div class="imgplaceholder"><img src="/assets/images/new/blank-img.png" alt="{{$article->CURATION_TITLE}}" /></div>
						@else
							<div class="imgplaceholder"><img src="{{$article->CURATION_IMAGE}}" alt="{{$article->CURATION_TITLE}}" /></div>
						@endif
						{{Form::open(['name'=>'insert-img', 'class'=>'img-form', 'role'=>'form', 'method'=>'post', 'enctype'=>'multipart/form-data', 'url' => 'article/image'])}}
							<div class="img-upload col-md-4" style="display:none;">
								<label>Upload a File</label>
								<input type="file" id="inputFile" name="imgUp" accept="image/*"/>
							</div>
							<div class="img-url">
								<label>Paste Image Link Below</label>
								<input type="text" id="inputFile2" name="imageUrl" class="urllink" placeholder="URL" />
							</div>
							<div class="img-btns" style="text-align: center;">
								<input type="submit" class="btn btn-default art-url-submit" name="art-submit" value="Set"><br/>
								<a href="javascript:void(0)" class="disp-def artimage" onclick="select_type_img()">Click to Upload an Image</a><br/>
								<span>or</span><br/>
								<a href="javascript:openDialog('google')" onclick="add_img_class(0, 'picture', 'main')"><span class="glyphicon glyphicon-search"></span> Search for Image</a>
								<input type="hidden" class="google-img" name="google-main" />
							</div>
							@if(Session::has('curation'))
								<input type="hidden" class="cur-id" name="cur_id" value="{{Session::get('curation')}}">
							@else
								<input type="hidden" class="cur-id" name="cur_id" value="{{$curation}}">
							@endif
						{{Form::close()}}
					</div>
					{{ Form::open(['name'=>'article', 'role'=>'form', 'route'=>'article.store', 'method'=>'post', 'enctype'=>"multipart/form-data"]) }}
					<div class="rightbox">
									
						<div class="linewrap">
							<div class="leftbox leftbox2">
								<label>Select A Country</label>
								<select id="cty" name="country">
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
								<select id="cat" name="category">
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
						<input type="text" placeholder="Title" name="title" value="{{$article->CURATION_TITLE}}"/>
					</div>
					<div class="rightbox">
						<label>limit to <span class="num-char">0</span>/150 characters only</label>
						<textarea placeholder="Description" class="artdesc" name="description" maxlength="150">{{$article->CURATION_DESCRIPTION}}</textarea>
					</div>
						@if(Session::has('curation'))
							<input type="hidden" class="cur-id" name="cur_id" value="{{Session::get('curation')}}">
						@else
							<input type="hidden" class="cur-id" name="cur_id" value="{{$curation}}">
						@endif
				</div>
				<div class="createbtn">
						@if(Session::has('curation'))
							<a href="{{URL::route('article.preview', Session::get('curation'))}}"><input class="btn btn-default preview" type="button" href="{{URL::route('article.preview', Session::get('curation'))}}" value="Preview" /></a>
						@else
							<a href="{{URL::route('article.preview', $curation)}}"><input class="btn btn-default preview" type="button" href="{{URL::route('article.preview', $curation)}}" value="Preview" /></a>
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
					<?php
						try{
							$html = file_get_contents(public_path().'/assets/articles/'.$article->CURATION_ID.".php");
							$dom = new DOMDocument();
							$html = trim($html);
							if($html == "" && $article->CURATION_DETAIL != ""){
								$dom->loadHtml(html_entity_decode($article->CURATION_DETAIL));
								$length = $dom->getElementsByTagName("li")->length;
								$classes = [];
								$c = 0;

								foreach($dom->getElementsByTagName('div') as $div){
									if($div->getAttribute('class') == 'image-container'){
										$classes[$c] = "picture";
									}
									else{
										$classes[$c] = $div->getAttribute('class');
									}
									$c++;
									echo $div->getAttribute('class');
								}
								$xpath = new DOMXpath($dom); 
								$divTag = $xpath->evaluate("//li//div"); 
								$content = "";
								for($i = 0; $i < $length; $i++){

									$divcontent = $divTag->item($i);
									$content .= '<li class="ui-state-default added-addon">';
									$content .= '<div class="item-added-container">';
									$content .= '<div class="item-inner text">';
									$content .= $dom->saveXML($divcontent);
									$content .= '</div>';
									$content .= '<div class="editlist">';
									$content .= '<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>';
									$content .= '</div>';
									$content .= '</div>';
									$content .= '<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div>';
									$content .= '<input type="hidden" class="type" value="'.$classes[$i].'">';
									$content .= '</li>';
									
									//echo $dom->saveXML($divcontent);
								}
								$file = fopen(public_path().'/assets/articles/'.$article->CURATION_ID.".php", "w");
								fwrite($file, $content);
								fclose($file);
							}
						}
						catch(Exception $e){
							fopen(public_path().'/assets/articles/'.$article->CURATION_ID.".php", "w");
						}
						?>
				<textarea name="inner-detail" class="detail-li" style="display:none;">{{$article->CURATION_DETAIL}}</textarea>
					{{Form::close()}}
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
												
						
						
	</div>
	<div id="twitter-search" class="avgrund-popup" title="Search for Tweets" style="display: none;">
		@include('articles.twitter_search')
		@section('twitterSearch')
		@show
	</div>
	
	<div class="image-search avgrund-popup" id="google-search" title="Search for Image" style="display: none;">
		@include('articles.image_search')
		@section('imageSearch')
		@show
	</div>
	
	
					
					<!---- start sidebar ---->
					
					<!----- end sidebar ----------->		
</div>
<div class="avgrund-cover"></div>
<script language="javascript" src="/assets/js/create.js"></script>
<script language="javascript" src="/assets/js/temp_art.js"></script>
<script language="javascript" src="/assets/js/article.js"></script>
<script language="javascript" src="/assets/js/linkScrapper.min.js"></script>
<script language="javascript" src="/assets/js/plugins/avgrund.js"></script>
<link rel="stylesheet" href="/assets/css/plugins/avgrund.css">
@stop