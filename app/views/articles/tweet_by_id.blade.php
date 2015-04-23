<?php
require_once(public_path().'/assets/include/twitteroauth-master/src/TwitterOAuth.php');
require_once(public_path().'/assets/include/twitteroauth-master/autoload.php');
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'Go8ZmkmExWehEs7Yi9nWJ8CsJ');
define('CONSUMER_SECRET', 'uEGmB3XPb3YEkjDSNt5lImsMsZShOX93H2h6C9krdxWPASrupb');
define('ACCESS_TOKEN', '2362872974-b7kXCKSShLmYHDTGJLih7MuTq5RlBvtfi0xMnTG');
define('ACCESS_TOKEN_SECRET', '6gOj8RsTQUt1VknTXmZ6TBHL0O5ctWJGlGrAvCDnco4Fy');
 
function search($id)
{
  $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
  return $toa->get('statuses/show/'.$id);
}
?>
<?php
$result = search($tweet['id']);

if($result != NULL){
$time = strtotime($result->created_at);
?>
<div class="tweet">
	<div class="tweet-img">
		<a href="https://twitter.com/{{$result->user->screen_name}}"><img src="{{$result->user->profile_image_url}}" alt="{{$result->user->screen_name}}" /></a>
	</div>
	<div class="tweet-info">
		<div class="info">
			<span class="name"><a href="https://twitter.com/{{$result->user->screen_name}}">{{$result->user->name}}</a></span>
			<span class="screen">&#64;{{$result->user->screen_name}}</span>
		</div>
		<p class="tweet-text"><?php echo preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $result->text); ?></p>
		@if(isset($result->extended_entities))
			<div class="tweet-extra"><a class="art-added-img" href="{{$result->extended_entities->media[0]->media_url_https}}" data-fancybox-group="gallery" title="{{preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $result->text)}}"><img src="{{$result->extended_entities->media[0]->media_url_https}}" /></a></div>
		@endif
		<span class="date">{{date("Y-m-d", $time)}}</span>
	</div>
	<div class="clear"></div>
</div>
<?php
}
?>