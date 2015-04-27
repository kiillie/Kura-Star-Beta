<?php

$image = $addon['image']; //str_replace('/', '\\', $addon['image']);
$exists = file_exists(public_path().$image);
$str_exist = strpos($image, 'assets');
if($str_exist && $exists){
	if(unlink(public_path().$image)){
		echo "true";
	}
	else{
		echo "false";
	}
}
else{
	echo "true";
}
?>