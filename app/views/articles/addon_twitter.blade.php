<?php
require_once(public_path().'/assets/include/twitteroauth-master/src/TwitterOAuth.php');
require_once(public_path().'/assets/include/twitteroauth-master/autoload.php');
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'Go8ZmkmExWehEs7Yi9nWJ8CsJ');
define('CONSUMER_SECRET', 'uEGmB3XPb3YEkjDSNt5lImsMsZShOX93H2h6C9krdxWPASrupb');
define('ACCESS_TOKEN', '2362872974-b7kXCKSShLmYHDTGJLih7MuTq5RlBvtfi0xMnTG');
define('ACCESS_TOKEN_SECRET', '6gOj8RsTQUt1VknTXmZ6TBHL0O5ctWJGlGrAvCDnco4Fy');
 
function search(array $query)
{
  $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
  return $toa->get('statuses/show/563689631867076609');
}
 
$query = array(
  "q" => "",
  'count' => 15
);
?>

<input type="text" class="form-control tweet" name="tweets"/><input type="button" class="btn btn-default" value="Search" />
<div class="twitter-result">
<?php
$results = search($query);
print_r($results);
// echo $results->extended_entities->media[0]->media_url_https;
// if(isset($results->statuses)){
// 	foreach ($results->statuses as $result) {
// 	  echo $result->user->screen_name . ": " . $result->text . "<br/>";
// 	}
// }
// else{
// 	echo "No Results Found!";
// }
?>
@if(isset($results->extended_entities))
	<img src="{{$results->extended_entities->media[0]->media_url_https}}">
@endif
</div>