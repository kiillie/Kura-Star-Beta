<?php
if(isset($image['image'])){
	$upload = $image['image'];
	$name = str_random(40);
	$folder = public_path()."/assets/images/attachments/";
	$move = $name.".".$upload->getClientOriginalExtension();

	//echo $upload->getRealPath();
	$upload->move($folder, $move);
	echo "/assets/images/attachments/".$move;
}
?>