$(document).ready(function(){
	$(".edit-profile .curator-detail-wrap .edit-image-wrap").hover(function(){
		$(".edit-profile .curator-detail-wrap .edit-image").css("display", "block");
	}, function(){
		$(".edit-profile .curator-detail-wrap .edit-image").css("display", "none");
	});
	$(".edit-image .file-up").on("change", function(){
		$(".edit-image .upload-image").submit();
	});
	$(".edit-image .upload-image").submit(function(e){
		e.preventDefault();
		$.ajax({
			url	: '/user/image',
			type : 'POST',
			data : new FormData(this),
			contentType : false,
			cache : false,
			processData : false,
			success : function(res){
				$(".edit-profile .edit-image-wrap .prof-image").attr("src", res);
			}
		});
	});
});