<?php
	$file = fopen(public_path()."/assets/articles/".$addon['id'].".php", "w");
	fwrite($file, $addon['insert']);
	echo public_path()."/assets/articles/".$addon['id'].".php";
	fclose($file);
?>
<script>
	$(".loader").hide();
</script>