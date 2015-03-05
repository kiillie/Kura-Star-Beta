$(document).ready(function(){
	edit_profile("", "");
	submit_edit();
	$(".edit-profile.picture .profile-picture").on('change', function(){
		$(".edit-profile.picture").submit();
	});
});
function edit_profile(section, id){
	if(section == 'name'){
		$(".profile-edit .info ."+section+" .edit-profile-a").append(" <span class='edit-loader'><img src='/assets/images/ajax-loader.gif' /></span>");
		setTimeout(function(){
			var val = $(".profile-edit .info .name-val").text();
			var content =	"<form name='edit-form' class='edit-form name' action=''>"+
							"<input type='text' name='name' value='"+val+"' class='form-control'/><br/>"+
							"<input type='hidden' name='id' value='"+id+"'>"+
							"<input type='submit' class='btn btn-default' value='Save Changes' onclick='submit_edit()'>"+
							"<input type='reset' class='btn btn-default' value='Cancel'>"+
							"</form>";
			$(".profile-edit .info ."+section+" .edit-section-cont").html(content);
			$(".profile-edit .info ."+section+" .edit-section-cont").css("display", "block");	
			$(".profile-edit .info ."+section+" .edit-loader").remove();
		}, 2000);
	}
	else if(section == "about"){
		$(".profile-edit .info ."+section+" .edit-profile-a").append(" <span class='edit-loader'><img src='/assets/images/ajax-loader.gif' /></span>");
		setTimeout(function(){
			var val = $(".profile-edit .info .desc-val").text();
			var content =	"<form name='edit-form' class='edit-form about' action=''>"+
							"<textarea name='about' class='form-control'>"+val+"</textarea><br/>"+
							"<input type='hidden' name='id' value='"+id+"'>"+
							"<input type='submit' class='btn btn-default' value='Save Changes' onclick='submit_edit()'>"+
							"<input type='reset' class='btn btn-default' value='Cancel'>"+
							"</form>";
			$(".profile-edit .info ."+section+" .edit-section-cont").html(content);
			$(".profile-edit .info ."+section+" .edit-section-cont").css("display", "block");	
			$(".profile-edit .info ."+section+" .edit-loader").remove();
		}, 2000);
	}
}
function submit_edit(){
	$(".edit-form").submit(function(e){
		e.preventDefault();
		if($(this).hasClass("name")){
			$.ajax({
				url		: '/user/update',
				type	: 'POST',
				data	: new FormData(this),
				contentType : false,
				cache : false,
				processData : false,
				success	: function(res){
					if(res != ""){
						$(".profile-edit .info .name-val").text(res);
						$(".profile-edit .info .name .edit-section-cont").html("");
						$(".profile-edit .info .name .edit-section-cont").css("display", "none");
					}
				}
			})
		}
		else if($(this).hasClass("about")){
			$.ajax({
				url		: '/user/update',
				type	: 'POST',
				data	: new FormData(this),
				contentType : false,
				cache : false,
				processData : false,
				success	: function(res){
					if(res != ""){
						$(".profile-edit .info .desc-val").text(res);
						$(".profile-edit .info .about .edit-section-cont").html("");
						$(".profile-edit .info .about .edit-section-cont").css("display", "none");
					}
				}
			});
		}
	});
}