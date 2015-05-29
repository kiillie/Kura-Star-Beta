<?php
use KuraStar\Storage\Twitter\TwitterRepository as TwitterUser;

class TwitterController extends BaseController{

	protected $twitter;
	protected $oauth;

	public function __construct(TwitterUser $twuser){
		$this->twuser = $twuser;
		$this->oauth = new Hybrid_Auth(app_path()."/config/tw_auth.php");
	}

	public function getTwAuth($auth=NULL){
		if($auth == 'auth'){
			try{
				Hybrid_Endpoint::process();
			}
			catch(Exception $e){
				return Redirect::to('twauth');
			}
			return;
		}
		$provider = $this->oauth->authenticate('Twitter');
		
		$profile = $provider->getUserProfile();
			
		if(!$this->fbuser->check('tw'.$profile->identifier)){
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