<?php
	$url = parse_url("http://ncronline.org/sites/default/files/styles/article_slideshow/public/stories/images/Confession_0.jpg?itok=mQqrtHg8");
	$path = $url['path'];
	$parts = pathinfo($url['path']);
	$filename = $parts['extension'];
	
	echo "<img src='{$path}' />";
	echo $filename;
?>