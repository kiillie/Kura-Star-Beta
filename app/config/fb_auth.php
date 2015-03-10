<?php

return array(
	// 'base_url'	=>	"http://localhost:8000/fbauth/auth",
	'base_url'	=>	"http://kurastar.com/fbauth/auth",
	'providers'	=> array(
			'Facebook'	=> array(
				'enabled'	=> TRUE,
				'keys'	=> array('id'=>'787791034642434', 'secret' => 'ffda8364faf1732e895ef7084a26a4d3'),
				'scope'	=> 'public_profile, email'
				)
		)

	);

?>