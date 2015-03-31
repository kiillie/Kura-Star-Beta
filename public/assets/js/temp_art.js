$(document).ready(function(){
	addonHovered("", "");
	count_image();
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
							'<div class="item-inner">'+
							'<div class="text">'+
							'<pre>'+text+'</pre>'+
							'</div>'+
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
				insert_addon();
			}
			$(".loader").hide();
			addonHovered(type, kind);
		}
	}
	else if(type == 'picture'){
		if(validate_addon(li, type, kind)){
			if(kind == 'new'){
				var desc = $(".new-addon .new-item .img-desc").val();

				if($(".new-addon .new-item .img-anchor").hasClass("a-url")){
					var res = $(".new-addon .new-item .imgurl").val();
					var resource = getRootUrl(res);
					var orig = getOrigin(res);
					var src = $(".new-addon .new-item .img-hid").val();
					var image = '<a class="art-added-img" href="'+src+'" title="'+src+'" data-fancybox-group="gallery"><img class="image" src="'+src+'" alt="'+res+'" /></a>'+
                				'<div class="url-source"><span>Source: <a href="'+orig+'" target="_blank" alt="'+resource+'">'+resource+'</a></span></div>';
				}
				else{
					var src = $(".new-addon .new-item .img-hid").val();
					var image = '<a class="art-added-img" href="'+src+'" title="'+desc+'" data-fancybox-group="gallery"><img class="image" src="'+src+'" alt="'+src+'" /></a>'+
								'<p class="desc">'+desc+'</p>';
				}
				$('.new-addon .new-item').html("");
			}
			else{
				var desc = $("ul.sortable li[value='"+li+"'] .img-desc").val();

				if($("ul.sortable li[value='"+li+"'] .img-anchor").hasClass("a-url")){
					var res = $("ul.sortable li[value='"+li+"'] .imgurl").val();
					var resource = getRootUrl(res);
					var orig = getOrigin(res);
					var src = $("ul.sortable li[value='"+li+"'] .img-hid").val();
					var image = '<a class="art-added-img" href="'+src+'" title="'+src+'" data-fancybox-group="gallery"><img class="image" src="'+src+'" alt="'+res+'" /></a>'+
                				'<div class="url-source"><span>Source: <a href="'+orig+'" target="_blank" alt="'+resource+'">'+resource+'</a></span></div>';
				}
				else{
					var src = $("ul.sortable li[value='"+li+"'] .img-hid").val();
					var image = '<a class="art-added-img" href="'+src+'" title="'+desc+'" data-fancybox-group="gallery"><img class="image" src="'+src+'" alt="'+src+'" /></a>'+
								'<p class="desc">'+desc+'</p>';
				}
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
				insert_addon();
			}
			count_image();
			$(".loader").hide();
			addonHovered(type, kind);
		}
	}
	else if(type == 'reference'){
		if(validate_addon(li, type, kind)){
			if(kind == 'new'){
				var text = $(".new-addon .new-item .ref-desc").val();
				var url = $(".new-addon .new-item .ref-url").val();
				if(url == ""){
					var quote = '<div class="quote"><p><span class="quote-img">"</span> <span class="quote-text">'+text+'</span></p></div>';
				}
				else{
					var quote = '<div class="quote"><p><span class="quote-img">"</span> <span class="quote-text">'+text+'</span></p></div>'+
							'<div class="quote-url"><span>Source:</span><span class="url-val"> <a href="'+url+'" target="_blank">'+url+'</span></div>';
				}
			}
			else{
				var text = $("ul.sortable li[value='"+li+"'] .ref-desc").val();
				var url = $("ul.sortable li[value='"+li+"'] .ref-url").val();
				if(url == ""){
					var quote = '<div class="quote"><p><span class="quote-img">"</span> <span class="quote-text">'+text+'</span></p></div>';
				}
				else{
					var quote = '<div class="quote"><p><span class="quote-img">"</span> <span class="quote-text">'+text+'</span></p></div>'+
								'<div class="quote-url"><span>Source:</span><span class="url-val"> <a href="'+url+'" target="_blank">'+url+'</a></span></div>';
				}
			}
			var content =	'<li class="ui-state-default added-addon">'+
							'<div class="item-added-container">'+
							'<div class="item-inner text">'+
							'<div class="ref-container">'+quote+'</div>'+
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
					$(".new-addon .new-item").html("");
					$(".addons-container .sortable").prepend(content);
					insert_addon();
			}
			else{
				var current = $('ul.sortable li[value="'+li+'"]');
				$("ul.sortable li[value='"+li+"'] .append-new-item").hide();
				current.after(content);
				insert_addon();
			}
			count_image();
			$(".loader").hide();
			addonHovered(type, kind);
		}
	}
	else if(type == 'link'){
		if(kind == 'new'){
			var title = $(".new-addon .new-item .link-title").val();
			var linkdesc = $(".new-addon .new-item .link-description").val();
			var url = $(".new-addon .new-item .link-url-text").text();
			var desc = $(".new-addon .new-item .link-extra-text").val();
			var link =	'<h2 class="link-title"><a href="'+url+'" target="_blank">'+title+'</a></h2>'+
						'<div class="link-desc"><p>'+linkdesc+'</p></div>'+
						'<div class="link-extra"><p>'+desc+'</p></div>';
			
			$(".new-addon .new-item").html("");
		}
		else{
			var title = $("ul.sortable li[value='"+li+"'] .link-title").val();
			var linkdesc = $("ul.sortable li[value='"+li+"'] .link-description").val();
			var url = $("ul.sortable li[value='"+li+"'] .link-url-text").text();
			var desc = $("ul.sortable li[value='"+li+"'] .link-extra-text").val();
			var link =	'<h2 class="link-title"><a href="'+url+'" target="_blank">'+title+'</a></h2>'+
						'<div class="link-desc"><p>'+linkdesc+'</p></div>'+
						'<div class="link-extra"><p>'+desc+'</p></div>';
		}
		var content =	'<li class="ui-state-default added-addon">'+
						'<div class="item-added-container">'+
						'<div class="item-inner text">'+
						'<div class="link-wrapper">'+link+"</div>"+
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
			$("ul.sortable li[value='"+li+"'] .item-btn-con").show();
			current.after(content);
			insert_addon();
		}
		count_image();
		$(".loader").hide();
		addonHovered(type, kind);
	}
	else if(type == 'twitter'){
		if(kind == 'new'){
			if(validate_addon(li, type, kind)){
				var tweet = $(".new-addon .new-item .url-tweet").val();
				var ind = tweet.indexOf("status") + 7;
				var id = tweet.substring(ind);
				$('.new-addon .new-item').html("");
				$(".loader").show();
				$.post("/addon/tweet", {
					'id' : id
				}).done(function(res){
					var tweet = res;
					var content =	'<li class="ui-state-default added-addon">'+
									'<div class="item-added-container">'+
									'<div class="item-inner text">'+
									'<div class="tweet-wrapper">'+tweet+"</div>"+
									'</div>'+
									'<div class="editlist">'+
									'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
									'</div>'+
									'</div>'+
									'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
									'<input type="hidden" class="type" value="'+type+'">'+
									'<input type="hidden" class="kind" value="'+kind+'">'+
									'</li>';
					$(".addons-container .sortable").prepend(content);
					insert_addon();
					$(".loader").hide();
					addonHovered(type, kind);
				}).fail(function(){
					$(".new-addon .new-item").html("<span class='label label-danger err'>No tweets found.</span>");
					setTimeout(function(){
						$(".new-addon .new-item .err").fadeOut(function(){
							$(".new-addon .new-item .err").remove();
						});
					}, 5000)
				});
			}
		}
		else{
			if(validate_addon(li, type, kind)){
				var tweet = $("ul.sortable li[value='"+li+"'] .url-tweet").val();
				var ind = tweet.indexOf("status") + 7;
				var id = tweet.substring(ind);
				$('.new-addon .new-item').html("");
				$(".loader").show();
				$.post("/addon/tweet", {
					'id' : id
				}).done(function(res){
					var tweet = res;
					var content =	'<li class="ui-state-default added-addon">'+
									'<div class="item-added-container">'+
									'<div class="item-inner text">'+
									'<div class="tweet-wrapper">'+tweet+"</div>"+
									'</div>'+
									'<div class="editlist">'+
									'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
									'</div>'+
									'</div>'+
									'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
									'<input type="hidden" class="type" value="'+type+'">'+
									'<input type="hidden" class="kind" value="'+kind+'">'+
									'</li>';
					var current = $('ul.sortable li[value="'+li+'"]');
					$("ul.sortable li[value='"+li+"'] .append-new-item").hide();
					$("ul.sortable li[value='"+li+"'] .item-btn-con").show();
					current.after(content);
					insert_addon();
					addonHovered(type, kind);
				}).fail(function(){
					$('ul.sortable li[value="'+li+'"]').html("<span class='label label-danger err'>No tweets found.</span>");
					setTimeout(function(){
						$('ul.sortable li[value="'+li+'"] .err').fadeOut(function(){
							$('ul.sortable li[value="'+li+'"] .err').remove();
						});
					}, 5000)
				});
			}
		}
	}
	else if(type == 'video'){
		if(kind == 'new'){
			var src = $(".new-addon .new-item iframe").attr("src");
			var desc = $(".new-addon .new-item .vid-desc").val();
			var resource = getRootUrl(src);
			var orig = getOrigin(src);
			var video = '<iframe class="vid-display" src="'+src+'" width="600" height="400">#</iframe>'+
						'<div class="url-source"><span>Source: <a href="'+orig+'" target="_blank" alt="'+resource+'">'+resource+'</a></span></div>'+
						'<p class="vid-p-desc">'+desc+'</p>';
			$('.new-addon .new-item').html("");
		}
		else{
			var src = $("ul.sortable li[value='"+li+"'] iframe").attr("src");
			var desc = $("ul.sortable li[value='"+li+"'] .vid-desc").val();
			var resource = getRootUrl(src);

			var orig = getOrigin(src);

			var video =  '<iframe class="vid-display" src="'+src+'" width="600" height="400">#</iframe>'+		 
						 '<div class="url-source"><span>Source: <a href="'+orig+'" target="_blank" alt="'+resource+'">'+resource+'</a></span></div>'+
						 '<p class="vid-p-desc">'+desc+'</p>';
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
			insert_addon();
		}

		$(".loader").hide();
		addonHovered(type, kind);
	}
	else if(type == 'tag'){
		if(validate_addon(li, type, kind)){
			if(kind == 'new'){
				var text = $(".new-item .tag").val();
				var tagtype = $(".new-addon .new-item .tag-heading").val();
				$('.new-addon .new-item').html("");
				if(tagtype != 'normal'){
					text = '<h2 class="subheading"><span class="tag-bul" style="color: rgba(237, 113, 0, 1);">■</span> <span class="inner-tag">'+text+'</span></h2>';
				}
				else{
					text = '<h2 class="normal" style="border-bottom: 4px solid; border-color: rgba(237, 113, 0, 1);"><span class="inner-tag">'+text+'</span></h2>';
				}
			}
			else{
				var text = $("ul.sortable li[value='"+li+"'] .append-new-item .tag").val();
				var tagtype = $('ul.sortable li[value="'+li+'"] .tag-heading').val();
				$('ul.sortable li[value="'+li+'"] .append-new-item').html("");
				$('ul.sortable li[value="'+li+'"] .add-inner .item-btn-con').show();
				if(tagtype != 'normal'){
					text = '<h2 class="subheading"><span class="tag-bul" style="color: rgba(237, 113, 0, 1);">■</span> <span class="inner-tag">'+text+'</span></h2>';
				}
				else{
					text = '<h2 class="normal" style="border-bottom: 4px solid; border-color: rgba(237, 113, 0, 1);"><span class="inner-tag">'+text+'</span></h2>';
				}
			}
			$(".loader").show();
			var content = '<li class="ui-state-default added-addon">'+
							'<div class="item-added-container">'+
							'<div class="item-inner">'+
							'<div class="tag">'+text+'</div>'+
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
				insert_addon();
			}
			$(".loader").hide();
			addonHovered(type, kind);
		}
	}
	added_addon_val(type, kind);
}

function cancel_add(li, type, kind){
	if(kind == 'new'){
		
		if(type == 'picture'){
			//
			var image = $(".new-addon .new-item .def-img img").attr("src");
			if(image != "/assets/images/article-default.png"){

			}
			else{
				$(".new-addon .new-item").html("");
			}
		}
		else{
			$(".new-addon .new-item").html("");
		}
	}
	else{
		$("ul.sortable li[value='"+li+"'] .add-item-area .edit-area").remove();
		$("ul.sortable li[value='"+li+"'] .append-new-item").html("");
		$("ul.sortable li[value='"+li+"'] .append-new-item").css("display", "none");
		$("ul.sortable li[value='"+li+"'] .add-inner").show();
		show_appended_item_area(li);
	}
}

function editItem(li, type, kind){
	if(type == 'text'){
		var text = $("ul.sortable li[value='"+li+"'] .add-item-area .texts").val();
		$(".loader").hide();
		if(validate_addon(li, type, kind)){
			var content = 	'<div class="item-added-container">'+
							'<div class="item-inner text">'+
							'<pre>'+text+'</pre>'+
							'</div>'+
							'<div class="editlist">'+
							'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
							'</div>'+
							'</div>'+
							'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
							'<input type="hidden" class="type" value="'+type+'">'+
							'<input type="hidden" class="kind" value="'+kind+'">';

			$("ul.sortable li[value='"+li+"']").html(content);
			
			addonHovered(type, kind);
			insert_addon();
			$("ul.sortable li[value='"+li+"'] .add-item-area").html("");
		}
	}
	else if(type == 'picture'){
		var src = $("ul.sortable li[value='"+li+"'] .def-image img").attr("src");
		var desc = $("ul.sortable li[value='"+li+"'] .add-item-area .img-desc").val();
		var image = '<a class="art-added-img" href="'+src+'" title="'+src+'" data-fancybox-group="gallery"><img class="image" src="'+src+'" alt="'+src+'" /></a>'+
					'<p class="desc">'+desc+'</p>';
		var source = $("ul.sortable li[value='"+li+"'] .add-item-area .img-hid").val();
		if(src != source){
			var resource = getRootUrl(source);
  			var orig = getOrigin(source);
			var image = '<a class="art-added-img" href="'+src+'" title="'+src+'" data-fancybox-group="gallery"><img class="image" src="'+src+'" alt="'+source+'" /></a>'+
                		'<div class="url-source"><span>Source: <a href="'+orig+'" target="_blank" alt="'+resource+'">'+resource+'</a></span></div>'+  
                		'<p class="desc">'+desc+'</p>';
		}

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
			insert_addon();
			count_image();
	}
	else if(type == 'reference'){
		if(validate_addon(li, type, kind)){
			var text = $("ul.sortable li[value='"+li+"'] .ref-desc").val();
			var url = $("ul.sortable li[value='"+li+"'] .ref-url").val();
			
			if(url == ""){
				var quote = '<div class="quote"><p><span class="quote-img">"</span> <span class="quote-text">'+text+'</span></p></div>';
			}
			else{
				var quote = '<div class="quote"><p><span class="quote-img">"</span> <span class="quote-text">'+text+'</span></p></div>'+
							'<div class="quote-url"><span>Source:</span><span class="url-val"> <a href="'+url+'" target="_blank">'+url+'</a></span></div>';
			}
			var content =	'<div class="item-added-container">'+
							'<div class="item-inner text">'+
							'<div class="ref-container">'+quote+'</div>'+
							'</div>'+
							'<div class="editlist">'+
							'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
							'</div>'+
							'</div>'+
							'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
							'<input type="hidden" class="type" value="'+type+'">'+
							'<input type="hidden" class="kind" value="'+kind+'">';
			$(".new-addon .new-item").html("");
			$("ul.sortable li[value='"+li+"']").html(content);
			$(".loader").hide();
			addonHovered(type, kind);
			insert_addon();
		}
	}
	else if(type == 'link'){
		var title = $("ul.sortable li[value='"+li+"'] input.link-title").val();
		
		var linkdesc = $("ul.sortable li[value='"+li+"'] .link-description").val();
		var url = $("ul.sortable li[value='"+li+"'] .link-url-text").text();
		var desc = $("ul.sortable li[value='"+li+"'] .link-extra-text").val();
		var link =	'<h2 class="link-title"><a href="'+url+'" target="_blank">'+title+'</a></h2>'+
					'<div class="link-desc"><p>'+linkdesc+'</p></div>'+
					'<div class="link-extra"><p>'+desc+'</p></div>';
		alert(link);
		var content =	'<div class="item-added-container">'+
						'<div class="item-inner text">'+
						'<div class="link-wrapper">'+link+"</div>"+
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
		insert_addon();
	}
	else if(type == 'video'){
		var src = $("ul.sortable li[value='"+li+"'] iframe").attr("src");
		var desc = $("ul.sortable li[value='"+li+"'] .vid-desc").val();
		var resource = getRootUrl(src);
		var orig = getOrigin(src);

		var video = '<iframe class="vid-display" src="'+src+'" width="600" height="400">#</iframe>'+
						'<div class="url-source"><span>Source: <a href="'+orig+'" target="_blank" alt="'+resource+'">'+resource+'</a></span></div>'+
						'<p class="vid-p-desc">'+desc+'</p>';

		$(".loader").show();
		var content = 	'<div class="item-added-container">'+
						'<div class="item-inner text">'+
						'<div class="vid-wrapper">'+video+"</div>"+
						'</div>'+
						'<div class="editlist">'+
						'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
						'</div>'+
						'</div>'+
						'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
						'<input type="hidden" class="type" value="'+type+'">'+
						'<input type="hidden" class="kind" value="'+kind+'">';
			$("ul.sortable li[value='"+li+"']").html(content);
			addonHovered(type, kind);
			insert_addon();
	}
	else if(type == "tag"){
		var text = $("ul.sortable li[value='"+li+"'] input.tag").val();
		var tagtype = $("ul.sortable li[value='"+li+"'] .tag-heading").val();
			
			if(tagtype != 'normal'){
				text = '<h2 class="subheading"><span class="tag-bul" style="color: rgba(237, 113, 0, 1);">■</span> <span class="inner-tag">'+text+'</span></h2>';
			}
			else{
				text = '<h2 class="normal" style="border-bottom: 4px solid; border-color: rgba(237, 113, 0, 1);"><span class="inner-tag">'+text+'</span></h2>';
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
						'<input type="hidden" class="kind" value="'+kind+'">';

		$("ul.sortable li[value='"+li+"']").html(content);
		addonHovered(type, kind);
		insert_addon();
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
		$("ul.sortable li.added-addon").eq(i).find(".editItem").attr("onclick", "edit_addon('"+(i+1)+"', '"+type+"', 'addon', 'edit', 'edit')");
		$("ul.sortable li.added-addon").eq(i).find(".deleteItem").attr("onclick", "delete_item('"+(i+1)+"', '"+type+"', 'new')");
	}
	$(".loader").hide();
}

function addonHovered(type, kind){
	var editbtns1 = '<ul class="list-inline editbtns1"><li><button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button></li><li><button class="deleteItem" onclick="delete_item(\''+type+'\', \''+kind+'\')"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var editbtns2 = '<ul class="list-inline editbtns2"><li><button class="movetop"><span class="glyphicon glyphicon-arrow-up"></span> Move To Top</button></li><li><button class="moveup"><span class="glyphicon glyphicon-chevron-up"></span> Move Up</button></li><li><button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button></li><li><button class="deleteItem" onclick="delete_item(\''+type+'\', \''+kind+'\')"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var editbtns3 = '<ul class="list-inline editbtns3"><li><button class="movebottom"><span class="glyphicon glyphicon-arrow-down"></span> Move To Bottom</button></li><li><button class="movedown"><span class="glyphicon glyphicon-chevron-down"></span> Move Down</button></li><li><button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button></li><li><button class="deleteItem" onclick="delete_item(\''+type+'\', \''+kind+'\')"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var editbtns4 = '<ul class="list-inline editbtns4"><li><button class="movetop"><span class="glyphicon glyphicon-arrow-up"></span> Move to Top</button></li><li><button class="moveup"><span class="glyphicon glyphicon-chevron-up"></span> Move Up</button></li><li><button class="movebottom"><span class="glyphicon glyphicon-arrow-down"></span> Move To Bottom</button></li><li><button class="movedown"><span class="glyphicon glyphicon-chevron-down"></span> Move Down</button></li><li><button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button></li><li><button class="deleteItem" onclick="delete_item(\''+type+'\', \''+kind+'\')"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	
	//Twitter
	var editbtns5 = '<ul class="list-inline editbtns1"><li><button class="deleteItem" onclick="delete_item(\''+type+'\', \''+kind+'\')"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var editbtns6 = '<ul class="list-inline editbtns5"><li><button class="movetop"><span class="glyphicon glyphicon-arrow-up"></span> Move To Top</button></li><li><button class="moveup"><span class="glyphicon glyphicon-chevron-up"></span> Move Up</button></li><li><button class="deleteItem" onclick="delete_item(\''+type+'\', \''+kind+'\')"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var editbtns7 = '<ul class="list-inline editbtns3"><li><button class="movebottom"><span class="glyphicon glyphicon-arrow-down"></span> Move To Bottom</button></li><li><button class="movedown"><span class="glyphicon glyphicon-chevron-down"></span> Move Down</button></li><li><button class="deleteItem" onclick="delete_item(\''+type+'\', \''+kind+'\')"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var editbtns8 = '<ul class="list-inline editbtns6"><li><button class="movetop"><span class="glyphicon glyphicon-arrow-up"></span> Move to Top</button></li><li><button class="moveup"><span class="glyphicon glyphicon-chevron-up"></span> Move Up</button></li><li><button class="movebottom"><span class="glyphicon glyphicon-arrow-down"></span> Move To Bottom</button></li><li><button class="movedown"><span class="glyphicon glyphicon-chevron-down"></span> Move Down</button></li><li><button class="deleteItem" onclick="delete_item(\''+type+'\', \''+kind+'\')"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button></li><li class="right sort"><span class="sort-item"><span class="glyphicon glyphicon-move"></span> Sort this item</span></li></ul>';
	var ind = "";
	$(".item-added-container").hover(function(){
		$(this).find('.editlist').css('visibility', 'visible');
		ind = $(this).parent().index();
		var countchildren = $('.addons-container ul li.added-addon').length;
		type = $(this).parent().find(".type").val();

		if(countchildren == 1 && ind == 0){
			if(type == 'twitter'){
				$(this).find('.editlist').html(editbtns5);
				moveUpAndDown(type, kind);
				added_addon_val(type, kind);
			}
			else{
				$(this).find('.editlist').html(editbtns1);
				moveUpAndDown(type, kind);
				added_addon_val(type, kind);
			}
		}
		else if(countchildren > 1){
			if(ind == 0){
				if(type == 'twitter'){
					$(this).find('.editlist').html(editbtns7);
					moveUpAndDown(type, kind);
					added_addon_val(type, kind);
				}
				else{
					$(this).find('.editlist').html(editbtns3);
					moveUpAndDown(type, kind);
					added_addon_val(type, kind);
				}
			}
			else if(ind == (countchildren-1)){
				if(type == 'twitter'){
					$(this).find('.editlist').html(editbtns6);
					moveUpAndDown(type, kind);
					added_addon_val(type, kind);
				}
				else{
					$(this).find('.editlist').html(editbtns2);
					moveUpAndDown(type, kind);
					added_addon_val(type, kind);
				}
			}
			else{
				if(type == 'twitter'){
					$(this).find('.editlist').html(editbtns8);
					moveUpAndDown(type, kind);
					added_addon_val(type, kind);
				}
				else{
					$(this).find('.editlist').html(editbtns4);
					moveUpAndDown(type, kind);
					added_addon_val(type, kind);
				}
			}

		}
	}, function(){
		$(this).find('.editlist').css('visibility', 'hidden');
	});
	$(".addons-container ul li.added-addon").hover(function(){
		$(this).find('.add-inner').css('display', 'block');
	}, function(){
		$(this).find('.add-inner').css('display', 'none');
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
			$(".loader").hide();
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
	if(validate_addon(li, type, kind)){
		if(kind == 'new'){
			var url = $(".new-addon .new-item .vid-url").val();
			vid = url.replace('watch?v=', 'embed/');
			$(".loader").show();
			$(".new-addon .new-item iframe").attr("src", vid);
			$(".new-addon .new-item iframe").load(function(){
				$(".loader").hide();
				$(".new-addon .new-item .extracted-vid").show();
				$(".new-addon .new-item .vid-url-container").hide();
			});
			
		}
		else{
			var url = $("ul.sortable li[value='"+li+"'] .vid-url").val();
			vid = url.replace('watch?v=', 'embed/');
			$(".loader").show();
			$("ul.sortable li[value='"+li+"'] iframe").attr("src", vid);
			$("ul.sortable li[value='"+li+"'] iframe").load(function(){
				$("ul.sortable li[value='"+li+"'] .extracted-vid").show();
				$("ul.sortable li[value='"+li+"'] .vid-url-container").hide();
			});

		}
	}
}
function getRootUrl(url) {
	var src = document.createElement ('a');
	src.href = url;
	return src.hostname;
}
function getOrigin(url) {
	var src = document.createElement ('a');
	src.href = url;

	return src.protocol+"//"+src.hostname;
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
				$(".new-addon .new-item form.pic-addon").submit(function(e){
					e.preventDefault();
					$.ajax({
						url	: '/addon/picture',
						type : 'POST',
						data : new FormData(this),
						contentType : false,
						cache : false,
						processData : false,
						success : function(res){
							$(".new-addon .new-item .picture .def-image img").attr("src", res);
							$(".new-addon .new-item .img-hid").val(res);
							$(".new-addon .new-item .img-desc-con").show();
							$(".loader").hide();
						}
					});
				});
			}
		}
		else{
			
			var imgtype = $("ul.sortable li[value='"+li+"'] .picture .img-anchor").hasClass("a-upload");
			if(!imgtype){
				$("ul.sortable li[value='"+li+"'] form.pic-addon").submit(function(e){
					e.preventDefault();
					$.ajax({
						url	: '/addon/picture',
						type : 'POST',
						data : new FormData(this),
						contentType : false,
						cache : false,
						processData : false,
						success : function(res){
							$("ul.sortable li[value='"+li+"'] .picture .def-image img").attr("src", res);
							$("ul.sortable li[value='"+li+"'] .img-hid").val(res);
							$("ul.sortable li[value='"+li+"'] .img-desc-con").show();
							$(".loader").hide();
						}
					});
				});
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

function validate_addon(li, type, kind){
	var checker = 0;
	if(type == 'text'){
		if(kind == 'new'){
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
		}
		else{
			if($("ul.sortable li[value='"+li+"'] textarea.texts").val() == ""){
				
				setTimeout(function(){
					$("<span class='label label-danger err'>No texts inputted.</span>").insertBefore("ul.sortable li[value='"+li+"'] textarea.texts");
				}, 1000);
				setTimeout(function(){
					$("ul.sortable li[value='"+li+"'] span.err").hide('slow', function(){
						$("ul.sortable li[value='"+li+"'] span.err").remove();
					});
					
				}, 5000);
				checker++;
			}
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
						$(".new-item span.err").hide('slow', function(){
							$(".new-item span.err").remove();
						});
					}, 5000);
					checker++;
				}
				else if(!isURL(image)){
					setTimeout(function(){
						$("<span class='label label-danger err'>This is not a valid URL</span>").insertBefore(".new-addon .new-item .imgurl");
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
						$("ul.sortable li[value='"+li+"'] span.err").hide('slow', function(){
							$("ul.sortable li[value='"+li+"'] span.err").remove();
						});
					}, 5000);
					checker++;
				}
				else if(!isURL(image)){
					setTimeout(function(){
						$("<span class='label label-danger err'>This is not a valid URL</span>").insertBefore("ul.sortable li[value='"+li+"'] .imgurl");
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
	else if(type == 'reference'){
		if(kind == 'new'){
			var quote = $(".new-addon .new-item .ref-desc").val();
			var url = $(".new-addon .new-item .ref-url").val();
			if(url == ""){
				if(quote == ""){
					setTimeout(function(){
						$(".new-addon .new-item span.err").html("");
						$("<span class='label label-danger err'>Please input a quotation.</span>").insertBefore(".new-addon .new-item .ref-desc");
					}, 1000);
					setTimeout(function(){
						$(".new-addon .new-item span.err").fadeOut("slow", function(){
							$(this).remove();
						});
					}, 5000);
					checker++;
				}
			}
			else{
				if(!isURL(url)){
					setTimeout(function(){
						$(".new-addon .new-item span.err").html("");
						$("<span class='label label-danger err'>Not a valid URL.</span>").insertBefore(".new-addon .new-item .ref-url");
					}, 1000);
					setTimeout(function(){
						$(".new-addon .new-item span.err").fadeOut("slow", function(){
							$(this).remove();
						});
					}, 5000);
					checker++;
				}
				else if(quote == ""){
					setTimeout(function(){
						$(".new-addon .new-item span.err").html("");
						$("<span class='label label-danger err'>Please input a quotation.</span>").insertBefore(".new-addon .new-item .ref-desc");
					}, 1000);
					setTimeout(function(){
						$(".new-addon .new-item span.err").fadeOut("slow", function(){
							$(this).remove();
						});
					}, 5000);
					checker++;
				}
			}
			if(checker > 0){
				return false;
			}
			else{
				return true;
			}
		}
		else{
			var quote = $("ul.sortable li[value='"+li+"'] .ref-desc").val();
			var url = $("ul.sortable li[value='"+li+"'] .ref-url").val();
			if(url == ""){
				if(quote == ""){
					setTimeout(function(){
						$("ul.sortable li[value='"+li+"'] span.err").html("");
						$("<span class='label label-danger err'>Please input a quotation.</span>").insertBefore("ul.sortable li[value='"+li+"'] .ref-desc");
					}, 1000);
					setTimeout(function(){
						$("ul.sortable li[value='"+li+"'] span.err").fadeOut("slow", function(){
							$(this).remove();
						});
					}, 5000);
					checker++;
				}
			}
			else{
				if(!isURL(url)){
					setTimeout(function(){
						$("ul.sortable li[value='"+li+"'] span.err").html("");
						$("<span class='label label-danger err'>Not a valid URL.</span>").insertBefore("ul.sortable li[value='"+li+"'] .ref-url");
					}, 1000);
					setTimeout(function(){
						$("ul.sortable li[value='"+li+"'] span.err").fadeOut("slow", function(){
							$(this).remove();
						});
					}, 5000);
					checker++;
				}
				else if(quote == ""){
					setTimeout(function(){
						$("ul.sortable li[value='"+li+"'] span.err").html("");
						$("<span class='label label-danger err'>Please input a quotation.</span>").insertBefore("ul.sortable li[value='"+li+"'] .ref-desc");
					}, 1000);
					setTimeout(function(){
						$("ul.sortable li[value='"+li+"'] span.err").fadeOut("slow", function(){
							$(this).remove();
						});
					}, 5000);
					checker++;
				}
			}
			if(checker > 0){
				return false;
			}
			else{
				return true;
			}
		}
	}
	else if(type == 'link'){
		if(kind == 'new'){
			var link = $(".new-addon .new-item .link-url").val();
			if(link == ""){
				setTimeout(function(){
					$(".new-addon .new-item span.err").html("");
					$("<span class='err label label-danger'>Please enter the URL of the link.</span>").insertBefore(".new-addon .new-item .link-url");
				}, 1000);
				setTimeout(function(){
					$(".new-addon .new-item span.err").fadeOut(function(){
						$(".new-addon .new-item span.err").remove();
					});
				}, 5000);
				checker++;
			}
			else if(!isURL(link)){
				setTimeout(function(){
					$(".new-addon .new-item span.err").html("");
					$("<span class='err label label-danger'>Invalid link URL.</span>").insertBefore(".new-addon .new-item .link-url");
				}, 1000);
				setTimeout(function(){
					$(".new-addon .new-item span.err").fadeOut(function(){
						$(".new-addon .new-item span.err").remove();
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
			var link = $("ul.sortable li[value='"+li+"'] .link-url").val();
			if(link == ""){
				setTimeout(function(){
					$("ul.sortable li[value='"+li+"'] span.err").html("");
					$("<span class='err label label-danger'>Please enter the URL of the link.</span>").insertBefore("ul.sortable li[value='"+li+"'] .link-url");
				}, 1000);
				setTimeout(function(){
					$("ul.sortable li[value='"+li+"'] span.err").fadeOut(function(){
						$("ul.sortable li[value='"+li+"'] span.err").remove();
					});
				}, 5000);
				checker++;
			}
			else if(!isURL(link)){
				setTimeout(function(){
					$("ul.sortable li[value='"+li+"'] span.err").html("");
					$("<span class='err label label-danger'>Invalid link URL.</span>").insertBefore("ul.sortable li[value='"+li+"'] .link-url");
				}, 1000);
				setTimeout(function(){
					$("ul.sortable li[value='"+li+"'] span.err").fadeOut(function(){
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
	else if(type == "twitter"){
		if(kind == 'new'){
			var tweet = $(".new-addon .new-item .url-tweet").val();
			if(tweet == ""){
				$(".new-item span.err").text("");
				setTimeout(function(){
					$("<span class='label label-danger err'>Please input a Twitter status url</span>").insertBefore(".new-addon .new-item .url-tweet");
				}, 1000);
				setTimeout(function(){
					$(".new-addon .new-item span.err").fadeOut(function(){
						$(this).remove();
					});
				}, 5000);
				checker++;
			}
			else if(!isURL(tweet)){
				$(".new-item span.err").text("");
				setTimeout(function(){
					$("<span class='label label-danger err'>Please input a valid Twitter status url</span>").insertBefore(".new-addon .new-item .url-tweet");
				}, 1000);
				setTimeout(function(){
					$(".new-addon .new-item span.err").fadeOut(function(){
						$(this).remove();
					});
				}, 5000);
				checker++;
			}
			else if(is_tweet(tweet) === false){
				$(".new-item span.err").text("");
				setTimeout(function(){
					$("<span class='label label-danger err'>No tweets found</span>").insertBefore(".new-addon .new-item .url-tweet");
				}, 1000);
				setTimeout(function(){
					$(".new-addon .new-item span.err").fadeOut(function(){
						$(this).remove();
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
			var tweet = $("ul.sortable li[value="+li+"] .url-tweet").val();
			if(tweet == ""){
				$("ul.sortable li[value="+li+"] span.err").text("");
				setTimeout(function(){
					$("<span class='label label-danger err'>Please input a Twitter status url</span>").insertBefore("ul.sortable li[value="+li+"] .url-tweet");
				}, 1000);
				setTimeout(function(){
					$("ul.sortable li[value="+li+"] span.err").fadeOut(function(){
						$(this).remove();
					});
				}, 5000);
				checker++;
			}
			else if(!isURL(tweet)){
				$("ul.sortable li[value="+li+"] span.err").text("");
				setTimeout(function(){
					$("<span class='label label-danger err'>Please input a valid Twitter status url</span>").insertBefore("ul.sortable li[value="+li+"] .url-tweet");
				}, 1000);
				setTimeout(function(){
					$("ul.sortable li[value="+li+"] span.err").fadeOut(function(){
						$(this).remove();
					});
				}, 5000);
				checker++;
			}
			else if(is_tweet(tweet) === false){
				$("ul.sortable li[value="+li+"] span.err").text("");
				setTimeout(function(){
					$("<span class='label label-danger err'>No tweets found</span>").insertBefore("ul.sortable li[value="+li+"] .url-tweet");
				}, 1000);
				setTimeout(function(){
					$("ul.sortable li[value="+li+"] span.err").fadeOut(function(){
						$(this).remove();
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
	else if(type == "video"){
		if(kind == 'new'){
			var vid = $(".new-addon .new-item .vid-url").val();
			if(vid == ""){
				setTimeout(function(){
					$(".new-addon .new-item span.err").text("");
					$("<span class='label label-danger err'>Please input a url</span>").insertBefore(".new-addon .new-item .vid-url");
				}, 1000);
				setTimeout(function(){
					$(".new-item span.err").hide('slow', function(){
					$('.new-item span.err').remove();
					});
				}, 5000);
				checker++;
			}
			else if(is_youtube_video(vid) === false){
				setTimeout(function(){
					$("<span class='label label-danger err'>Please input a valid youtube url</span>").insertBefore(".new-addon .new-item .vid-url");
				}, 1000);
				setTimeout(function(){
					$(".new-item span.err").fadeOut('slow', function(){
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
			var vid = $("ul.sortable li[value='"+li+"'] .vid-url").val();
			if(vid == ""){
				setTimeout(function(){
					$("<span class='label label-danger err'>Please input a url</span>").insertBefore("ul.sortable li[value='"+li+"'] .vid-url");
				}, 1000);
				setTimeout(function(){
					$("ul.sortable li[value='"+li+"'] span.err").hide('slow', function(){
					$("ul.sortable li[value='"+li+"'] span.err").remove();
					});
				}, 5000);
				checker++;
			}
			else if(is_youtube_video(vid) === false){
				setTimeout(function(){
					$("<span class='label label-danger err'>Please input a valid youtube url</span>").insertBefore("ul.sortable li[value='"+li+"'] .vid-url");
				}, 1000);
				setTimeout(function(){
					$("ul.sortable li[value='"+li+"'] span.err").fadeOut('slow', function(){
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

function is_youtube_video(url) {
    var p = /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/;
    return (url.match(p)) ? RegExp.$1 : false;
}
function is_tweet(url) {
    var p = /^(?:https?:\/\/)?(?:www\.)?twitter\.com/;
    var res = (url.match(p)) ? RegExp.$1 : false;
   return res;

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
function favorite_article(article, user, status){
	var stat = $(".article .fave .stat").hasClass("favorite");
	$.post('/article/favorited', {
		'article' : article,
		'user' : user,
		'status' : status
	}).done(function(res){
		if(status == 'favorite'){
			if(res == "true"){
				if(stat){
					$(".article .fave .stat").removeClass("favorite");
					$(".article .fave .stat").addClass("unfavorite");
					$(".article .fave .stat i").text("Unfavorite");
					$(".article .fave .stat").attr("onclick", "favorite_article('"+article+"', '"+user+"', 'unfavorite')");
				}
			}
			else{
				alert("Not Added to your Favorites");
			}
		}
		else{
			if(res == "true"){
				if(!stat){
					$(".article .fave .stat").removeClass("unfavorite");
					$(".article .fave .stat").addClass("favorite");
					$(".article .fave .stat i").text("Favorite");
					$(".article .fave .stat").attr("onclick", "favorite_article('"+article+"', '"+user+"', 'favorite')");
				}
			}
			else{
				alert("Not removed from your Favorites");
			}	
		}
	});
}
function validate_article(){
	$("form[name='article']").one('submit', function(e){
		e.preventDefault();
		var error = 0;
		if($(".article-menu .nav-ctry input[name='country']").val() == 0){
			$("<span class='err' style='color: red;'>Select a Country</span>").insertAfter($(".article-menu .country button"));
			error++;
			setTimeout(function(){
				$(".article-menu .country span.err").fadeOut("slow", function(){
					$(".article-menu .country span.err").remove();
				});
			}, 6000);
		}
		if($(".article-menu .nav-cat input[name='category']").val() == 0){
			$("<span class='err' style='color: red;'>Select a Category</span>").insertAfter($(".article-menu .category button"));
			error++;
			setTimeout(function(){
				$(".article-menu .category span.err").fadeOut("slow", function(){
					$(".article-menu .country span.err").remove();
				});
			}, 6000);
		}
		if($(".art-title-desc input[name='title']").val() == ""){
			$("<span class='err' style='color: red;'>Please input a title</span>").insertAfter($(".art-title-desc input[name='title']"));
			error++;
			setTimeout(function(){
				$(".art-title-desc span.err").fadeOut("slow", function(){
					$(".article-title-desc span.err").remove();
				});
			}, 6000);
		}

		if(error == 0){
			$(this).submit();
		}
	});
}
function addclass_modal(pclass, li){
	if(pclass == 'new-tweet'){
		if(!$("#twitterSearch").hasClass(pclass)){
			$("#twitterSearch").addClass("new-tweet");
			$("#twitterSearch").removeClass("append-tweet");
			$("#twitterSearch .tweet-kind").val('new');
		}
	}
	else{
		if(!$("#twitterSearch").hasClass(pclass)){
			$("#twitterSearch").addClass("append-tweet");
			$("#twitterSearch").attr("value", li);
			$("#twitterSearch").removeClass("new-tweet");
			$("#twitterSearch .tweet-li").val(li);
			$("#twitterSearch .tweet-kind").val('append');
		}
	}
}
function add_img_class(li, type, kind){
	if(kind == 'new'){
		$(".image-search .search-li").val(li);
		$(".image-search .search-kind").val(kind);
	}
	else{
		$(".image-search .search-li").val(li);
		$(".image-search .search-kind").val(kind);
	}
}
function delete_article(id, user){
	var con = confirm("Are you sure you want to delete this article?");
	if(con){
		$.post("/article/delete", {
			'id' : id,
			'user' : user
		}).done(function(res){
			window.location.href = "/user/article/"+user;
		});
	}
}
function select_type_img(){
	var def_image = $(".art-default-img img").attr("src");
	if($(".url-setting .img-btns a").hasClass('disp-def')){
		$(".url-setting .img-btns input").removeClass("art-url-submit");
		$(".url-setting .img-btns input").addClass("art-img-submit");
		$(".url-setting .img-upload").css('display', 'block');
		$(".url-setting .img-url").css('display', 'none');
		$(".url-setting .img-upload input").val("");
		$(".art-default-img img").attr("src", def_image);
		$(".url-setting .img-btns a").text("Click to Add an Image URL");
		$(".url-setting .img-btns a").removeClass('disp-def');
		$(".url-setting .img-btns a").addClass('disp-up');
	}
	else{
		$(".url-setting .img-btns input").removeClass("art-img-submit");
		$(".url-setting .img-btns input").addClass("art-url-submit");
		$(".url-setting .img-upload").css('display', 'none');
		$(".url-setting .img-url").css('display', 'block');
		$(".url-setting .img-url input").val("");
		$(".art-default-img img").attr("src", def_image);
		$(".url-setting .img-btns a").text("Click to Upload an Image");
		$(".url-setting .img-btns a").removeClass('disp-up');
		$(".url-setting .img-btns a").addClass('disp-def');
	}
}
function record(url, result) {
     if(result == 'error'){
        return false;   
    }
    else if(result == 'success'){
        return true;   
    }
    else{
        return false;
    }
}
function testImage(url, callback, timeout) {
    timeout = timeout || 5000;
    var timedOut = false, timer;
    var img = new Image();
    img.onerror = img.onabort = function() {
        if (!timedOut) {
            clearTimeout(timer);
            callback(url, "error");
        }
    };
    img.onload = function() {
        if (!timedOut) {
            clearTimeout(timer);
            callback(url, "success");
        }
    };
    img.src = url;
    timer = setTimeout(function() {
        timedOut = true;
        callback(url, "timeout");
    }, timeout); 
}