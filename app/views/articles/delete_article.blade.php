<?php

$html = file_get_contents(public_path()."/assets/articles/1.php");

$dom = new DOMDocument();
$dom->loadHtml($html);

foreach($dom->getElementsByTagName('img') as $img){
	echo $img->getAttribute('src')."<br/>";
	if (filter_var($img->getAttribute('src'), FILTER_VALIDATE_URL) === false) {
	    echo(public_path().$img->getAttribute('src')." is not a valid URL");
	} else {
	    echo(public_path().$img->getAttribute('src')." is a valid URL");
	}
}
?>