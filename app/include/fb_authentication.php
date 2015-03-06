<?php
session_start();

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;

FacebookSession::setDefaultApplication('787791034642434','ffda8364faf1732e895ef7084a26a4d3');

$helper = new FacebookRedirectLoginHelper('http://localhost:8000/fb/authenticate');

try {
  $session = $helper->getSessionFromRedirect();
} catch(FacebookRequestException $ex) {
  // When Facebook returns an error
} catch(\Exception $ex) {
  // When validation fails or other local issues
}
?>
