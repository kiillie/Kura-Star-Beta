$(document).ready(function(){

// For Upload Image
$(".url-setting .img-btns a").on('click', function(e){
	e.preventDefault();
	if($(this).hasClass('disp-def')){
		$(".url-setting .img-btns input").removeClass("art-url-submit");
		$(".url-setting .img-btns input").addClass("art-img-submit");
		$(".url-setting .img-upload").css('display', 'block');
		$(".url-setting .img-url").css('display', 'none');
		$(this).text("Click to Add an Image URL");
		$(this).removeClass('disp-def');
		$(this).addClass('disp-up');
	}
	else{
		$(".url-setting .img-btns input").removeClass("art-img-submit");
		$(".url-setting .img-btns input").addClass("art-url-submit");
		$(".url-setting .img-upload").css('display', 'none');
		$(".url-setting .img-url").css('display', 'block');
		$(this).text("Click to Upload an Image");
		$(this).removeClass('disp-up');
		$(this).addClass('disp-def');
	}
});
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
$(".url-setting .img-btns input[name='art-submit']").on('click', function(e){
	
	var parent = $(this).parent();
	var vparent = $(parent).parent();

	if($(parent).find('a').hasClass("disp-def")){
		e.preventDefault();
		var val = $(".url-setting .img-url input").val();
		$(".article-details .art-default-img img").attr("src", val);
		$(".url-setting .img-url input").val("");
	}
	else{
		e.preventDefault();
		$(".art-default-img img").attr("src", imgresult);
	}
});

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


});