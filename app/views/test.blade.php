<html>
<head>
<title>Ajax Pictures</title>
<style type="text/css">
<!--
.extract_url {
	font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
	font-size: 11px;
	width: 500px;
	min-height:100px;
}
.get_url_input {
	width: 100%;
	border: 1px solid #8E9CA4;
	height: 25px;
	padding-left: 10px;
	font-family: Arial, Helvetica, sans-serif;
	padding-right: 30px;
	min-height: 50px;
}
.extracted_thumb {
	float: left;
	margin-right: 10px;
}

#loading_indicator{
	position: absolute;
	margin-left: 480px;
	margin-top: 8px;
	display:none;
}
#results{
	display:none;
}
a:link {
	color: #0066CC;
}
.thumb_sel {
	float: left;
	height: 22px;
	width: 55px;
}
.thumb_sel .prev_thumb {
	background: url(images/thumb_selection.gif) no-repeat -50px 0px;
	float: left;
	width: 26px;
	height: 22px;
	cursor: hand;
	cursor: pointer;
}
.thumb_sel .prev_thumb:hover {
	background: url(images/thumb_selection.gif) no-repeat 0px 0px;
}
.thumb_sel .next_thumb {
	background: url(images/thumb_selection.gif) no-repeat -76px 0px;
	float: left;
	width: 24px;
	height: 22px;
	cursor: hand; 
	cursor: pointer;
}
.thumb_sel .next_thumb:hover {
	background: url(images/thumb_selection.gif) no-repeat -26px 0px;
}
.small_text{
	font-size: 10px;
}
-->
</style>
<input type="hidden" class="route-url" value="{{URL::route('fetchlink')}}">
<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	var getUrl  = $('#get_url'); //url to extract from text field
	
	getUrl.keyup(function() { //user types url in text field		
		
		//url to match in the text field
		var match_url = /\b(https?):\/\/([\-A-Z0-9.]+)(\/[\-A-Z0-9+&@#\/%=~_|!:,.;]*)?(\?[A-Z0-9+&@#\/%=~_|!:,.;]*)?/i;
		
		//returns true and continue if matched url is found in text field
		if (match_url.test(getUrl.val())) {
				$("#results").hide();
				$("#loading_indicator").show(); //show loading indicator image
				
				var extracted_url = getUrl.val().match(match_url)[0]; //extracted first url from text filed
				var route = $('.route-url').val();
				//ajax request to be sent to extract-process.php
				$.post(route,{'url': extracted_url}, function(data){         
               		
					extracted_images = data.images;
					total_images = parseInt(data.images.length-1);
					img_arr_pos = total_images;
					
					if(total_images>0){
						inc_image = '<div class="extracted_thumb" id="extracted_thumb"><img src="'+data.images[img_arr_pos]+'" width="100" height="100"></div>';
					}else{
						inc_image ='';
					}
					//content to be loaded in #results element
					var content = '<div class="extracted_url">'+ inc_image +'<div class="extracted_content"><h4><a href="'+extracted_url+'" target="_blank">'+data.title+'</a></h4><p>'+data.content+'</p><div class="thumb_sel"><span class="prev_thumb" id="thumb_prev">&nbsp;</span><span class="next_thumb" id="thumb_next">&nbsp;</span> </div><span class="small_text" id="total_imgs">'+img_arr_pos+' of '+total_images+'</span><span class="small_text">&nbsp;&nbsp;Choose a Thumbnail</span></div></div>';
					
					//load results in the element
					$("#results").html(content); //append received data into the element
					$("#results").slideDown(); //show results with slide down effect
					$("#loading_indicator").hide(); //hide loading indicator image
                },'json');
		}
	});


	//user clicks previous thumbail
	$("body").on("click","#thumb_prev", function(e){		
		if(img_arr_pos>0) 
		{
			img_arr_pos--; //thmubnail array position decrement
			
			//replace with new thumbnail
			$("#extracted_thumb").html('<img src="'+extracted_images[img_arr_pos]+'" width="100" height="100">');
			
			//show thmubnail position
			$("#total_imgs").html((img_arr_pos) +' of '+ total_images);
		}
	});
	
	//user clicks next thumbail
	$("body").on("click","#thumb_next", function(e){		
		if(img_arr_pos<total_images)
		{
			img_arr_pos++; //thmubnail array position increment
			
			//replace with new thumbnail
			$("#extracted_thumb").html('<img src="'+extracted_images[img_arr_pos]+'" width="100" height="100">');
			
			//replace thmubnail position text
			$("#total_imgs").html((img_arr_pos) +' of '+ total_images);
		}
	});
});
</script>
</head>

<body>
<div class="extract_url">
    <img id="loading_indicator" src="images/ajax-loader.gif">
    <textarea id="get_url" placeholder="Enter Your URL here" class="get_url_input" spellcheck="false" ></textarea>
        <div id="results">
        </div>
</div>

</body>
</html>