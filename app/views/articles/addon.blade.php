<?php
if($addon['type'] == 'text'){
?>
<script>
	$(".loader").hide();
	var kind = "{{$addon['kind']}}";
	var li = "{{$addon['li']}}";
	var content =	'{{Form::open(["name"=>"text"])}}'+
					'<textarea placeholder="Put your text here" class="form-control texts">'+
					'</textarea>'+
					'<input type="button" value="Add" class="btn btn-default add" onclick="addItem(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')"/><input type="button" class="btn btn-default cancel" value="Cancel" onclick="cancel_add(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')" />'+
					'<input type="hidden" class="type" value="'+li+'">'+
					'{{Form::close()}}';
	if(kind == 'new'){
		$('#text .new-addon .new-item').html(content);
	}
	else{
		$("ul.sortable li[value='"+li+"'] .append-new-item").html(content);
		$("ul.sortable li[value='"+li+"'] .add-inner .show-append-here").html("");
	}

</script>
<?php
}
else if($addon['type'] == 'picture'){
?>
<script>
	$(".loader").hide();
	var kind = "{{$addon['kind']}}";
	var li = "{{$addon['li']}}";
	var type = "{{$addon['type']}}";
	var content = 	'<div class="row picture">'+
					'<div class="def-image">'+
					'<img src="/assets/images/article-default.png" width="200" alt="Image">'+
					'</div>'+
					'<div class="url-upload">'+
					'<div class="upload-img-con">'+
					'{{Form::open(["name"=>"image", "enctype"=>"multipart/form-data", "id"=>"upload-addon", "url"=>"file/upload"])}}'+
					'<input type="file" name="image" class="upload-img" accept="image/*"/>'+
					'<input type="submit" class="btn btn-default upload-check" onclick="upload_image(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Check">'+
					'{{Form::close()}}'+
					'</div>'+
					'{{Form::open(["name"=>"picture", "class"=>"pic-addon"])}}'+
					'<div class="url-img">'+
					'<input type="text" class="form-control imgurl" name="picture" placeholder="Url of the Image"/>'+
					'<input type="submit" class="btn btn-default url-check" value="Check" onclick="extract_image(\''+li+'\', \''+type+'\', \''+kind+'\')" />'+
					'<input type="button" class="btn btn-default url-cancel" value="Cancel" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')">'+
					'</div>'+
					'<a href="javascript:void(0)" class="img-anchor a-url" onclick="select_img_type(\''+li+'\', \''+type+'\', \''+kind+'\')">Upload an Image</a><br/><br/>'+
					'<a href="javascript:openDialog(\'google\')" class="search-anchor" onclick="add_img_class('+li+', \''+type+'\', \''+kind+'\')" data-toggle="modal" data-target="#imageSearch"><span class="glyphicon glyphicon-search"></span> Search for image</a>'+
					'<div class="img-desc-con">'+
					'<textarea class="form-control img-desc"></textarea>'+
					'<input type="button" class="btn btn-default pic-add" value="Add" onclick="addItem(\''+li+'\', \''+type+'\', \''+kind+'\')">'+
					'<input type="button" class="btn btn-default" value="Cancel" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')">'+
					'</div>'+
					'</div>'+
					'<input type="hidden" class="img-hid" />'+
					'</div>'+
					'{{Form::close()}}';

	if(kind == 'new'){
		$('#picture .new-addon .new-item').html(content);
	}
	else{
		$("ul.sortable li[value='"+li+"'] .append-new-item").html(content);
		$("ul.sortable li[value='"+li+"'] .add-inner .show-append-here").html("");
	}
</script>
<?php
}
else if($addon['type'] == 'reference'){
?>
<script>
$(".loader").hide();
	var kind = "{{$addon['kind']}}";
	var li = "{{$addon['li']}}";
	var type = "{{$addon['type']}}";
	var content = 	'<div class="row reference">'+
					'{{Form::open(["name"=>"reference"])}}'+
					'<textarea class="form-control ref-desc" name="ref-desc" placeholder="Add a description"></textarea>'+
					'<input type="text" placeholder="Please put the URL of the reference" class="form-control ref-url"/>'+
					'<input type="button" class="btn btn-default" value="Add" onclick="addItem(\''+li+'\', \''+type+'\', \''+kind+'\')"/><input type="button" class="btn btn-default" value="Cancel" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')"/>'+
					'{{Form::close()}}'+
					'</div>';

	if(kind == 'new'){
		$('#reference .new-addon .new-item').html(content);
	}
	else{
		$("ul.sortable li[value='"+li+"'] .append-new-item").html(content);
		$("ul.sortable li[value='"+li+"'] .add-inner .show-append-here").html("");
	}
</script>
<?php
}
else if($addon['type'] == 'link'){
?>
<script>
	$(".loader").hide();
	var kind = "{{$addon['kind']}}";
	var li = "{{$addon['li']}}";
	var type = "{{$addon['type']}}";
	var content =	'{{Form::open(["name"=>"link"])}}'+
					'<div class="link-wrap">'+
					'<input type="text" class="form-control link-url" placeholder="URL of the Link"/>'+
					'<input type="button" class="btn btn-default check-link" value="Check" onclick="link_check(\''+li+'\', \''+type+'\', \''+kind+'\')"/>'+
					'<input type="button" class="btn btn-default cancel-link" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Cancel">'+
					'</div>'+
					'<div class="link-result">'+
					'<input type="text" class="form-control link-title">'+
					'<textarea class="form-control link-description"></textarea>'+
					'<span>URL: <span class="link-url-text"></span></span>'+
					'<textarea class="form-control link-extra-text" placeholder="Description of the URL type here"></textarea>'+
					'<input type="button" class="btn btn-default add-btn" value="Add" onclick="addItem(\''+li+'\', \''+type+'\', \''+kind+'\')">'+
					'<input type="button" class="btn btn-default cancel-link" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Cancel">'+
					'</div>'+
					'{{Form::close()}}';

	if(kind == 'new'){
		$('#link .new-addon .new-item').html(content);
	}
	else{
		$("ul.sortable li[value='"+li+"'] .append-new-item").html(content);
		$("ul.sortable li[value='"+li+"'] .add-inner .show-append-here").html("");
	}
</script>
<?php
}
else if($addon['type'] == 'twitter'){

?>
<script>
	$(".loader").hide();
	var kind = "{{$addon['kind']}}";
	var li = "{{$addon['li']}}";
	var type = "{{$addon['type']}}";
	var putclass = "";
	if(kind == 'new'){
		putclass = "new-tweet";
	}
	else{
		putclass = "append-tweet";
	}
	var content =	'{{Form::open(["name" => "twitter"])}}'+
				  	'<input type="text" class="form-control url-tweet" placeholder="Put the URL of a tweet here">'+
				  	'<a href="javascript:openDialog(\'twitter\')" onclick="addclass_modal(\''+putclass+'\', '+li+')" id="twitter-button"><span class="glyphicon glyphicon-search"></span>Search for tweets.</a><br/><br/>'+
				  	'<input type="button" class="btn btn-default check-tweet" onclick="addItem(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Add">'+
				  	'<input type="button" class="btn btn-default" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Cancel">'+
				  	'{{Form::close()}}';
	if(kind == 'new'){
		$('#twitter .new-addon .new-item').html(content);
	}
	else{
		$("ul.sortable li[value='"+li+"'] .append-new-item").html(content);
		$("ul.sortable li[value='"+li+"'] .add-inner .show-append-here").html("");
	}
</script>
<?php
}
else if($addon['type'] == 'video'){
?>
<script>
	$(".loader").hide();
	var kind = "{{$addon['kind']}}";
	var li = "{{$addon['li']}}";
	var type = "{{$addon['type']}}";
	var content =	'{{Form::open(["name"=>"video"])}}'+
					'<div class="vid-url-container">'+
					'<input type="text" class="vid-url form-control" placeholder="Video URL"/>'+
					'<input type="button" value="Check" class="btn btn-default add" onclick="extract_video(\''+li+'\', \''+type+'\', \''+kind+'\')">'+
					'<input type="button" value="Cancel" class="btn btn-default"onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')">'+
					'</div>'+
					'<div class="extracted-vid row">'+
					'<div class="vid-iframe">'+
					'<iframe src="#" width="300" height="300">#document</iframe>'+
					'</div>'+
					'<div class="vid-ex">'+
					'<textarea class="vid-desc form-control" placeholder="Video Description"></textarea>'+
					'<input type="button" class="btn btn-default" onclick="addItem(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Add" />'+
					'<input type="button" class="btn btn-default" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Cancel">'+
					'</div>'+
					'<div class="clear"></div>'+
					'</div>'+
					'{{Form::close()}}';
	if(kind == 'new'){
		$('#video .new-addon .new-item').html(content);
	}
	else{
		$("ul.sortable li[value='"+li+"'] .append-new-item").html(content);
		$("ul.sortable li[value='"+li+"'] .add-inner .show-append-here").html("");
	}
</script>
<?php
}
else if($addon['type'] == 'tag'){
?>
<script>
	$(".loader").hide();
	var kind = "{{$addon['kind']}}";
	var li = "{{$addon['li']}}";
	var content =	'{{Form::open(["name"=>"tag"])}}'+
					'<select class="form-control tag-heading" onchange="select_htype(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')">'+
					'<option value="normal">Normal Heading</option>'+
					'<option value="sub">Subheading</option>'+
					'</select>'+
					'<span class="tag-bullet" style="color: rgba(237, 113, 0, 1);">■</span>'+
					'<input type="text" class="form-control tag" placeholder="Tag Title"/>'+
					'<hr class="tag-hr" style="border-color: rgba(237, 113, 0, 1)"></hr>'+
					'<input type="button" value="Add" class="btn btn-default add" onclick="addItem(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')"/><input type="button" class="btn btn-default cancel" onclick="cancel_add(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')" value="Cancel"/>'+
					'{{Form::close()}}';
	if(kind == 'new'){
		$('#tag .new-addon .new-item').html(content);
	}
	else{
		$("ul.sortable li[value='"+li+"'] .append-new-item").html(content);
		$("ul.sortable li[value='"+li+"'] .add-inner .show-append-here").html("");
	}
</script>
<?php

}
?>
