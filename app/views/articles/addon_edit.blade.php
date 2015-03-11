<?php
if($addon['type'] == 'text'){
?>
<script>
	$(".loader").hide();
	var li = "{{$addon['li']}}";
	var type = "{{$addon['type']}}";
	var kind = "{{$addon['kind']}}";
	var text = $("ul.sortable li[value='"+li+"'] .item-inner p").html();
	var content =	'{{Form::open(["name"=>"text"])}}'+
					'<textarea placeholder="Put your text here" class="form-control texts">'+text+
					'</textarea>'+
					'<input type="button" value="Add" class="btn btn-default add" onclick="editItem(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')"/><input type="button" class="btn btn-default cancel" value="Cancel"/>'+
					'<input type="hidden" class="type" value="'+li+'">'+
					'{{Form::close()}}';
	$(".new-addon .new-item").html(content);
</script>
<?php
}
else if($addon['type'] == 'picture'){
?>
<script>
	$(".loader").hide();
	var li = "{{$addon['li']}}";
	var type = "{{$addon['type']}}";
	var kind = "{{$addon['kind']}}";
	var image = $("ul.sortable li[value='"+li+"'] .item-inner .image-container img").attr("src");
	var desc = $("ul.sortable li[value='"+li+"'] .item-inner .desc").html();
	var content = 	'<div class="row picture">'+
					'<div class="col-md-6 def-image">'+
					'<img src="'+image+'" width="200" alt="Image">'+
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
					'<input type="button" class="btn btn-default url-cancel" value="Cancel">'+
					'</div>'+
					'<a href="javascript:void(0)" class="img-anchor a-url" onclick="select_img_type(\''+li+'\', \''+type+'\', \''+kind+'\')">Upload an Image</a><br/><br/>'+
					'<a href="javascript:void(0)" class="search-anchor"><span class="glyphicon glyphicon-search"></span> Search for image</a>'+
					'<div class="img-desc-con" style="display:block;">'+
					'<textarea class="form-control img-desc">'+desc+'</textarea>'+
					'<input type="button" class="btn btn-default" value="Add" onclick="editItem(\''+li+'\', \''+type+'\', \''+kind+'\')">'+
					'<input type="button" class="btn btn-default" value="Cancel">'+
					'</div>'+
					'</div>'+
					'</div>'+
					'<input type="hidden" class="img-hid" value="'+image+'"/>'+
					'{{Form::close()}}';
	$(".new-addon .new-item").html(content);
</script>
<?php
}
else if($addon['type'] == 'reference'){
?>
<script>
	$(".loader").hide();
	var li = "{{$addon['li']}}";
	var type = "{{$addon['type']}}";
	var kind = "{{$addon['kind']}}";
	var quote = $("ul.sortable li[value='"+li+"'] .quote-text").text();
	var url = $("ul.sortable li[value='"+li+"'] .url-val a").attr("href");

	var content = 	'<div class="row reference">'+
					'{{Form::open(["name"=>"reference"])}}'+
					'<textarea class="form-control ref-desc" name="ref-desc">'+quote+'</textarea>'+
					'<input type="text" placeholder="Please put the URL of the reference" class="form-control ref-url" value="'+url+'"/>'+
					'<input type="button" class="btn btn-default" value="Add" onclick="editItem(\''+li+'\', \''+type+'\', \''+kind+'\')"/><input type="button" class="btn btn-default" value="Cancel" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')"/>'+
					'{{Form::close()}}'+
					'</div>';

	$(".new-addon .new-item").html(content);
</script>
<?php	
}
else if($addon['type'] == 'link'){
?>
<script>
	$(".loader").hide();
	var li = "{{$addon['li']}}";
	var type = "{{$addon['type']}}";
	var kind = "{{$addon['kind']}}";
	var title = $("ul.sortable li[value='"+li+"'] .link-title a").text();
	var content = $("ul.sortable li[value='"+li+"'] .link-desc p").text();
	var extra = $("ul.sortable li[value='"+li+"'] .link-extra p").text();
	var src = $("ul.sortable li[value='"+li+"'] .link-title a").attr("href");
	var content =	'{{Form::open(["name"=>"link"])}}'+
					'<div class="link-result" style="display:block;">'+
					'<input type="text" class="form-control link-title" value="'+title+'">'+
					'<textarea class="form-control link-description">'+content+'</textarea>'+
					'<span>URL: <span class="link-url-text">'+src+'</span></span>'+
					'<textarea class="form-control link-extra-text" placeholder="Description of the URL type here">'+extra+'</textarea>'+
					'<input type="button" class="btn btn-default add-btn" value="Add" onclick="editItem(\''+li+'\', \''+type+'\', \''+kind+'\')">'+
					'<input type="button" class="btn btn-default cancel-link" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Cancel">'+
					'</div>'+
					'{{Form::close()}}';

	$(".new-addon .new-item").html(content);
</script>
<?php
}
else if($addon['type'] == 'video'){
?>
<script>
	$(".loader").hide();
	var li = "{{$addon['li']}}";
	var type = "{{$addon['type']}}";
	var kind = "{{$addon['kind']}}";
	var src = $("ul.sortable li[value='"+li+"'] iframe").attr("src");
	var vid_dsc = $("ul.sortable li[value='"+li+"'] .vid-p-desc").text();
	var content = '{{Form::open(["name"=>"video"])}}'+
					'<div class="extracted-vid row" style="display: block;">'+
					'<div class="col-md-7">'+
					'<iframe src="'+src+'" width="300" height="300">#document</iframe>'+
					'</div>'+
					'<div class="col-md-5">'+
					'<textarea class="vid-desc form-control" placeholder="Video Description">'+vid_dsc+'</textarea>'+
					'<input type="button" class="btn btn-default" onclick="editItem(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Add" />'+
					'<input type="button" class="btn btn-default" onclick="cancel_add(\''+li+'\', \''+type+'\', \''+kind+'\')" value="Cancel">'+
					'</div>'+
					'</div>'+
					'{{Form::close()}}';
		$(".new-addon .new-item").html(content);
</script>
<?php
}
else if($addon['type'] == 'tag'){
?>
<script>
	$(".loader").hide();
	var li = "{{$addon['li']}}";
	var type = "{{$addon['type']}}";
	var kind = "{{$addon['kind']}}";
	var color = $("ul.sortable li[value='"+li+"'] .color-selected").val();
	var text = $("ul.sortable li[value='"+li+"'] h2 .inner-tag").html();
	var content = 	'{{Form::open(["name"=>"tag"])}}'+
					'<select class="form-control tag-heading" onchange="select_htype(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')">'+
					'<option value="normal">Normal Heading</option>'+
					'<option value="sub">Subheading</option>'+
					'</select>'+
					'<span class="tag-bullet" style="color: '+color+';">■</span>'+
					'<input type="text" class="form-control tag" placeholder="Tag Title" value="'+text+'"/>'+
					'<hr class="tag-hr" style="border-color: '+color+';"></hr>'+
					'<input type="color" class="form-control colorpicker" value="'+color+'" onchange="color_changed(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')"/>'+
					'<input type="button" value="Add" class="btn btn-default add" onclick="editItem(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')"/><input type="button" class="btn btn-default cancel" value="Cancel"/>'+
					'{{Form::close()}}';

	$(".new-addon .new-item").html(content);
</script>
<?php
}
?>