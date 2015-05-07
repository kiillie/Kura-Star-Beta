<?php
use KuraStar\Storage\Facebook\FacebookRepository as FacebookUser;

class FacebookController extends BaseController{

	protected $fbuser;
	protected $oauth;

	public function __construct(FacebookUser $fbuser){
		$this->fbuser = $fbuser;
		$this->oauth = new Hybrid_Auth(app_path()."/config/fb_auth.php");
	}

	public function getFbAuth($auth=NULL){
		if($auth == 'auth'){
			try{
				Hybrid_Endpoint::process();
			}
			catch(Exception $e){
				return Redirect::to('fbauth');
			}
			return;
		}
		$provider = $this->oauth->authenticate('Facebook');
		//$this->oauth->remember_me(true);
		$profile = $provider->getUserProfile();
			
		if(!$this->fbuser->check('fb'.$profile->identifier)){
			$cred = [
				'id'	=>	$profile->identifier,
				'name'	=>	$profile->displayName,
				'image'	=>	$profile->photoURL,
				'site'	=>	$profile->profileURL
			];
			$save = $this->fbuser->store($cred);
		}
		return  Redirect::route('index')->withProfile($profile);
	}

	public function getLogout(){
		$this->oauth->logoutAllProviders();

		return Redirect::route('index');

	}

}

?>