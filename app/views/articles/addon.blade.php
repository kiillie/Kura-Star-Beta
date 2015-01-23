
<?php
if($addon['type'] == 'text'){
?>
<script>
	$(".loader").hide();
	var content ='<div class="col-md-6 new-item">'+
					'{{Form::open(["name"=>"text"])}}'+
					'<textarea placeholder="Put your text here" class="form-control texts">'+
					'</textarea>'+
					'<input type="button" value="Add" class="btn btn-default add" onclick="addItem(\'{{$addon["type"]}}\')"/><input type="button" class="btn btn-default cancel" value="Cancel"/>'+
					'{{Form::close()}}'+
					'</div>'
	$('.new-addon').html(content);
</script>
<?php
}

?>