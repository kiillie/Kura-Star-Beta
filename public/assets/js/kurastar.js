$(document).ready(function(){
	//For the dropdown Select
	$('.dropdown').on('click', function(){
		var init = $(this);
		var value;
		var text = "";
		$(this).find('ul li.item').on('click', function(){
			value = $(this).attr("value");
			text = $(this).text();
			$(init).find('button .val-select').text(text);
			$(init).find('.sel-id').val(value);
		});
	});



	//For Modal Preview
	$("button.preview").on('click', function(){
		var country = $(".country .dropdown .val-select").text();
		var category = $(".category .dropdown .val-select").text();
		var title = $(".article .article-details .title input").val();
		var description = $(".article .article-details .desc textarea").val();

		$(".article-modal .count-cat .country a").text(country);
		$(".article-modal .count-cat .category a").text(category);
		$(".article-modal .art-title").text(title);
		$(".article-modal .art-desc").text(description);
	});
	//End for Modal Preview

	//For Modal Image Search
	// $("button.image-search").on('click', function(){
	// 	var country = $(".country .dropdown .val-select").text();
	// 	var category = $(".category .dropdown .val-select").text();
	// 	var title = $(".article .article-details .title input").val();
	// 	var description = $(".article .article-details .desc textarea").val();

	// 	$(".article-modal .count-cat .country a").text(country);
	// 	$(".article-modal .count-cat .category a").text(category);
	// 	$(".article-modal .art-title").text(title);
	// 	$(".article-modal .art-desc").text(description);
	// });

	//End for Modal Image Search

	$("button.preview").on('click', function(){
		var country = $(".country .dropdown .val-select").text();
		var category = $(".category .dropdown .val-select").text();
		var title = $(".article .article-details .title input").val();
		var description = $(".article .article-details .desc textarea").val();

		$(".article-modal .count-cat .country a").text(country);
		$(".article-modal .count-cat .category a").text(category);
		$(".article-modal .art-title").text(title);
		$(".article-modal .art-desc").text(description);
	});


	//For Add Button in Create Article
	$(".art-addons ul li").one('click', function(){

		var a = $(this).find('a').attr("href");
		var splitted = a.split('-');
		$(a).find("input[type='text']").keypress(function(e){
			var pressed = (e.keyCode ? e.keyCode : e.which);
			if(pressed == 13){
				e.preventDefault();
				var value = $(a).find('.temp-inp').val();
				$(a).find('.temp-storage').html("<h2 style='font-size:18px;' class='added'>"+value+" <a href='#' class='add-close'>&times;</a></h2> ");
				$(a).find('.added-value').val(value);
				$(a).find('.temp-inp').val("");

				$(a).find('.added .add-close').on('click', function(e){
					e.preventDefault();
					$(this).parent().remove();
				});
			}
		});

		$(a).find('.val-add').on('click', function(e){
			var value = $(a).find('.temp-inp').val();
			if(splitted[1] == 1){
				$('.addons-container').prepend("<div class='addon-appended'><p>"+value+"</p></div>");
			}
			else if(splitted[1] == 7){
				$('.addons-container').prepend("<div class='addon-appended'><h2>"+value+"</h2></div>");
			}

			$(a).find('.added .add-close').on('click', function(e){
				e.preventDefault();
				$(this).parent().remove();
			});
		});
	});
	//End for Add Button

	//For the Number of Characters in Create Article
	$(".article-details .desc textarea").keyup(function(e){
		var value = $(this).val().length;
		
		$(".article-details .desc .num-char").text(value);
	});

	//For Image uploading
	$(".file-upload input").on('change', function(e){
		console.log("changed");
	});

});