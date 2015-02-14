<?php
if(isset($image['image'])){
	$upload = $image['image'];
	$type = $upload->getMimeType();
	
	$name = str_random(40);
	$folder = public_path()."/assets/images/attachments/";
	$move = $name.".".$upload->getClientOriginalExtension();

	if($upload->getMimeType() == 'image/jpeg' || $upload->getMimeType() == 'image/png'){
		if($upload->getSize() > 100000){
			$upload->move($folder, $move);
			echo "/assets/images/attachments/".$move;
		} 
		else{
			echo "size";
		}
	}
	else{
		echo "type";
	}
	// echo $upload->getRealPath();
	
}
?>