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

	//Search Submit
	$(".search-btn .search").click(function(){
		var form = $("form[name='search']");
		var ctry = $(form).find(".ctry").val();
		var cat = $(form).find(".cat").val();

		if(ctry == "" && cat == ""){
			alert("Please select a Country or Category");
		}
		else{
			$(form).submit();
		}
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

});