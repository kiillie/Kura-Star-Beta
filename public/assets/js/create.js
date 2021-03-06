function edit_addon(li, type, controller, action, kind){
	
	if(action == 'new'){
		$(".loader").show();
		post_addon_data(li, type, controller, action, kind);
	}
	else if(action == 'edit'){
		edit_addon_data(li, type, controller, action, kind);
	}
}
function edit_addon_data(li, type, controller, action, kind){
	$.post(
		'/'+controller+"/"+action,
		{
			'li'   : li,
			'type' : type,
			'kind' : kind
		}).done(function(data){
			$("ul.sortable li[value='"+li+"'] .add-item-area").append("<div class='edit-area'>"+data+"</div>");
		});
}
function post_addon_data(li, type, controller, action, kind){
	var tosave = $("ul.sortable").html();
	$.post(
		'/'+controller+'/'+action,
		{
			'li'   : li,
			'type' : type,
			'kind' : kind,
			'content' : tosave

		}).done(function(data){
			if(kind == 'new'){
				$(".new-addon .new-item").html(data);
			}
			else{
				$("ul.sortable li[value='"+li+"'] .append-new-item").html(data);
				$("ul.sortable li[value='"+li+"'] .add-inner .show-append-here").html("");
				$("ul.sortable li[value='"+li+"'] .append-new-item").show();
			}
		});
}
$(".sortable").sortable({
	handle: '.sort-item',
	stop: function(event,ui){
		insert_addon();
	}
});

function show_appended_item_area(li){
	var addon = "";
	addon += '<ul class="append-add-item list-inline">';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'text\', \'addon\', \'new\', \'append\')">Text</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'picture\', \'addon\', \'new\', \'append\')">Picture</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'reference\', \'addon\', \'new\', \'append\')">Reference</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'link\', \'addon\', \'new\', \'append\')">Link</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'twitter\', \'addon\', \'new\', \'append\')">Twitter</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'video\', \'addon\', \'new\', \'append\')">Youtube</a></li>';
	addon += '<li><a href="javascript:void(0);" onclick="edit_addon(\''+li+'\', \'tag\', \'addon\', \'new\', \'append\')">H2 Tag</a></li>';
	addon += '<li class="remove-appended right"><a href="javascript:void(0);" onclick="close_appended('+li+')"><span class="glyphicon glyphicon-remove-circle"></span>X</a></li>';
	addon += '</ul>';

	$("ul.sortable li[value="+li+"] .add-inner .show-append-here").html(addon);
	$("ul.sortable li[value="+li+"] .add-inner .item-btn-con").hide();
}

function close_appended(li){
	$("ul.sortable li[value="+li+"] .add-inner .show-append-here").html("");
	$("ul.sortable li[value="+li+"] .add-inner .item-btn-con").show();
}

function color_changed(li, type, kind){
	var color = "";
	if(kind == 'new'){
		color = $(".new-addon .new-item .colorpicker").val();
		$(".new-addon .new-item .tag-bullet").css('color', color);
		$(".new-addon .new-item .tag-hr").css('border-color', color);
	}
	else{
		color = $("ul.sortable li[value='"+li+"'] .colorpicker").val();
		$("ul.sortable li[value='"+li+"'] .tag-bullet").css('color', color);
		$("ul.sortable li[value='"+li+"'] .tag-hr").css('border-color', color);
	}
}

function select_htype(li, type, kind){
	if(kind == 'new'){
		var tagtype = $(".new-addon .new-item .tag-heading").val();
		if(tagtype == 'normal'){
			$(".new-addon .new-item .tag-hr").show();
			$(".new-addon .new-item .tag-bullet").hide();
		}else{
			$(".new-addon .new-item .tag-hr").hide();
			$(".new-addon .new-item .tag-bullet").show();
		}
	}
	else{
		var tagtype = $("ul.sortable li[value='"+li+"'] .tag-heading").val();
		if(tagtype == 'normal'){
			$("ul.sortable li[value='"+li+"'] .tag-hr").show();
			$("ul.sortable li[value='"+li+"'] .tag-bullet").hide();
		}else{
			$("ul.sortable li[value='"+li+"'] .tag-hr").hide();
			$("ul.sortable li[value='"+li+"'] .tag-bullet").show();
		}
	}
}

function upload_image(li, type, kind){
	if(kind == 'new'){
			$(".new-addon .new-item #upload-addon").one('submit', function(e){
				e.preventDefault();
				if(check_image(li, type, kind)){
					$(".loader").show();
					$.ajax({
						url	: '/file/upload',
						type : 'POST',
						data : new FormData(this),
						contentType : false,
						cache : false,
						processData : false,
						success : function(res){
							if(res == "size"){
								setTimeout(function(){
									$("<span class='label label-danger err'>File chosen is too small.</span>").insertBefore(".new-addon .new-item .upload-img");
								}, 100);
								setTimeout(function(){
									$(".new-item span.err").hide("drop", {'direction' : 'down'}, 'slow').done(function(){ $('.new-item span.err').remove();});
								}, 5000);
								$(".loader").hide();
							}
							else if(res == "type"){
								setTimeout(function(){
									$("<span class='label label-danger err'>File chosen is not an image.</span>").insertBefore(".new-addon .new-item .upload-img");
								}, 100);
								setTimeout(function(){
									$(".new-item span.err").hide("drop", {'direction' : 'down'}, 'slow').done(function(){ $('.new-item span.err').remove();});
								}, 5000);
								$(".loader").hide();
							}
							else{
								$(".new-addon .new-item .def-image img").attr('src', res);
								$(".new-addon .new-item .img-hid").val(res);
								$(".loader").hide();
							}
						}
					});

				}
			});
	}
	else{
		$("ul.sortable li[value='"+li+"'] #upload-addon"). one('submit', function(e){
			e.preventDefault();
			if(check_image(li, type, kind)){
				$(".loader").show();
				$.ajax({
					url	: '/file/upload',
					type : 'POST',
					data : new FormData(this),
					contentType : false,
					cache : false,
					processData : false,
					success : function(res){
						if(res == "size"){
							setTimeout(function(){
								$("<span class='label label-danger err'>File chosen is too small.</span>").insertBefore("ul.sortable li[value='"+li+"'] .upload-img");
							}, 100);
							setTimeout(function(){
								$("ul.sortable li[value='"+li+"'] span.err").hide("drop", {'direction' : 'down'}, 'slow').done(function(){ $("ul.sortable li[value='"+li+"'] span.err").remove();});
							}, 5000);
							$(".loader").hide();
						}
						else if(res == "type"){
							setTimeout(function(){
								$("<span class='label label-danger err'>File chosen is not an image.</span>").insertBefore("ul.sortable li[value='"+li+"'] .upload-img");
							}, 100);
							setTimeout(function(){
								$("ul.sortable li[value='"+li+"'] span.err").hide("drop", {'direction' : 'down'}, 'slow').done(function(){ $("ul.sortable li[value='"+li+"'] span.err").remove();});
							}, 5000);
							$(".loader").hide();
						}
						else{
							$("ul.sortable li[value='"+li+"'] .def-image img").attr('src', res);
							$("ul.sortable li[value='"+li+"'] .img-hid").val(res);
							$(".loader").hide();
						}
					}
				});
			}
		});
	}
}
function insert_addon(){
	var insert = $("ul.sortable").html();
	var det = $("ul.sortable li .item-inner").length;
	var det_con = "";
	for(var i = 0; i < det; i++){
		det_con += "<li>"+$("ul.sortable li .item-inner").eq(i).html()+"</li>";
	}
	$(".detail-li").val(det_con);
	var id = $(".cur-id").val();
	$.post('/addon/insert',{
		'insert' : insert,
		'id'	 : id,
		'details' : det_con
	});
}
function publish_article(id){
	var publish = $(".publish").hasClass("published");
	var value = 0;
	if(!publish){
			value = 1;
	}

	$(".modal-loader").show();
	$.post('/article/publish', {
		'id' : id,
		'value' : value
	}).done(function(){
		$(".modal-loader").hide();
		if(publish){
			$(".publish").removeClass("published");
			$(".publish").addClass("unpublished");
			$(".publish").val("Publish");
		}
		else{
			$(".publish").removeClass("unpublished");
			$(".publish").addClass("published");
			$(".publish").val("Unpublish");	
		}
	});
}
function favorite_article(article, user, status){
	var stat = $(".fave .stat").hasClass("favorite");
	$.post('/article/favorited', {
		'article' : article,
		'user' : user,
		'status' : status
	}).done(function(res){
		if(status == 'favorite'){
			if(res == "true"){
				if(stat){
					$(".fave .stat").removeClass("favorite");
					$(".fave .stat").addClass("unfavorite");
					$(".fave .stat i img").attr("src", "/assets/images/favorite.png");
					$(".fave .stat i img").attr("alt", "Unfavorite");
					$(".fave .stat i img").attr("title", "Unfavorite this");
					$(".fave .stat").attr("onclick", "favorite_article('"+article+"', '"+user+"', 'unfavorite')");
				}
			}
			else{
				alert("Not Added to your Favorites");
			}
		}
		else{
			if(res == "true"){
				if(!stat){
					$(".fave .stat").removeClass("unfavorite");
					$(".fave .stat").addClass("favorite");
					$(".fave .stat i img").attr("src", "/assets/images/unfavorite.png");
					$(".fave .stat i img").attr("alt", "Favorite");
					$(".fave .stat i img").attr("title", "Add to Favorites");
					$(".fave .stat").attr("onclick", "favorite_article('"+article+"', '"+user+"', 'favorite')");
				}
			}
			else{
				alert("Not removed from your Favorites");
			}	
		}
	});
}
$(document).ready(function(){
	resize_iframe();
});
$(window).resize(function(){
	resize_iframe();
});
function resize_iframe(){
	var wid = 0;
	if($(".referpost .addons-container ul").hasClass("sortable")){
		wid = $(".sortable").width()-100;
		hgh = $
	}
	else if($(".article-detail-wrap ul").hasClass("post-detail-list")){
		wid = $(".post-detail-list").width();
	}
	$("iframe").attr('width', wid);
}

var href = window.location.href;
$(".smallpoints .fb-like").attr("data-href", href);
$(".smallpoints .twitter-share-button").attr("href", href);
$(".smallpoints .g-plus").attr("data-href", href);
$(".social-sample .fb-like").attr("data-href", href);
$(".social-sample .twitter-share-button").attr("href", href);
$(".social-sample .g-plus").attr("data-href", href);


(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=787791034642434";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');