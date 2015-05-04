$(".fb-like iframe").load(function(){
	alert("yes");
	$(this).contents().find("head").append('<link rel="stylesheet" href="/assets/css/new/styles.css">');
});