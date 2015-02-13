$(document).ready(function(){
	addonHovered("", "");
});

function addItem(li, type, kind){
	if(type == 'text'){
		if(validate_addon(li, type, kind)){
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
							'<div class="item-inner text">'+
							'<p>'+text+'</p>'+
							'</div>'+
							'<div class="editlist">'+
							'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
							'</div>'+
							'</div>'+
							'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
							'<input type="hidden" class="type" value="'+type+'">'+
							'<input type="hidden" class="kind" value="'+kind+'">'+
							'</li>';
			if(kind == 'new'){
				$(".addons-container .sortable").prepend(content);
				insert_addon();
			}
			else{
				var current = $('ul.sortable li[value="'+li+'"]');
				$("ul.sortable li[value='"+li+"'] .append-new-item").hide();
				current.after(content);
			}
			$(".loader").hide();
			addonHovered(type, kind);
		}
	}
	else if(type == 'picture'){
		if(validate_addon(li, type, kind)){
			if(kind == 'new'){
				var src = $(".new-addon .new-item .img-hid").val();
				var desc = $(".new-addon .new-item .img-desc").val();
				var image = '<img class="image" src="'+src+'" alt="" />'+
							'<p class="desc">'+desc+'</p>';
				$('.new-addon .new-item').html("");
			}
			else{
				var src = $("ul.sortable li[value='"+li+"'] .img-hid").val();
				var desc = $("ul.sortable li[value='"+li+"'] .img-desc").val();
				var image = '<img class="image" src="'+src+'" alt="" />'+
							'<p class="desc">'+desc+'</p>';
				$('ul.sortable li[value="'+li+'"] .append-new-item').html("");
				$('ul.sortable li[value="'+li+'"] .add-inner .item-btn-con').show();
			}
			$(".loader").show();
			var content = 	'<li class="ui-state-default added-addon">'+
							'<div class="item-added-container">'+
							'<div class="item-inner text">'+
							'<div class="image-container">'+image+'</div>'+
							'</div>'+
							'<div class="editlist">'+
							'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
							'</div>'+
							'</div>'+
							'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
							'<input type="hidden" class="type" value="'+type+'">'+
							'<input type="hidden" class="kind" value="'+kind+'">'+
							'</li>';
			if(kind == 'new'){
				$(".addons-container .sortable").prepend(content);
				insert_addon();
			}
			else{
				var current = $('ul.sortable li[value="'+li+'"]');
				$("ul.sortable li[value='"+li+"'] .append-new-item").hide();
				current.after(content);
			}
			$(".loader").hide();
			addonHovered(type, kind);
		}
	}
	else if(type == 'video'){
		if(kind == 'new'){
			var src = $(".new-addon .new-item iframe").attr("src");
			var desc = $(".new-addon .new-item .vid-desc").val();

			var video = '<iframe class="vid-display" src="'+src+'" width="400" height="400">#</iframe>'+
						'<p>'+desc+'</p>';
			$('.new-addon .new-item').html("");
		}
		else{
			var src = $("ul.sortable li[value='"+li+"'] iframe").attr("src");
			var desc = $("ul.sortable li[value='"+li+"'] .vid-desc").val();

			var video =  '<iframe class="vid-display" src="'+src+'" width="400" height="400">#</iframe>'+
						 '<p>'+desc+'</p>';
			$('ul.sortable li[value="'+li+'"] .append-new-item').html("");
			$('ul.sortable li[value="'+li+'"] .add-inner .item-btn-con').show();
		}
		var content =	'<li class="ui-state-default added-addon">'+
						'<div class="item-added-container">'+
						'<div class="item-inner text">'+
						'<div class="vid-wrapper">'+video+"</div>"+
						'</div>'+
						'<div class="editlist">'+
						'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
						'</div>'+
						'</div>'+
						'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
						'<input type="hidden" class="type" value="'+type+'">'+
						'<input type="hidden" class="kind" value="'+kind+'">'+
						'</li>';

		if(kind == 'new'){
			$(".addons-container .sortable").prepend(content);
			insert_addon();
		}
		else{
			var current = $('ul.sortable li[value="'+li+'"]');
			$("ul.sortable li[value='"+li+"'] .append-new-item").hide();
			current.after(content);
		}

		$(".loader").hide();
		addonHovered(type, kind);
	}
	else if(type == 'tag'){
		if(validate_addon(li, type, kind)){
			var color = "";
			if(kind == 'new'){
				color = $('.new-addon .new-item .colorpicker').val();
				var text = $(".new-item .tag").val();
				var tagtype = $(".new-addon .new-item .tag-heading").val();
				$('.new-addon .new-item').html("");
				if(tagtype != 'normal'){
					text = '<h2 class="subheading"><span class="tag-bul" style="color: '+color+'">■</span> <span class="inner-tag">'+text+'</span></h2>';
				}
				else{
					text = '<h2 class="normal" style="border-bottom: 4px solid; border-color: '+color+'"><span class="inner-tag">'+text+'</span></h2>';
				}
			}
			else{
				color = $("ul.sortable li[value='"+li+"'] .colorpicker").val();
				var text = $("ul.sortable li[value='"+li+"'] .append-new-item .tag").val();
				var tagtype = $('ul.sortable li[value="'+li+'"] .tag-heading').val();
				$('ul.sortable li[value="'+li+'"] .append-new-item').html("");
				$('ul.sortable li[value="'+li+'"] .add-inner .item-btn-con').show();
				if(tagtype != 'normal'){
					text = '<h2 class="subheading"><span class="tag-bul" style="color: '+color+'">■</span> <span class="inner-tag">'+text+'</span></h2>';
				}
				else{
					text = '<h2 class="normal" style="border-bottom: 4px solid; border-color: '+color+'"><span class="inner-tag">'+text+'</span></h2>';
				}
			}
			$(".loader").show();
			var content = '<li class="ui-state-default added-addon">'+
							'<div class="item-added-container">'+
							'<div class="item-inner tag">'+
							text+
							'</div>'+
							'<div class="editlist">'+
							'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
							'</div>'+
							'</div>'+
							'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
							'<input type="hidden" class="type" value="'+type+'">'+
							'<input type="hidden" class="kind" value="'+kind+'">'+
							'<input type="hidden" class="color-selected" value="'+color+'">'+
							'</li>';
			if(kind == 'new'){
				$(".addons-container .sortable").prepend(content);
				insert_addon();
			}
			else{
				var current = $('ul.sortable li[value="'+li+'"]');
				$("ul.sortable li[value='"+li+"'] .append-new-item").hide();
				current.after(content);
			}
			$(".loader").hide();
			addonHovered(type, kind);
		}
	}
	added_addon_val(type, kind);
}

function cancel_add(li, type, kind){
	if(kind == 'new'){
		$(".new-addon .new-item").html("");
	}
	else{
		$("ul.sortable li[value='"+li+"'] .append-new-item").html("");
		$("ul.sortable li[value='"+li+"'] .append-new-item").css("display", "none");
		$("ul.sortable li[value='"+li+"'] .add-inner").show();
		show_appended_item_area(li);
	}
}

function editItem(li, type, kind){
	if(type == 'text'){
		var text = $(".new-item .texts").val();
		$('.new-addon .new-item').html("");
	
		$(".loader").show();
		var content = 	'<div class="item-added-container">'+
						'<div class="item-inner text">'+
						'<p>'+text+'</p>'+
						'</div>'+
						'<div class="editlist">'+
						'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
						'</div>'+
						'</div>'+
						'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
						'<input type="hidden" class="type" value="'+type+'">'+
						'<input type="hidden" class="kind" value="'+kind+'">';

		$("ul.sortable li[value='"+li+"']").html(content);
		$(".loader").hide();
		addonHovered(type, kind);
	}
	else if(type == 'picture'){
		var src = $(".new-addon .new-item .img-hid").val();
		var desc = $(".new-addon .new-item .img-desc").val();
		var image = '<img class="image" src="'+src+'" alt="" />'+
					'<p class="desc">'+desc+'</p>';
		$('.new-addon .new-item').html("");

		$(".loader").show();
		var content = 	'<div class="item-added-container">'+
						'<div class="item-inner text">'+
						'<div class="image-container">'+image+'</div>'+
						'</div>'+
						'<div class="editlist">'+
						'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
						'</div>'+
						'</div>'+
						'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
						'<input type="hidden" class="type" value="'+type+'">'+
						'<input type="hidden" class="kind" value="'+kind+'">';
			$("ul.sortable li[value='"+li+"']").html(content);
			$(".loader").hide();
			addonHovered(type, kind);
	}
	else if(type == "tag"){
		var color = "";
			color = $('.new-addon .new-item .colorpicker').val();
			var text = $(".new-item .tag").val();
			var tagtype = $(".new-addon .new-item .tag-heading").val();
			$('.new-addon .new-item').html("");
			if(tagtype != 'normal'){
				text = '<h2 class="subheading"><span class="tag-bul" style="color: '+color+'">■</span> <span class="inner-tag">'+text+'</span></h2>';
			}
			else{
				text = '<h2 class="normal" style="border-bottom: 4px solid; border-color: '+color+'"><span class="inner-tag">'+text+'</span></h2>';
			}
		$(".loader").show();
		var content = 	'<div class="item-added-container">'+
						'<div class="item-inner tag">'+
						text+
						'</div>'+
						'<div class="editlist">'+
						'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
						'</div>'+
						'</div>'+
						'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
						'<input type="hidden" class="type" value="'+type+'">'+
						'<input type="hidden" class="kind" value="'+kind+'">'+
						'<input type="hidden" class="color-selected" value="'+color+'">';

		$("ul.sortable li[value='"+li+"']").html(content);

		$(".loader").hide();
		addonHovered(type, kind);
	}
}

function added_addon_val(type, kind){
	$(".loader").show()
	var count = $("ul.sortable li.added-addon").length;
	for(var i = 0; i < count; i++){
		$("ul.sortable li.added-addon").eq(i).attr("value", i+1);
		$("ul.sortable li.added-addon").eq(i).find(".add-item-btn a").attr("onclick", "show_appended_item_area("+(i+1)+")");
		$("ul.sortable li.added-addon").eq(i).find(".remove-appended a").attr("onclick", "close_appended("+(i+1)+")");
		var type = $("ul.sortable li.added-addon").eq(i).find(".type").val();
		$("ul.sortable li.added-addon").eq(i).find(".editItem").attr("onclick", "edit_addon('"+(i+1)+"', '"+type+"', 'addon', 'edit', 'new')");
		$("ul.sortable li.added-addon").eq(i).find(".deleteItem").attr("onclick", "delete_item('"+(i+1)+"', '"+type+"', 'new')");
	}
	$(".loader").hide();
}

function addonHovered(type, kind){
	var editbtns1 = '<ul class="list-inline editbtns1"><li><button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button></li><li><button class="deleteItem" onclick="delete_item(\''+type+'\', \''+kind+'\')"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var editbtns2 = '<ul class="list-inline editbtns2"><li><button class="movetop"><span class="glyphicon glyphicon-arrow-up"></span> Move To Top</button></li><li><button class="moveup"><span class="glyphicon glyphicon-chevron-up"></span> Move Up</button></li><li><button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button></li><li><button class="deleteItem" onclick="delete_item(\''+type+'\', \''+kind+'\')"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var editbtns3 = '<ul class="list-inline editbtns3"><li><button class="movebottom"><span class="glyphicon glyphicon-arrow-down"></span> Move To Bottom</button></li><li><button class="movedown"><span class="glyphicon glyphicon-chevron-down"></span> Move Down</button></li><li><button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button></li><li><button class="deleteItem" onclick="delete_item(\''+type+'\', \''+kind+'\')"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var editbtns4 = '<ul class="list-inline editbtns4"><li><button class="movetop"><span class="glyphicon glyphicon-arrow-up"></span> Move to Top</button></li><li><button class="moveup"><span class="glyphicon glyphicon-chevron-up"></span> Move Up</button></li><li><button class="movebottom"><span class="glyphicon glyphicon-arrow-down"></span> Move To Bottom</button></li><li><button class="movedown"><span class="glyphicon glyphicon-chevron-down"></span> Move Down</button></li><li><button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button></li><li><button class="deleteItem" onclick="delete_item(\''+type+'\', \''+kind+'\')"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var ind = "";
	$(".item-added-container").hover(function(){
		$(this).find('.editlist').css('visibility', 'visible');
		ind = $(this).parent().index();
		var countchildren = $('.addons-container ul li.added-addon').length;
		
		if(countchildren == 1 && ind == 0){
			$(this).find('.editlist').html(editbtns1);
			moveUpAndDown(type, kind);
			added_addon_val(type, kind);
		}
		else if(countchildren > 1){
			if(ind == 0){
				$(this).find('.editlist').html(editbtns3);
				moveUpAndDown(type, kind);
				added_addon_val(type, kind);
			}
			else if(ind == (countchildren-1)){
				$(this).find('.editlist').html(editbtns2);
				moveUpAndDown(type, kind);
				added_addon_val(type, kind);
			}
			else{
				$(this).find('.editlist').html(editbtns4);
				moveUpAndDown(type, kind);
				added_addon_val(type, kind);
			}

		}
	}, function(){
		$(this).find('.editlist').css('visibility', 'hidden');
	});
	$(".addons-container ul li.added-addon").hover(function(){
		$(this).find('.add-inner').css('visibility', 'visible');
	}, function(){
		$(this).find('.add-inner').css('visibility', 'hidden');
	});

}

function delete_item(li, type, kind){
	var item = $("ul.sortable li[value='"+li+"']");
	var conf = confirm("Do you really want to delete this item?");

	if(type == 'picture'){
		var img = $("ul.sortable li[value='"+li+"'] .image-container img").attr("src");
		if(conf){
			$(".loader").show();
			$.post("/addon/delete", {
				'image' : img
			}).done(function(res){
				if(res == "true"){
					$(".loader").hide();
					item.remove();
					added_addon_val(type, kind);
					insert_addon();
				}
			});
		}
	}
	else{
		if(conf){
			item.remove();
			added_addon_val(type, kind);
			insert_addon();
		}
	}
	}

function moveUpAndDown(type, kind){

	$('.moveup').on('click', function(){
		var par = $(this).parent().parent().parent().parent().parent();
		var current = par.closest('li');
		var previous = par.prev('li');

		current.insertBefore(previous);
		added_addon_val(type, kind);
		insert_addon();
	});
	$('.movedown').on('click', function(){
		var par = $(this).parent().parent().parent().parent().parent();
		var current = par.closest('li');
		var next = par.next('li');

		current.insertAfter(next);
		added_addon_val(type, kind);
		insert_addon();
	});
	$('.movetop').on('click', function(){
		var par = $(this).parent().parent().parent().parent().parent();
		var verypar = par.parent();
		var current = par.closest('li');
		
		current.insertBefore(verypar.find('li.added-addon').eq(0));
		added_addon_val(type, kind);
		insert_addon();
	});
	$('.movebottom').on('click', function(){
		var par = $(this).parent().parent().parent().parent().parent();
		var verypar = par.parent();
		var ins = verypar.find('.added-addon').length - 1;
		var current = par.closest('li');

		current.insertAfter(verypar.find('li.added-addon').eq(ins));
		added_addon_val(type, kind);
		insert_addon();
	});
}

function extract_video(li, type, kind){
	if(kind == 'new'){
		var url = $(".new-addon .new-item .vid-url").val();
		vid = url.replace('watch?v=', 'embed/');
		$(".new-addon .new-item iframe").attr("src", vid);

		$(".new-addon .new-item .extracted-vid").show();
		$(".new-addon .new-item .vid-url-container").hide();
	}
	else{
		var url = $("ul.sortable li[value='"+li+"'] .vid-url").val();
		vid = url.replace('watch?v=', 'embed/');

		$("ul.sortable li[value='"+li+"'] iframe").attr("src", vid);

		$("ul.sortable li[value='"+li+"'] .extracted-vid").show();
		$("ul.sortable li[value='"+li+"'] .vid-url-container").hide();
	}
}

function isURL(text){
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	return regexp.test(text);
}

function extract_image(li, type, kind){
	if(validate_addon(li, type, kind)){
		$(".loader").show();
		if(kind == 'new'){
			var imgtype = $(".new-addon .new-item .picture .img-anchor").hasClass("a-upload");
			if(!imgtype){
				var image = $(".new-addon .new-item .picture .url-img .imgurl").val();
				$(".new-addon .new-item .picture .def-image img").attr("src", image);
				$(".new-addon .new-item .img-hid").val(image);
				$(".new-addon .new-item .img-desc-con").show();
				$(".loader").hide();
			}
		}
		else{
			var imgtype = $("ul.sortable li[value='"+li+"'] .picture .img-anchor").hasClass("a-upload");
			if(!imgtype){
				var image = $("ul.sortable li[value='"+li+"'] .picture .url-img .imgurl").val();
				$("ul.sortable li[value='"+li+"'] .picture .def-image img").attr("src", image);
				$("ul.sortable li[value='"+li+"'] .img-hid").val(image);
				$("ul.sortable li[value='"+li+"'] .img-desc-con").show();
				$(".loader").hide();
			}
		}
	}
}

function select_img_type(li, type, kind){

	if(kind == 'new'){
		var anchorClass = $(".new-addon .new-item .img-anchor").hasClass("a-url");
		if(anchorClass){
			$(".new-addon .new-item .img-anchor").removeClass("a-url");
			$(".new-addon .new-item .img-anchor").addClass("a-upload");
			$(".new-addon .new-item .img-anchor").text("Image From URL");
			$(".new-addon .new-item .url-img").hide();
			$(".new-addon .new-item .upload-img-con").show();
			$(".new-addon .new-item .img-desc-con").show();
		}
		else{
			$(".new-addon .new-item .img-anchor").removeClass("a-upload");
			$(".new-addon .new-item .img-anchor").addClass("a-url");
			$(".new-addon .new-item .img-anchor").text("Upload an Image");
			$(".new-addon .new-item .url-img").show();
			$(".new-addon .new-item .upload-img-con").hide();
			$(".new-addon .new-item .img-desc-con").hide();
		}
	}
	else{
		var anchorClass = $("ul.sortable li[value='"+li+"'] .img-anchor").hasClass("a-url");
		if(anchorClass){
			$("ul.sortable li[value='"+li+"'] .img-anchor").removeClass("a-url");
			$("ul.sortable li[value='"+li+"'] .img-anchor").addClass("a-upload");
			$("ul.sortable li[value='"+li+"'] .img-anchor").text("Image From URL");
			$("ul.sortable li[value='"+li+"'] .url-img").hide();
			$("ul.sortable li[value='"+li+"'] .upload-img-con").show();
			$("ul.sortable li[value='"+li+"'] .img-desc-con").show();
		}
		else{
			$("ul.sortable li[value='"+li+"'] .img-anchor").removeClass("a-upload");
			$("ul.sortable li[value='"+li+"'] .img-anchor").addClass("a-url");
			$("ul.sortable li[value='"+li+"'] .img-anchor").text("Upload an Image");
			$("ul.sortable li[value='"+li+"'] .url-img").show();
			$("ul.sortable li[value='"+li+"'] .upload-img-con").hide();
			$("ul.sortable li[value='"+li+"'] .img-desc-con").hide();
		}
	}
}

function valid_file_extension(file, type){

}

function validate_addon(li, type, kind){
	var checker = 0;
	if(type == 'text'){
		if($(".new-addon .new-item textarea.texts").val() == ""){
			setTimeout(function(){
				$("<span class='label label-danger err'>No texts inputted.</span>").insertBefore(".new-addon .new-item textarea.texts");
			}, 1000);
			setTimeout(function(){
				$(".new-item span.err").hide('slow', function(){
					$(".new-item span.err").remove();
				});
				
			}, 5000);
			checker++;
		}
		if(checker > 0){
			return false;
		}
		else{
			return true;
		}
	}
	else if(type == 'picture'){
		if(kind == 'new'){
			var imgtype = $(".new-addon .new-item .picture .img-anchor").hasClass("a-upload");

			if(!imgtype){
				var image = $(".new-addon .new-item .picture .url-img .imgurl").val();
				if(image == ""){
					setTimeout(function(){
						$("<span class='label label-danger err'>Input a URL.</span>").insertBefore(".new-addon .new-item .imgurl");
					}, 1000);
					setTimeout(function(){
						$(".new-item span.err").hide("drop", {'direction' : 'down'}, 'slow').done(function(){ $('.new-item span.err').remove();});
					}, 5000);
					checker++;
				}
				else if(!isURL(image)){
					setTimeout(function(){
						$("<span class='label label-danger err'>This is not a valid URL</span>").insertBefore(".new-addon .new-item .imgurl");
					}, 1000);
					setTimeout(function(){
						$(".new-item span.err").hide("drop", {'direction' : 'down'}, 'slow').done(function(){ $('.new-item span.err').remove();});
					}, 5000);
					checker++;
				}
				if(checker > 0){
					return false;
				}
				else{
					return true;
				}
			}
			else{
				var image = $(".new-addon .new-item .picture .url-upload .upload-img").val();
				var img_hid = $(".new-addon .new-item .picture .img-hid").val();
				if(image == ""){
					setTimeout(function(){
						$("<span class='label label-danger err'>Choose A file to upload</span>").insertBefore(".new-addon .new-item .upload-img");
					}, 1000);
					setTimeout(function(){
						$(".new-item span.err").hide('slow', function(){
							$(".new-item span.err").remove();
						});
					}, 5000);
					checker++;
				}
				else if(img_hid == ""){
					setTimeout(function(){
						$("<span class='label label-danger err'>Click check button.</span>").insertBefore(".new-addon .new-item .upload-img");
					}, 1000);
					setTimeout(function(){
						$(".new-item span.err").hide('slow', function(){
							$(".new-item span.err").remove();
						});
					}, 5000);
					checker++;
				}
				if(checker > 0){
					return false;
				}
				else{
					return true;
				}
			}
		}
		else{
			var imgtype = $("ul.sortable li[value='"+li+"'] .picture .img-anchor").hasClass("a-upload");

			if(!imgtype){
				var image = $("ul.sortable li[value='"+li+"'] .picture .url-img .imgurl").val();
				if(image == ""){
					setTimeout(function(){
						$("<span class='label label-danger err'>Input a URL.</span>").insertBefore("ul.sortable li[value='"+li+"'] .imgurl");
					}, 1000);
					setTimeout(function(){
						$("ul.sortable li[value='"+li+"'] span.err").hide("drop", {'direction' : 'down'}, 'slow').done(function(){ $("ul.sortable li[value='"+li+"'] span.err").remove();});
					}, 5000);
					checker++;
				}
				else if(!isURL(image)){
					setTimeout(function(){
						$("<span class='label label-danger err'>This is not a valid URL</span>").insertBefore("ul.sortable li[value='"+li+"'] .imgurl");
					}, 1000);
					setTimeout(function(){
						$(".new-item span.err").hide("drop", {'direction' : 'down'}, 'slow').done(function(){ $("ul.sortable li[value='"+li+"'] span.err").remove();});
					}, 5000);
					checker++;
				}
				if(checker > 0){
					return false;
				}
				else{
					return true;
				}
			}
			else{
				var image = $("ul.sortable li[value='"+li+"'] .picture .url-upload .upload-img").val();
				var img_hid = $("ul.sortable li[value='"+li+"'] .img-hid").val();
				if(image == ""){
					setTimeout(function(){
						$("<span class='label label-danger err'>Choose A file to upload</span>").insertBefore("ul.sortable li[value='"+li+"'] .upload-img");
					}, 1000);
					setTimeout(function(){
						$("ul.sortable li[value='"+li+"'] span.err").hide('slow', function(){
							$("ul.sortable li[value='"+li+"'] span.err").remove();
						});
					}, 5000);
					checker++;
				}
				else if(img_hid == ""){
					setTimeout(function(){
						$("<span class='label label-danger err'>Click Check button.</span>").insertBefore("ul.sortable li[value='"+li+"'] .upload-img");
					}, 1000);
					setTimeout(function(){
						$("ul.sortable li[value='"+li+"'] span.err").hide('slow', function(){
							$("ul.sortable li[value='"+li+"'] span.err").remove();
						});
					}, 5000);
					checker++;
				}
				if(checker > 0){
					return false;
				}
				else{
					return true;
				}
			}
		}
	}
	else if(type == 'tag'){
		if(kind == 'new'){
			if($(".new-addon .new-item .tag").val() == ""){
				setTimeout(function(){
					$("<span class='label label-danger err'>Insert a Tag Title</span>").insertBefore(".new-addon .new-item .tag");
				}, 1000);
				setTimeout(function(){
					$(".new-item span.err").hide('slow', function(){
						$('.new-item span.err').remove();
					});
				}, 5000);
				checker++;
			}
			if(checker > 0){
				return false;
			}
			else{
				return true;
			}
		}
		else{
			if($("ul.sortable li[value='"+li+"'] .tag").val() == ""){
				setTimeout(function(){
					$("<span class='label label-danger err'>Insert a Tag Title</span>").insertBefore("ul.sortable li[value='"+li+"'] .tag");
				}, 1000);
				setTimeout(function(){
					$("ul.sortable li[value='"+li+"'] span.err").hide('slow', function(){
						$("ul.sortable li[value='"+li+"'] span.err").remove();
					});
				}, 5000);
				checker++;
			}
			if(checker > 0){
				return false;
			}
			else{
				return true;
			}
		}
	} 
}
function check_image(li, type, kind){
	var checker = 0;
	if(kind == 'new'){
		var image = $(".new-addon .new-item .picture .url-upload .upload-img").val();
		if(image == ""){
			setTimeout(function(){
				$("<span class='label label-danger err'>Choose A file to upload</span>").insertBefore(".new-addon .new-item .upload-img");
			}, 1000);
			setTimeout(function(){
				$(".new-addon .new-item span.err").hide('slow', function(){
					$("ul.sortable li[value='"+li+"'] span.err").remove();
				});
			}, 5000);
			checker++;
		}
		if(checker > 0){
			return false;
		}
		else{
			return true;
		}
	}
	else{
		var image = $("ul.sortable li[value='"+li+"'] .picture .url-upload .upload-img").val();
		if(image == ""){
			setTimeout(function(){
				$("<span class='label label-danger err'>Choose A file to upload</span>").insertBefore("ul.sortable li[value='"+li+"'] .upload-img");
			}, 1000);
			setTimeout(function(){
				$("ul.sortable li[value='"+li+"'] span.err").hide('slow', function(){
					$("ul.sortable li[value='"+li+"'] span.err").remove();
				});
			}, 5000);
			checker++;
		}
		if(checker > 0){
			return false;
		}
		else{
			return true;
		}
	}
}
function favorite_article(article, user){
	$.post('article/favorited', {
		'article' : article,
		'user'	: user
	}).done(function(){
		alert("Favorited!");
	});
}