var is_mobile = navigator.userAgent.match(/Android|webOS|iPhone|iPad|iPod|BlackBerry|Windows Phone/i),
    clickOrTouch = is_mobile? 'touchend' : 'click';

			
$(document).ready(function() {
		$('.menu-sp').click(function(){
			 $( ".menu" ).fadeToggle('fast');
		});
		count_image();
});
/*
$(document).ready(function() {
		$('div.btn20').click(function(){
			 $(this).next().toggle();
			 $(this).find('img').toggle();
		});
});
*/
$(function(){
	$(window).scroll(function(){
		if($(this).scrollTop()!=0){
			$('#bttop').fadeIn();
		} else {
			$('#bttop').fadeOut();
		}
	});

	$('#bttop').click(function(){
		$('body,html').animate({
			scrollTop:0
		},'fast');
	});
});


$(function(){
	$('#cty').click(function(){
		$('.dropcountry').fadeToggle('fast');
	});
});

$(function(){

	$('.droplistcountry li').each(function() {
		var text = $(this).find("a").text();
		/***  NEW ***/
		var own = $(this);
		/***  END ***/
		$( this ).click(function(){
			/** New **/
			$(".droplistcountry .sel-id").val($(own).val());
			/**   **/
			$('#cty').val(text);
			$('.dropcountry').fadeOut('fast');
		});
	});
});

$(function(){
	$('#cat').click(function(){
		$('.dropcategory').fadeToggle('fast');
	});
});

$(function(){

	$('.droplistcategory li').each(function() {
		var text = $(this).find("a").text();
		/***  NEW ***/
		var own = $(this);
		/***  END ***/
		$( this ).click(function(){
			/** NEW **/
			$(".droplistcategory .sel-id").val($(own).val());
			/** END **/
			$('#cat').val(text);
			$('.dropcategory').fadeOut('fast');
		});
	});
});


$(window).load(function() {
	if($("div.flexslider").length > 0){
        $('.flexslider').flexslider({
    		animation: "fade",
    		slideshow: true,
    		slideshowSpeed: 3000,
    		animationSpeed: 1000,
    		pauseOnHover: true,
    		controlNav: false
    	});
    }

	
});



$(document).mouseup(function (e)
{
    var container = $(".dropcountry, .dropcategory");
	var container2 = $(".transwrap, .transwrap input ");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && !container2.is(e.target) && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.fadeOut('fast');
    }
});


$(window).load(function() {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.imgplaceholder img').attr("src", e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });
});


$(window).load(function() {

    $("#inputFile2").keyup(function () {
		var bla = $('#inputFile2').val();
         $('.imgplaceholder img').attr("src", bla);
    });
});


$(window).load(function() {
		  $(function() {
			$( "#tabs" ).tabs();
			$(".img-search").tabs();
		  });
		  
		if($(".bodycontent").hasClass("bycategory")){
			var cat = $(".bycategory").attr("value");
			$(".menuwrap .menu li").eq(cat).find("a").addClass("selected");
		}
		else if($(".bodycontent").hasClass("bodycontent-index")){
			$(".menuwrap .menu li").eq(0).find("a").addClass("selected");
		}
});

/*** COUNT ***/

$(window).resize(function(){
	count_image();
});
function count_image(){
	var count_img = $(".image-container").length;
	var cont = $(".image-container").width();
	for(i = 0; i < count_img; i++){
			var pic_width = $(".image-container img").eq(i).width();
			if(pic_width < cont){
				$(".image-container img").eq(i).css("width", pic_width);
			}
			else{
				$(".image-container img").eq(i).css("width", "100%");
			}
	}
}