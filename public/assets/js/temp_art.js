function addItem(li, type, kind){
	if(type == 'text'){
		if(kind == 'new'){
			var text = $(".new-item .texts").val();
			$('.new-addon .new-item').html("");
		}
		else{
			var text = $("ul.sortable li[value='"+li+"'] .append-new-item .texts").val();
			$('ul.sortable li[value="'+li+'"] .append-new-item').html("");
			$('ul.sortable li[value="'+li+'"] .add-inner .item-btn-con').show();
		}
		$(".loader").show();
		var content = '<li class="ui-state-default added-addon">'+
						'<div class="item-added-container">'+
						'<div class="item-inner">'+
						'<p>'+text+'</p>'+
						'</div>'+
						'<div class="editlist">'+
						'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
						'</div>'+
						'</div>'+
						'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
						'</li>';
		if(kind == 'new'){
			$(".addons-container .sortable").prepend(content);
		}
		else{
			var current = $('ul.sortable li[value="'+li+'"]');
			$("ul.sortable li[value='"+li+"'] .append-new-item").hide();
			current.after(content);
		}
		$(".loader").hide();
		addonHovered();
	}
	else if(type == 'tag'){
		if(kind == 'new'){
			var text = $(".new-item .tag").val();
			$('.new-addon .new-item').html("");
		}
		else{
			var text = $("ul.sortable li[value='"+li+"'] .append-new-item .tag").val();
			$('ul.sortable li[value="'+li+'"] .append-new-item').html("");
			$('ul.sortable li[value="'+li+'"] .add-inner .item-btn-con').show();
		}
		$(".loader").show();
		var content = '<li class="ui-state-default added-addon">'+
						'<div class="item-added-container">'+
						'<div class="item-inner">'+
						'<h2>'+text+'</h2>'+
						'</div>'+
						'<div class="editlist">'+
						'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
						'</div>'+
						'</div>'+
						'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
						'</li>';
		if(kind == 'new'){
			$(".addons-container .sortable").prepend(content);
		}
		else{
			var current = $('ul.sortable li[value="'+li+'"]');
			$("ul.sortable li[value='"+li+"'] .append-new-item").hide();
			current.after(content);
		}
		$(".loader").hide();
		addonHovered();
	}
	added_addon_val();
}
function cancel_add(li, type, kind){

}
function added_addon_val(){
	$(".loader").show()
	var count = $("ul.sortable li.added-addon").length;
	for(var i = 0; i < count; i++){
		$("ul.sortable li.added-addon").eq(i).attr("value", i+1);
		$("ul.sortable li.added-addon").eq(i).find(".add-item-btn a").attr("onclick", "show_appended_item_area("+(i+1)+")");
		$("ul.sortable li.added-addon").eq(i).find(".remove-appended a").attr("onclick", "close_appended("+(i+1)+")");
	}
	$(".loader").hide();
}
function addonHovered(){
	var editbtns1 = '<ul class="list-inline editbtns1"><li><button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button></li><li><button class="deleteItem"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var editbtns2 = '<ul class="list-inline editbtns2"><li><button class="movetop"><span class="glyphicon glyphicon-arrow-up"></span> Move To Top</button></li><li><button class="moveup"><span class="glyphicon glyphicon-chevron-up"></span> Move Up</button></li><li><button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button></li><li><button class="deleteItem"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var editbtns3 = '<ul class="list-inline editbtns3"><li><button class="movebottom"><span class="glyphicon glyphicon-arrow-down"></span> Move To Bottom</button></li><li><button class="movedown"><span class="glyphicon glyphicon-chevron-down"></span> Move Down</button></li><li><button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button></li><li><button class="deleteItem"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var editbtns4 = '<ul class="list-inline editbtns4"><li><button class="movetop"><span class="glyphicon glyphicon-arrow-up"></span> Move to Top</button></li><li><button class="moveup"><span class="glyphicon glyphicon-chevron-up"></span> Move Up</button></li><li><button class="movebottom"><span class="glyphicon glyphicon-arrow-down"></span> Move To Bottom</button></li><li><button class="movedown"><span class="glyphicon glyphicon-chevron-down"></span> Move Down</button></li><li><button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button></li><li><button class="deleteItem"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var ind = "";
	$(".item-added-container").hover(function(){
		$(this).find('.editlist').css('visibility', 'visible');
		ind = $(this).parent().index();
		var countchildren = $('.addons-container ul li.added-addon').length;

		if(countchildren == 1 && ind == 0){
			$(this).find('.editlist').html(editbtns1);
			delete_item();
			moveUpAndDown();
		}
		else if(countchildren > 1){
			if(ind == 0){
				$(this).find('.editlist').html(editbtns3);
				delete_item();
				moveUpAndDown();
			}
			else if(ind == (countchildren-1)){
				$(this).find('.editlist').html(editbtns2);
				delete_item();
				moveUpAndDown();
			}
			else{
				$(this).find('.editlist').html(editbtns4);
				delete_item();
				moveUpAndDown();
			}

		}
	//	alert(ind);
	}, function(){
		$(this).find('.editlist').css('visibility', 'hidden');
	});
	$(".addons-container ul li.added-addon").hover(function(){
		$(this).find('.add-inner').css('visibility', 'visible');
	}, function(){
		$(this).find('.add-inner').css('visibility', 'hidden');
	});

}
function delete_item(){
	$('.deleteItem').on('click', function(){
		var conf = confirm("Do you really want to delete this item?");
		if(conf){
			$(this).parent().parent().parent().parent().parent().remove();
		}
	});
	added_addon_val();
}
function moveUpAndDown(){
	$('.moveup').on('click', function(){
		var par = $(this).parent().parent().parent().parent().parent();
		var current = par.closest('li');
		var previous = par.prev('li');

		current.insertBefore(previous);
		added_addon_val();
	});
	$('.movedown').on('click', function(){
		var par = $(this).parent().parent().parent().parent().parent();
		var current = par.closest('li');
		var next = par.next('li');

		current.insertAfter(next);
		added_addon_val();
	});
	$('.movetop').on('click', function(){
		var par = $(this).parent().parent().parent().parent().parent();
		var verypar = par.parent();
		var current = par.closest('li');
		
		current.insertBefore(verypar.find('li.added-addon').eq(0));
		added_addon_val();
	});
	$('.movebottom').on('click', function(){
		var par = $(this).parent().parent().parent().parent().parent();
		var verypar = par.parent();
		var ins = verypar.find('.added-addon').length - 1;
		var current = par.closest('li');

		current.insertAfter(verypar.find('li.added-addon').eq(ins));
		added_addon_val();
	});
}