@extends('layouts.main')
@section('content')
<script>
$("")
</script>
<script src="/assets/js/jquery-ui.js" language="javascript"></script>
<script src="/assets/js/jquery-ui.min.js" language="javascript"></script>
<script src="/assets/js/google-search.js" language="javascript"></script>
<script src="/assets/js/article.js" language="javascript"></script>
<script language="javascript" src="/assets/js/temp_art.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/temp.css"></link>
	<div class="container article">
		<div class="article-menu">
			<div class="row">
				<div class="col-md-6">
					{{ Form::open(['name'=>'article', 'role'=>'form', 'route'=>'article.store', 'method'=>'post']) }}
					<div class="row">
						<div class="country col-md-6">
							<div class="dropdown">
					       		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"><span class="val-select">Select A Country</span> <span class="caret"></span></button>
					        	<ul class="dropdown-menu nav-ctry" role="menu">
					        		<input type="hidden" class="sel-id" name="country">
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
						    	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"><span class="val-select">Select A Category</span> <span class="caret"></span></button>
					        	<ul class="dropdown-menu nav-cat" role="menu">
					        		<input type="hidden" class="sel-id" name="category">
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
						<button type="button" class="btn btn-default preview" data-toggle="modal" data-target="#articlePreview"> Preview </button>
						<!-- Modal for Preview -->
							@include('layouts.preview_modal')
							@section('prevModal')
							@show
						<!-- End of Preview Modal-->
						<input type="submit" class="btn btn-default save" value="Save" />
						<input type="button" class="btn btn-default" value="Public" />
					</div>
				</div>
			</div>
		</div>
		<div class="article-details">
			<div class="title-desc">
				<div class="row">
					<div class="col-md-2 art-default-img">
						<img src="/assets/images/article-default.png" />
					</div>
					<div class="col-md-10 art-title-desc">
						<div class="form-group title">
							<input type="text" class="form-control" name="title" placeholder="Title" />
						</div>
						<div class="form-group desc">
							<textarea maxlength="150" class="form-control" name="description" placeholder="Description"></textarea>
							<span class="right"><span class="num-char">0</span>/150 characters</span>
						</div>
					</div>
				</div>
			</div>
			<div class="url-setting inline row">
					<div class="img-url col-md-4">
						<input type="text" placeholder="URL" name="imageUrl" class="form-control" />
					</div>
					<div class="img-upload col-md-4" style="display:none;">
						<input type="file" name="imgUp" class="form-control" accept="image/*">
					</div>
					<div class="col-md-8 img-btns">
						<input type="submit" class="btn btn-default art-url-submit" name="art-submit" value="Set">
						<a href="#" class="disp-def">Click to Upload an Image</a>
					</div>
			</div>
			<div class="art-addons">
				<ul class="nav nav-tabs">
					<li class="add-text"><a href="javascript:void(0)" onclick="edit_addon('0', 'text', 'addon', 'new', 'new')"><span class="glyphicon glyphicon-pencil"></span> Text</a></li>
					<li class="add-image"><a href="javascript:void(0)"><span class="glyphicon glyphicon-camera"></span> Picture</a></li>
					<li class="add-reference"><a href="javascript:void(0)"><span class="glyphicon glyphicon-hdd"></span> Reference</a></li>
					<li class="add-link"><a href="javascript:void(0)"><span class="glyphicon glyphicon-link"></span> Link</a></li>
					<li class="add-twitter"><a href="javascript:void(0)"><span class="glyphicon glyphicon-retweet"></span> Twitter</a></li>
					<li class="add-video"><a href="javascript:void(0)"><span class="glyphicon glyphicon-hd-video"></span> Youtube</a></li>
					<li class="add-heading"><a href="javascript:void(0)"><span class="glyphicon glyphicon-header"></span> h2 Tag</a></li>
				</ul>
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

						</ul>
					</div>
				</div>
			</div>
			
			{{Form::close()}}
		</div>
	</div>
<script>
function edit_addon(li, type, controller, action, kind){
	$(".loader").show();
	post_addon_data(li, type, controller, action, kind);
}
function post_addon_data(li, type, controller, action, kind){
	alert(kind);
	$.post(
		'/'+controller+'/'+action,
		{
			'li'   : li,
			'type' : type,
			'kind' : kind

		}).done(function(data){
			if(kind == 'new'){
				$(".new-addon .new-item").html(data);
			}
			else{
				$('ul.sortable li[value="'+li+'"] .append-new-item').html(content);
				$("ul.sortable li[value="+li+"] .add-inner .show-append-here").html("");
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
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\'text\', \'addon\', \'new\')">Picture</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon("text", "addon", "new")">Reference</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon("text", "addon", "new")">Link</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon("text", "addon", "new")">Twitter</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon("text", "addon", "new")">Youtube</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon("text", "addon", "new")">H2 Tag</a></li>';
	addon += '<li class="remove-appended"><a href="javascript:void(0);" onclick="close_appended('+li+')"><span class="glyphicon glyphicon-remove-circle"></span></a></li>';
	addon += '</ul>';

	$("ul.sortable li[value="+li+"] .add-inner .show-append-here").html(addon);
	$("ul.sortable li[value="+li+"] .add-inner .item-btn-con").hide();
}
function close_appended(li){
	$("ul.sortable li[value="+li+"] .add-inner .show-append-here").html("");
	$("ul.sortable li[value="+li+"] .add-inner .item-btn-con").show();
}
</script>
@stop