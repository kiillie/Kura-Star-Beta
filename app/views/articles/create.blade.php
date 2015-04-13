@extends('layouts.main')
@section('content')
<script src="/assets/js/jquery-ui.js" language="javascript"></script>
<script src="/assets/js/jquery-ui.min.js" language="javascript"></script>
<script src="/assets/js/google-search.js" language="javascript"></script>
<script src="/assets/js/article.js" language="javascript"></script>
<script language="javascript" src="/assets/js/temp_art.js"></script>
<script type="text/javascript" src="/assets/js/plugins/jscolor.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/temp.css"></link>
<script type="text/javascript" src="/assets/js/plugins/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="/assets/js/linkScrapper.min.js"></script>
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
    $(".img-search").tabs();
});
</script>
<div class="modal modal-loader"><div class="img-modal"><img src="/assets/images/loader.gif" /></div></div>
	<div class="container article">
		@if(Session::has('article'))
			<?php $article = Session::get('article'); ?>
		@endif
		<div class="article-menu"> 
			<div class="row">
				<div class="col-md-6">
					{{ Form::open(['name'=>'article', 'role'=>'form', 'route'=>'article.store', 'method'=>'post', 'enctype'=>"multipart/form-data"]) }}
					<div class="row">
						@if(Session::has('curation'))
							<input type="hidden" class="cur-id" name="cur_id" value="{{Session::get('curation')}}">
						@else
							<input type="hidden" class="cur-id" name="cur_id" value="{{$curation}}">
						@endif
						<div class="country col-md-6">
							<div class="dropdown">
					       		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
					       			@if($article->COUNTRY_ID == 0)
					       				<span class="val-select">Select A Country</span> <span class="caret"></span>
					       			@else
					       				@foreach($countries as $country)
					       					@if($country->COUNTRY_ID == $article->COUNTRY_ID)
					       						<span class="val-select">{{$country->COUNTRY_NAME}}</span> <span class="caret"></span>
					       					@endif
					       				@endforeach
					       			@endif
					       		</button>
					        	<ul class="dropdown-menu nav-ctry" role="menu">
					        		<input type="hidden" class="sel-id" name="country" value="{{$article->COUNTRY_ID}}">
						    		@foreach($continents as $continent)
					        			<li class="disabled">{{$continent->CONTINENT_NAME}}</li>
							    		@foreach($countries as $country)
							    			@if($country->CONTINENT_ID == $continent->CONTINENT_ID)
							    				<li class="item" value="{{$country->COUNTRY_ID}}">{{$country->COUNTRY_NAME}}</li>
							    			@endif
							    		@endforeach
							    	@endforeach
						    	</ul>
						    </div>
						</div>
						<div class="category col-md-6">
							<div class="dropdown">
						    	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						    		@if($article->CATEGORY_ID == 0)
						    			<span class="val-select">Select A Category</span> <span class="caret"></span>
						    		@else
						    			@foreach($categories as $category)
						    				@if($category->CATEGORY_ID == $article->CATEGORY_ID)
						    					<span class="val-select">{{$category->CATEGORY_NAME}}</span> <span class="caret"></span>
						    				@endif
						    			@endforeach
						    		@endif
						    	</button>
					        	<ul class="dropdown-menu nav-cat" role="menu">
					        		<input type="hidden" class="sel-id" value="{{$article->CATEGORY_ID}}" name="category">
									@foreach($categories as $category)
										<li class="item" value="{{$category->CATEGORY_ID}}">{{$category->CATEGORY_NAME}}</li>
									@endforeach
						    	</ul>
						    </div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="article-btn">
						@if(Session::has('curation'))
							<a class="btn btn-default preview" href="{{URL::route('article.preview', Session::get('curation'))}}"> Preview </a>
						@else
							<a class="btn btn-default preview" href="{{URL::route('article.preview', $curation)}}"> Preview </a>
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
			</div>
		</div>
		<div class="article-details">
			<div class="title-desc">
				<div class="row">
					<div class="col-md-2 art-default-img">
						@if($article->CURATION_IMAGE == "")
							<img src="/assets/images/article-default.png" />
						@else
							<img src="{{$article->CURATION_IMAGE}}" />
						@endif
					</div>
					<div class="col-md-10 art-title-desc">
						<div class="form-group title">
							<input type="text" class="form-control" name="title" placeholder="Title" value="{{$article->CURATION_TITLE}}" />
						</div>
						<div class="form-group desc">
							<textarea maxlength="150" class="form-control" name="description" placeholder="Description">{{$article->CURATION_DESCRIPTION}}</textarea>
							<span class="right"><span class="num-char">0</span>/150 characters</span>
						</div>
					</div>
				</div>
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
					print_r($classes);
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
			<div class="url-setting inline row">
				{{Form::open(['name'=>'insert-img', 'class'=>'img-form', 'role'=>'form', 'method'=>'post', 'enctype'=>'multipart/form-data', 'url' => 'article/image'])}}
					<div class="img-url col-md-4">
						<input type="text" placeholder="URL" name="imageUrl" class="form-control" />
					</div>
					<div class="img-upload col-md-4" style="display:none;">
						<input type="file" name="imgUp" class="form-control" accept="image/*">
					</div>
					<div class="col-md-8 img-btns">
						<input type="submit" class="btn btn-default art-url-submit" name="art-submit" value="Set">
						<a href="javascript:void(0)" class="disp-def" onclick="select_type_img()">Click to Upload an Image</a>&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0)" onclick="add_img_class(0, 'picture', 'main')" data-toggle="modal" data-target="#imageSearch"><span class="glyphicon glyphicon-search"></span> Search for Image</a>
						<input type="hidden" class="google-img" name="google-main" />
					</div>
					@if(Session::has('curation'))
							<input type="hidden" class="cur-id" name="cur_id" value="{{Session::get('curation')}}">
						@else
							<input type="hidden" class="cur-id" name="cur_id" value="{{$curation}}">
						@endif
				{{Form::close()}}
			</div>
			<div class="art-addons">
				<ul class="nav nav-tabs">
					<li class="add-text"><a href="javascript:void(0)" onclick="edit_addon('0', 'text', 'addon', 'new', 'new')"><span class="glyphicon glyphicon-pencil"></span> Text</a></li>
					<li class="add-image"><a href="javascript:void(0)" onclick="edit_addon('0', 'picture', 'addon', 'new', 'new')"><span class="glyphicon glyphicon-camera" ></span> Picture</a></li>
					<li class="add-reference"><a href="javascript:void(0)" onclick="edit_addon('0', 'reference', 'addon', 'new', 'new')"><span class="glyphicon glyphicon-hdd"></span> Reference</a></li>
					<li class="add-link"><a href="javascript:void(0)" onclick="edit_addon('0', 'link', 'addon', 'new', 'new')"><span class="glyphicon glyphicon-link"></span> Link</a></li>
					<li class="add-twitter"><a href="javascript:void(0)" onclick="edit_addon('0', 'twitter', 'addon', 'new', 'new')"><span class="glyphicon glyphicon-retweet"></span> Twitter</a></li>
					<li class="add-video"><a href="javascript:void(0)" onclick="edit_addon('0', 'video', 'addon', 'new', 'new')"><span class="glyphicon glyphicon-hd-video"></span> Youtube</a></li>
					<li class="add-heading"><a href="javascript:void(0)"  onclick="edit_addon('0', 'tag', 'addon', 'new', 'new')"><span class="glyphicon glyphicon-header"></span> h2 Tag</a></li>
				</ul>
				<div class="test"></div>
				<div class="addon-wrapper">
					<div class="loading">
						<div class="loader row" style="display: none;"><div class="col-md-12"><img src="/assets/images/loader.gif" /></div><div class="col-md-12">Loading...</div></div>
					</div>
					<div class="new-addon row">
						<div class="col-md-6 new-item">
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
	</div>
	<div class="twitter-search">
		@include('articles.twitter_search')
		@section('twitterSearch')
		@show
	</div>
	<div class="image-search">
		@include('articles.image_search')
		@section('imageSearch')
		@show
	</div>
<script>
function edit_addon(li, type, controller, action, kind){
	
	if(action == 'new'){
		$(".loader").show();
		post_addon_data(li, type, controller, action, kind);
	}
	else if(action == 'edit'){
		edit_addon_data(li, type, controller, action, kind);
	}
}
function edit_addon_data(li, type, controller, action, kind){
	$.post(
		'/'+controller+"/"+action,
		{
			'li'   : li,
			'type' : type,
			'kind' : kind
		}).done(function(data){
			$("ul.sortable li[value='"+li+"'] .add-item-area").append("<div class='edit-area'>"+data+"</div>");
		});
}

function post_addon_data(li, type, controller, action, kind){
	var tosave = $("ul.sortable").html();
	$.post(
		'/'+controller+'/'+action,
		{
			'li'   : li,
			'type' : type,
			'kind' : kind,
			'content' : tosave

		}).done(function(data){
			if(kind == 'new'){
				$(".new-addon .new-item").html(data);
			}
			else{
				$("ul.sortable li[value='"+li+"'] .append-new-item").html(data);
				$("ul.sortable li[value='"+li+"'] .add-inner .show-append-here").html("");
				$("ul.sortable li[value='"+li+"'] .append-new-item").show();
			}
		});
}
$(".sortable").sortable({
	handle: '.sort-item'
});

function show_appended_item_area(li){
	var addon = "";
	addon += '<ul class="append-add-item list-inline">';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'text\', \'addon\', \'new\', \'append\')">Text</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'picture\', \'addon\', \'new\', \'append\')">Picture</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'reference\', \'addon\', \'new\', \'append\')">Reference</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'link\', \'addon\', \'new\', \'append\')">Link</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'twitter\', \'addon\', \'new\', \'append\')">Twitter</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'video\', \'addon\', \'new\', \'append\')">Youtube</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'tag\', \'addon\', \'new\', \'append\')">H2 Tag</a></li>';
	addon += '<li class="remove-appended right"><a href="javascript:void(0);" onclick="close_appended('+li+')"><span class="glyphicon glyphicon-remove-circle"></span></a></li>';
	addon += '</ul>';

	$("ul.sortable li[value="+li+"] .add-inner .show-append-here").html(addon);
	$("ul.sortable li[value="+li+"] .add-inner .item-btn-con").hide();
}

function close_appended(li){
	$("ul.sortable li[value="+li+"] .add-inner .show-append-here").html("");
	$("ul.sortable li[value="+li+"] .add-inner .item-btn-con").show();
}

function color_changed(li, type, kind){
	var color = "";
	if(kind == 'new'){
		color = $(".new-addon .new-item .colorpicker").val();
		$(".new-addon .new-item .tag-bullet").css('color', color);
		$(".new-addon .new-item .tag-hr").css('border-color', color);
	}
	else{
		color = $("ul.sortable li[value='"+li+"'] .colorpicker").val();
		$("ul.sortable li[value='"+li+"'] .tag-bullet").css('color', color);
		$("ul.sortable li[value='"+li+"'] .tag-hr").css('border-color', color);
	}
}

function select_htype(li, type, kind){
	if(kind == 'new'){
		var tagtype = $(".new-addon .new-item .tag-heading").val();
		if(tagtype == 'normal'){
			$(".new-addon .new-item .tag-hr").show();
			$(".new-addon .new-item .tag-bullet").hide();
		}else{
			$(".new-addon .new-item .tag-hr").hide();
			$(".new-addon .new-item .tag-bullet").show();
		}
	}
	else{
		var tagtype = $("ul.sortable li[value='"+li+"'] .tag-heading").val();
		if(tagtype == 'normal'){
			$("ul.sortable li[value='"+li+"'] .tag-hr").show();
			$("ul.sortable li[value='"+li+"'] .tag-bullet").hide();
		}else{
			$("ul.sortable li[value='"+li+"'] .tag-hr").hide();
			$("ul.sortable li[value='"+li+"'] .tag-bullet").show();
		}
	}
}

function upload_image(li, type, kind){
	if(kind == 'new'){
			$(".new-addon .new-item #upload-addon").one('submit', function(e){
				e.preventDefault();
				if(check_image(li, type, kind)){
					$(".loader").show();
					$.ajax({
						url	: '/file/upload',
						type : 'POST',
						data : new FormData(this),
						contentType : false,
						cache : false,
						processData : false,
						success : function(res){
							if(res == "size"){
								setTimeout(function(){
									$("<span class='label label-danger err'>File chosen is too small.</span>").insertBefore(".new-addon .new-item .upload-img");
								}, 100);
								setTimeout(function(){
									$(".new-item span.err").hide("drop", {'direction' : 'down'}, 'slow').done(function(){ $('.new-item span.err').remove();});
								}, 5000);
								$(".loader").hide();
							}
							else if(res == "type"){
								setTimeout(function(){
									$("<span class='label label-danger err'>File chosen is not an image.</span>").insertBefore(".new-addon .new-item .upload-img");
								}, 100);
								setTimeout(function(){
									$(".new-item span.err").hide("drop", {'direction' : 'down'}, 'slow').done(function(){ $('.new-item span.err').remove();});
								}, 5000);
								$(".loader").hide();
							}
							else{
								$(".new-addon .new-item .def-image img").attr('src', res);
								$(".new-addon .new-item .img-hid").val(res);
								$(".loader").hide();
							}
						}
					});

				}
			});
	}
	else{
		$("ul.sortable li[value='"+li+"'] #upload-addon"). one('submit', function(e){
			e.preventDefault();
			if(check_image(li, type, kind)){
				$(".loader").show();
				$.ajax({
					url	: '/file/upload',
					type : 'POST',
					data : new FormData(this),
					contentType : false,
					cache : false,
					processData : false,
					success : function(res){
						if(res == "size"){
							setTimeout(function(){
								$("<span class='label label-danger err'>File chosen is too small.</span>").insertBefore("ul.sortable li[value='"+li+"'] .upload-img");
							}, 100);
							setTimeout(function(){
								$("ul.sortable li[value='"+li+"'] span.err").hide("drop", {'direction' : 'down'}, 'slow').done(function(){ $("ul.sortable li[value='"+li+"'] span.err").remove();});
							}, 5000);
							$(".loader").hide();
						}
						else if(res == "type"){
							setTimeout(function(){
								$("<span class='label label-danger err'>File chosen is not an image.</span>").insertBefore("ul.sortable li[value='"+li+"'] .upload-img");
							}, 100);
							setTimeout(function(){
								$("ul.sortable li[value='"+li+"'] span.err").hide("drop", {'direction' : 'down'}, 'slow').done(function(){ $("ul.sortable li[value='"+li+"'] span.err").remove();});
							}, 5000);
							$(".loader").hide();
						}
						else{
							$("ul.sortable li[value='"+li+"'] .def-image img").attr('src', res);
							$("ul.sortable li[value='"+li+"'] .img-hid").val(res);
							$(".loader").hide();
						}
					}
				});
			}
		});
	}
}
function insert_addon(){
	var insert = $("ul.sortable").html();
	var det = $("ul.sortable li .item-inner").length;
	var det_con = "";
	for(var i = 0; i < det; i++){
		det_con += "<li>"+$("ul.sortable li .item-inner").eq(i).html()+"</li>";
	}
	$(".detail-li").val(det_con);
	var id = $(".cur-id").val();
	$.post('/addon/insert',{
		'insert' : insert,
		'id'	 : id
	});
}
function publish_article(id){
	var publish = $(".publish").hasClass("published");
	var value = 0;
	if(!publish){
			value = 1;
	}

	$(".modal-loader").show();
	$.post('/article/publish', {
		'id' : id,
		'value' : value
	}).done(function(){
		$(".modal-loader").hide();
		if(publish){
			$(".publish").removeClass("published");
			$(".publish").addClass("unpublished");
			$(".publish").val("Publish");
		}
		else{
			$(".publish").removeClass("unpublished");
			$(".publish").addClass("published");
			$(".publish").val("Unpublish");	
		}
	});
}
function count_image(){
	var count_img = $(".image-container").length;
	var cont = $(".image-container").width();
	
	for(i = 0; i < count_img; i++){
			var pic_width = $(".image-container img").eq(i).width();
			if(pic_width < cont){
				$(".image-container img").eq(i).css("width", pic_width);
			}
			else{
				$(".image-container img").eq(i).css("width", "100%");
			}
	}
}
</script>
@stop