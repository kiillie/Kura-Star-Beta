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
		$('.new-addon .new-item').html(content);
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
					'<div class="col-md-6 def-image">'+
					'<img src="/assets/images/article-default.png" width="200" alt="Image">'+
					'</div>'+
					'<div class="col-md-6 url-upload">'+
					'<div class="upload-img-con">'+
					'{{Form::open(["name"=>"image", "enctype"=>"multipart/form-data", "id"=>"upload-addon", "url"=>"file/upload"])}}'+
					'<input type="file" name="image" class="upload-img" accept="image/*"/>'+
					'<input type="submit" class="btn btn-default upload-check" onclick="upload_image(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Check">'+
					'{{Form::close()}}'+
					'</div>'+
					'{{Form::open(["name"=>"picture"])}}'+
					'<div class="url-img">'+
					'<input type="text" class="form-control imgurl" name="picture" placeholder="Url of the Image"/>'+
					'<input type="button" class="btn btn-default url-check" value="Check" onclick="extract_image(\''+li+'\', \''+type+'\', \''+kind+'\')" />'+
					'<input type="button" class="btn btn-default url-cancel" value="Cancel" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')">'+
					'</div>'+
					'<a href="javascript:void(0)" class="img-anchor a-url" onclick="select_img_type(\''+li+'\', \''+type+'\', \''+kind+'\')">Upload an Image</a><br/><br/>'+
					'<a href="javascript:void(0)" class="search-anchor"><span class="glyphicon glyphicon-search"></span> Search for image</a>'+
					'<div class="img-desc-con">'+
					'<textarea class="form-control img-desc"></textarea>'+
					'<input type="button" class="btn btn-default" value="Add" onclick="addItem(\''+li+'\', \''+type+'\', \''+kind+'\')">'+
					'<input type="button" class="btn btn-default" value="Cancel" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')">'+
					'</div>'+
					'</div>'+
					'</div>'+
					'<input type="hidden" class="img-hid" />'+
					'{{Form::close()}}';

	if(kind == 'new'){
		$('.new-addon .new-item').html(content);
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
					'<input type="text" class="form-control link-url" placeholder="URL of the Link"/>'+
					'<input type="button" class="btn btn-default check-link" value="Check" />'+
					'<input type="button" class="btn btn-default cancel-link" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Cancel">'+
					'{{Form::close()}}';

	if(kind == 'new'){
		$('.new-addon .new-item').html(content);
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
					'<div class="col-md-7">'+
					'<iframe src="#" width="300" height="300">#document</iframe>'+
					'</div>'+
					'<div class="col-md-5">'+
					'<textarea class="vid-desc form-control" placeholder="Video Description"></textarea>'+
					'<input type="button" class="btn btn-default" onclick="addItem(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Add" />'+
					'<input type="button" class="btn btn-default" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Cancel">'+
					'</div>'+
					'</div>'+
					'{{Form::close()}}';

	if(kind == 'new'){
		$('.new-addon .new-item').html(content);
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
					'<span class="tag-bullet">■</span>'+
					'<input type="text" class="form-control tag" placeholder="Tag Title"/>'+
					'<hr class="tag-hr"></hr>'+
					'<input type="color" class="form-control colorpicker" onchange="color_changed(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')"/>'+
					'<input type="button" value="Add" class="btn btn-default add" onclick="addItem(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')"/><input type="button" class="btn btn-default cancel" onclick="cancel_add(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')" value="Cancel"/>'+
					'{{Form::close()}}';
	if(kind == 'new'){
		$('.new-addon .new-item').html(content);
	}
	else{
		$("ul.sortable li[value='"+li+"'] .append-new-item").html(content);
		$("ul.sortable li[value='"+li+"'] .add-inner .show-append-here").html("");
	}
</script>
<?php

}
// $files = fopen(public_path()."/assets/articles/boang.html", "w");
// fwrite($files, $addon['content']);
?>
