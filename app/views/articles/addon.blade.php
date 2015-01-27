<?php
if($addon['type'] == 'text'){
?>
<script>
	$(".loader").hide();
	var kind = "{{$addon['kind']}}";
	var content =	'{{Form::open(["name"=>"text"])}}'+
					'<textarea placeholder="Put your text here" class="form-control texts">'+
					'</textarea>'+
					'<input type="button" value="Add" class="btn btn-default add" onclick="addItem(\'{{$addon["li"]}}\', \'{{$addon["type"]}}\', \'{{$addon["kind"]}}\')"/><input type="button" class="btn btn-default cancel" value="Cancel"/>'+
					'{{Form::close()}}';
					
	if(kind == 'new'){
		$('.new-addon .new-item').html(content);
	}
	else{
		$('ul.sortable li[value="'+li+'"] .append-new-item').html(content);
		$("ul.sortable li[value="+li+"] .add-inner .show-append-here").html("");
	}
</script>
<?php
}

?>
