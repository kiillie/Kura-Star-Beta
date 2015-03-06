<?php
session_start();
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;
use KuraStar\Storage\Facebook\FacebookRepository as FacebookUser;

class FacebookController extends BaseController{

	protected $fbuser;

	public function __construct(FacebookUser $fbuser){
		$this->fbuser = $fbuser;
	}

	public function authenticate(){
		FacebookSession::setDefaultApplication('787791034642434','ffda8364faf1732e895ef7084a26a4d3');
		$helper = new FacebookRedirectLoginHelper('http://localhost:8000/fb/authenticate');

		try {
		  $session = $helper->getSessionFromRedirect();
		} catch(FacebookRequestException $ex) {
		  // When Facebook returns an error
		} catch(\Exception $ex) {
		  // When validation fails or other local issues
		}
		if($session){
			try{
				$user_profile = (new FacebookRequest(
					$session, 'GET', '/me'
					))->execute()->getGraphObject(GraphUser::className());
				$user_image = (new FacebookRequest(
					$session, 'GET', '/me/picture'
					))->execute()->getGraphObject();
				$cred = [
							'id'=>$user_profile->getId(),
							'name'=>$user_profile->getName()
						];

				$save = $this->fbuser->store($cred);

				return Redirect::route('/');
			}
			catch(Exception $e){
				return Redirect::route('login');
			}
		}
	}


}

?>