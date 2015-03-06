<?php

try{
	$user_profile = (new FacebookRequest(
						$session, 'GET', '/me'
					))->execute()->getGraphObject(GraphUser::className());
	echo "Name: " . $user_profile->getName();
	echo "<br/>ID:".$user_profile->getId();
	echo "<br/><a href='".$helper->getLogoutUrl($session, 'http://localhost:8000/')."'>Logout</a>";
} catch(FacebookRequestException $e) {
    echo "Exception occured, code: " . $e->getCode();
   echo " with message: " . $e->getMessage();
}  
?>