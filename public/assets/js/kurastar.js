$(document).ready(function(){
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
});