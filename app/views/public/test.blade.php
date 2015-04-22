<script language="javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
<script language="javascript" src="/assets/js/jquery-ui.js"></script>
<script language="javascript" src="/assets/js/jquery-ui.min.js"></script>
<script>
$(document).ready(function(){
	
	$(".check").click(function(){
		var txt = $("textarea").val();
		var spl = txt.split("\n");
		var lngt = spl.length;
		var res = "";
		for(var i = 0; i < lngt; i++){
			res = res+"<p>"+spl[i]+"</p>";
		}
		$(".result").html(res);
	});
	
	$(".edit").click(function(){
		var chk = $(".result p").length;
		var ed = "";
		for(var i = 0; i < chk; i++){
			var p = $(".result p").eq(i).text();
			ed = ed+p+"\n";
		}
		$(".txt").val(ed);
	});
});
</script>
<textarea class="txt"></textarea>
<button class="check">Check</button>
<div class="result"></div>
<button class="edit">Edit</button>