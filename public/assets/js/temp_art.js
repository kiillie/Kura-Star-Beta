function addItem(type){
	if(type == 'text'){
		var text = $(".new-item .texts").val();
		$(".new-addon").html("");
		$(".loader").show();
		var content = '<li class="ui-state-default added-addon">'+
						'<div class="item-added-container">'
						'<p>'+text+'</p>'+
						'<div class="editlist">'+
						'<button class="editItem" onclick="edit_item()">Edit</button><button class="deleteItem" onclick="delete_item()">Delete</button>'
						'</div>'+
						'</div>'+
						'<div class="item-area"><div class="show-append-here"></div><div><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div>'
						'<li>';
		$(".addons-container .sortable").prepend(content);
		$(".loader").hide();
		addonHovered();
	}
}

function addonHovered(){
	$(".item-added-container").hover(function(){
		$(this).css('background', 'rgb(215, 215, 215)');
		$(this).find('.editlist').css('visibility', 'visible');
	}, function(){
		$(this).css('background', 'none');
		$(this).find('.editlist').css('visibility', 'hidden');
	});

	$()
}

function show_append_item_area(){
	//
}