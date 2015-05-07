$(document).ready(function(){
	var views = $(".points-detail .view-span").text();
	$(".view-span").text(views.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
	$(".view-span-cur").text(views.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
});