$(document).ready(function(){
	$("form[name='search']").submit(function(e){
		e.preventDefault();
		var ctry = $(this).find("input[name='ctry-sel']").val();
		var cat = $(this).find("input[name='cat-sel']").val();
		if(ctry == "" && cat == ""){
			alert("Please select a Country or a Category");
		}
		else{
			// $(this).submit();
		}
	});
});