<?php
		$url = parse_url($input['picture']);
		$parts = pathinfo($url['path']);
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
			if(File::copy($input['picture'], $path)){
				echo $file;
			}
		}
?>