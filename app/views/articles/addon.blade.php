
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
					'<input type="button" value="Add" class="btn btn-default add" onclick="addItem(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')"/><input type="button" class="btn btn-default cancel" value="Cancel"/>'+
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
					'<input type="text" class="form-control tag" />'+
					'<hr class="tag-hr"></hr>'+
					'<input type="color" class="form-control colorpicker" onchange="color_changed(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')"/>'+
					'<input type="button" value="Add" class="btn btn-default add" onclick="addItem(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')"/><input type="button" class="btn btn-default cancel" value="Cancel"/>'+
					
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

?>
