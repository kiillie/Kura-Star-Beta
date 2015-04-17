$(document).ready(function(){
// For Upload Image

$(".img-upload input").change(function() {
	$("#message").empty(); // To remove the previous error message
	var file = this.files[0];
	var imagefile = file.type;
	var match= ["image/jpeg","image/png","image/jpg"];
	if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
	{
	$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
	return false;
	}
	else
	{
	var reader = new FileReader();
	reader.onload = imageIsLoaded;
	reader.readAsDataURL(this.files[0]);
	}
});

var imgresult;

function imageIsLoaded(e) {
	$(".img-upload input").css("color","green");
	imgresult = e.target.result;
}
$(".createform .img-form").on('submit', function(e){
	
	var parent = $(this).parent();

	if($(this).find('a').hasClass("disp-def")){
		e.preventDefault();
		if(validate_art_image('url')){
			var main = $(this).find('a');
			$("<img src='/assets/images/img-loader.gif' class='img-loader' alt='loading...' />").insertAfter(main);
			$.ajax({
						url	: '/article/image',
						type : 'POST',
						data : new FormData(this),
						contentType : false,
						cache : false,
						processData : false,
						error: function(res){
							setTimeout(function(){
								$(".img-url .err").text("");
								$("<span class='err' style='color:red;'>No image found.</span>").insertAfter(".img-url input[name='imageUrl']");
							}, 100);
							setTimeout(function(){
								$(".img-url span.err").fadeOut("slow", function(){
									$(this).remove();
								});
							}, 5000);
							$(".createform .img-btns .img-loader").remove();
						},
						success : function(res){
							if(res != ""){		
								$(".art-default-img img").attr("src", res);
								$(".createform .img-btns .img-loader").remove();
							}
						}
				});
		}
	}
	else{
		e.preventDefault();
		if(validate_art_image('upload')){
		var main = $(this).find('a');
		$("<img src='/assets/images/img-loader.gif' class='img-loader' alt='loading...' />").insertAfter(main);
			$.ajax({
						url	: '/article/image',
						type : 'POST',
						data : new FormData(this),
						contentType : false,
						cache : false,
						processData : false,
						success : function(res){			
							$(".art-default-img img").attr("src", res);
							$(".createform .img-btns .img-loader").remove();
						}
				});
		}
	}
});

function validate_art_image(type){
	if(type == 'url'){
		var inp = $(".img-url input[name='imageUrl']").val();
		if(inp == ""){
			setTimeout(function(){
				$(".img-url .err").text("");
				$("<span class='err' style='color:red;'>Please input a url</span>").insertAfter(".img-url input[name='imageUrl']");
			}, 100);
			setTimeout(function(){
				$(".img-url span.err").fadeOut("slow", function(){
					$(this).remove();
				});
			}, 5000);
			$(".img-url input[name='imageUrl']").val("");
			return false;
		}
		else if(!isURL(inp)){
			setTimeout(function(){
				$(".img-url .err").text("");
				$("<span class='err' style='color:red;'>Not a valid url.</span>").insertAfter(".img-url input[name='imageUrl']");
			}, 100);
			setTimeout(function(){
				$(".img-url span.err").fadeOut("slow", function(){
					$(this).remove();
				});
			}, 5000);
			$(".img-url input[name='imageUrl']").val("");
			return false;
		}
		else if(!check_exist(inp)){
			setTimeout(function(){
				$(".img-url .err").text("");
				$("<span class='err' style='color:red;'>No image found.</span>").insertAfter(".img-url input[name='imageUrl']");
			}, 100);
			setTimeout(function(){
				$(".img-url span.err").fadeOut("slow", function(){
					$(this).remove();
				});
			}, 5000);
			$(".img-url input[name='imageUrl']").val("");
			return false;
		}
		else{
			return true;
		}
	}
	else{
		var inp = $(".img-upload input[name='imgUp']").val();
		if(inp == ""){
			setTimeout(function(){
				$(".img-upload .err").text("");
				$("<span class='err' style='color:red;'>Please select an image</span>").insertAfter(".img-upload input[name='imgUp']");
			}, 100);
			setTimeout(function(){
				$(".img-upload span.err").fadeOut("slow", function(){
					$(this).remove();
				});
			}, 5000);
			return false;
		}
		else{
			return true;
		}
	}
}
$(".img-url input[name='imageUrl']").on('change', function(){
	check_exist($(this).val());
});

function check_exist(src){
	var arr = [ "jpeg", "jpg", "gif", "png" ];
	var ext = src.substring(src.lastIndexOf(".")+1);
	if($.inArray(ext,arr)){
		return true;
	}
	else{
		return false;
	}
}
//Link



//For Add Button in Create Article
	var uiDef = ""; 
	if($(".art-addons ul li").hasClass('ui-state-active')){
		var a = $(this).find('.ui-state-active a').attr("href");
		var splitted = a.split('-');
		$(a).find("input[type='text']").keypress(function(e){
			var pressed = (e.keyCode ? e.keyCode : e.which);
			if(pressed == 13){
				e.preventDefault();
				var value = $(a).find('.temp-inp').val();
				if(splitted[1] == 1){
					$('.addons-container').prepend("<div class='addon-appended'><p>"+value+"</p><div class='addon-edit' style='display:none;'><input type='button' class='btn btn-primary' value='Edit'/><input type='button' class='btn btn-danger' value='Remove'/></div></div>");
					$(a).find('.temp-inp').val("");
				}
				else if(splitted[6]){
					var desc = $(".youtube .vid-desc").val();
					value = $(".youtube iframe").attr("src");
					$(".youtube .video-desc .vid-desc").val("");
					$(".youtube .video-url .vid-url").val("");
					$('.addons-container').prepend("<div class='addon-appended'><iframe src='"+value+"' width='300' height='300'>#document</iframe><div class='video-desc'>"+desc+"</div><div class='addon-edit' style='display:none;'><input type='button' class='label label-primary' value='Edit'/><input type='button' class='label label-danger' value='Remove'/></div></div>");
					$(".youtube .video-url").css('display', 'block');
					$(".youtube .vid-result").css('display', 'none');
					$(".youtube iframe").attr("src", "");
				}
				else if(splitted[1] == 7){
					$('.addons-container').prepend("<div class='addon-appended'><h2>"+value+"</h2><div class='addon-edit' style='display:none;'><input type='button' class='btn btn-primary' value='Edit'/><input type='button' class='btn btn-danger' value='Remove'/></div></div>");
					$(a).find('.temp-inp').val("");
				}
			}
			$('.addon-appended').hover(function(){
					addonHovered($(this), 1);
				}, function(){
					addonHovered($(this), 0);
			});
		});
		liveVal(a, splitted);
		uiDef = splitted[1];
	}

	$(".art-addons ul li").one('click', function(){
		var a = $(this).find('a').attr("href");
		var splitted = a.split('-');
		if(uiDef != splitted[1]){
			$(a).find("input[type='text']").keypress(function(e){
				var pressed = (e.keyCode ? e.keyCode : e.which);
				if(pressed == 13){
					e.preventDefault();
					var value = $(a).find('.temp-inp').val();
					if(splitted[1] == 1){
						$('.addons-container').prepend("<div class='addon-appended'><p>"+value+"</p><div class='addon-edit' style='display:none;'><input type='button' class='btn btn-primary' value='Edit'/><input type='button' class='btn btn-danger' value='Remove'/></div></div>");
						$(a).find('.temp-inp').val("");
					}
					else if(splitted[1] == 4){
							var title = $(".link .link-title").val();
							var desc = $(".link .link-description").val();
							var extra = $(".link .link-extra-text").val();
							var url =  $('.link .art-link').val();
							var content = "<div class='addon-appended'><h4><a href='"+url+"' target='_blank' '>"+title+"</a></h4><p>"+desc+"</p><span>"+extra+"</span><div class='addon-edit' style='display:none;'><input type='button' class='btn btn-primary' value='Edit'/><input type='button' class='btn btn-danger' value='Remove'/></div></div>";
							$(".addons-container").prepend(content);
							$(".link .link-results").hide();
							$(".link .extra-texts").hide();
							$(".link .link-extra-text").val("");
							$(".link .art-link").val("");
							$(".link .check-wrap").show();
					}
					else if(splitted[1] == 6){
						var desc = $(".youtube .vid-desc").val();
						value = $(".youtube iframe").attr("src");
						$(".youtube .video-desc .vid-desc").val("");
						$(".youtube .video-url .vid-url").val("");
						$('.addons-container').prepend("<div class='addon-appended'><iframe src='"+value+"' width='300' height='300'>#document</iframe><div class='video-desc'><span>"+desc+"</span></div><div class='addon-edit' style='display:none;'><input type='button' class='btn btn-primary' value='Edit'/><input type='button' class='btn btn-danger' value='Remove'/></div></div>");
						$(".youtube .video-url").css('display', 'block');
						$(".youtube .vid-result").css('display', 'none');
						$(".youtube iframe").attr("src", "");
					}
					else if(splitted[1] == 7){
						$('.addons-container').prepend("<div class='addon-appended'><h2>"+value+"</h2><div class='addon-edit' style='display:none;'><input type='button' class='btn btn-primary' value='Edit'/><input type='button' class='btn btn-danger' value='Remove'/></div></div>");
						$(a).find('.temp-inp').val("");
					}
				}
				$('.addon-appended').hover(function(){
					addonHovered($(this), 1);
				}, function(){
					addonHovered($(this), 0);
				});
			});
		liveVal(a, splitted);
		}
	});

	function liveVal(a, splitted){
		$(a).find('.val-add').on('click', function(e){
			var value = $(a).find('.temp-inp').val();
			if(splitted[1] == 1){
				$('.addons-container').prepend("<div class='addon-appended'><p>"+value+"</p><div class='addon-edit' style='display:none;'><input type='button' class='btn btn-primary' value='Edit'/><input type='button' class='btn btn-danger' value='Remove'/></div></div>");
				$(a).find('.temp-inp').val("");
			}
			else if(splitted[1] == 4){
				var title = $(".link .link-title").val();
				var desc = $(".link .link-description").val();
				var extra = $(".link .link-extra-text").val();
				var url =  $('.link .art-link').val();
				var content = "<div class='addon-appended'><h4><a href='"+url+"' target='_blank' '>"+title+"</a></h4><p>"+desc+"</p><span>"+extra+"</span><div class='addon-edit' style='display:none;'><input type='button' class='btn btn-primary' value='Edit'/><input type='button' class='btn btn-danger' value='Remove'/></div></div>";
				$(".addons-container").prepend(content);
				$(".link .link-results").hide();
				$(".link .extra-texts").hide();
				$(".link .link-extra-text").val("");
				$(".link .art-link").val("");
				$(".link .check-wrap").show();
			}
			else if(splitted[1] == 6){
				var desc = $(".youtube .vid-desc").val();
				value = $(".youtube iframe").attr("src");
				$(".youtube .video-desc .vid-desc").val("");
				$(".youtube .video-url .vid-url").val("");
				$('.addons-container').prepend("<div class='addon-appended'><iframe src='"+value+"' width='300' height='300'>#document</iframe><div class='video-desc'><span>"+desc+"</span></div><div class='addon-edit' style='display:none;'><input type='button' class='btn btn-primary' value='Edit'/><input type='button' class='btn btn-danger' value='Remove'/></div></div>");
				$(".youtube .video-url").css('display', 'block');
				$(".youtube .vid-result").css('display', 'none');
				$(".youtube iframe").attr("src", "");
			}
			else if(splitted[1] == 7){
				$('.addons-container').prepend("<div class='addon-appended'><h2>"+value+"</h2><div class='addon-edit' style='display:none;'><input type='button' class='btn btn-primary' value='Edit'/><input type='button' class='btn btn-danger' value='Remove'/></div></div>");
				$(a).find('.temp-inp').val("");
			}
			$('.addon-appended').hover(function(){
				addonHovered($(this), 1);
			}, function(){
				addonHovered($(this), 0);
			});
		});
	}
	function addonHovered(addon, hov){
		if(hov == 1){
			$(addon).find('.addon-edit').css('display', 'block');
		}
		else{
			$(addon).find('.addon-edit').css('display', 'none');
		}
	}
	//End for Add Button

	//For Youtube Video Addon
	$(".youtube .video-url .vid-check").on('click', function(){
		var vid = $(".youtube .video-url .vid-url").val();
		vid = vid.replace('watch?v=', 'embed/');
		$(this).ready(function(){
			$(".youtube .video-url").css("display", "none");
			$(".youtube .vid-result").css("display", "block");
			$(".youtube .vid-result iframe").attr("src", vid);
		});
	});

	//For the Number of Characters in Create Article
	$(".article-details .desc textarea").keyup(function(e){
		var value = $(this).val().length;
		$(".article-details .desc .num-char").text(value);
	});

	//For Link Extraction
	var getUrl  = $('.link .art-link'); //url to extract from text field
	
	$(".link .link-check").on('click', function() { //user types url in text field		
		
		//url to match in the text field
		var match_url = /\b(https?):\/\/([\-A-Z0-9.]+)(\/[\-A-Z0-9+&@#\/%=~_|!:,.;]*)?(\?[A-Z0-9+&@#\/%=~_|!:,.;]*)?/i;
		
		//returns true and continue if matched url is found in text field
		if (match_url.test(getUrl.val())) {
				$(".link .link-results").hide();
				$(".link .loading").show(); //show loading indicator image
				
				var extracted_url = getUrl.val().match(match_url)[0]; //extracted first url from text filed
				var route = $('.route-url').val();
				//ajax request to be sent to extract-process.php
				$.post(route,{'url': extracted_url}, function(data){         
               		
					//content to be loaded in #results element
					var content = '<div class="extracted_url"><div class="extracted_content"><input type="text" class="form-control link-title" value="'+data.title+'"/><textarea class="form-control link-description">'+data.content+'</textarea><div><span>'+extracted_url+'</span></div></div></div>';
					
					//load results in the element
					$(".link .link-results").html(content); //append received data into the element
					$(".link .check-wrap").hide();
					$(".link .link-results").slideDown(); //show results with slide down effect
					$(".link .extra-texts").show();
					$(".link .loading").hide(); //hide loading indicator image
                },'json');
		}
		else{
			$(".link .link-results").hide();
			$(".link .loading").show(); 
			$(".link .link-results").html("<span class='label label-danger'>Invalid URL</span>");
			$(".link .loading").hide();
			$(".link .link-results").show();
		}
	});
});