<?php
$parts = pathinfo($input['picture']);
		$filename = $parts['filename'].".".$parts['extension'];
		$path = public_path()."\\assets\\images\\attachments\\".$filename;
		$file = "/assets/images/attachments/".$filename;
		if(file_exists($path)){
			$rand = str_random(7);
			$filename = $parts['filename']."_".$rand.".".$parts['extension'];
			$path = public_path()."\\assets\\images\\attachments\\".$filename;
			$file = "/assets/images/attachments/".$filename;
		}
		if(fopen($path, "w")){
			if(copy($input['picture'], $path)){
				echo $file;
			}
		}
?>