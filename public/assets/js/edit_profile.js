function edit_profile(){
	$(".edit-profile .curator-info").css('display', 'none');
	$(".edit-profile .curator-edit").css('display', 'block');
}
$(document).ready(function(){
	$(".edit-form").submit(function(e){
		e.preventDefault();
		$.ajax({
			url		: '/user/update',
			type	: 'POST',
			data	: new FormData(this),
			contentType : false,
			cache : false,
			processData : false,
			success	: function(res){
				if(res == "true"){
					var name = $(".curator-edit h4.name input").val();
					var email = $(".curator-edit p.email input").val();
					var desc = $(".curator-edit p.desc textarea").val();
					$(".curator-info h4.name").text(name);
					$(".curator-info p.email").text(email);
					$(".curator-info p.desc").text(desc);
					$(".edit-profile .curator-info").css('display', 'block');
					$(".edit-profile .curator-edit").css('display', 'none');
				}
			}
		});
	});
});