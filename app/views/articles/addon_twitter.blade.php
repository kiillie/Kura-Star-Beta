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
  return $toa->get('search/tweets', $query);
}
 
$query = array(
  "q" => $search['search'],
  'count' => 100,
  'include_entities' => true,
  'result_type'	=>	'mixed'
);
$results = search($query);
$count = 1;
?>
@if(isset($results->statuses))
	Tweet Results ...
	<hr></hr>
	@foreach($results->statuses as $result)
	<?php
		$time = strtotime($result->created_at);
	?>

	<div class="result-wrap" value="{{$count}}">
		<div class="tweet row">
			<div class="tweet-img col-md-2">
				<a href="https://twitter.com/{{$result->user->screen_name}}"><img src="{{$result->user->profile_image_url}}" alt="{{$result->user->screen_name}}" /></a>
			</div>
			<div class="tweet-info col-md-10">
				<div class="info">
					<span class="name"><a href="https://twitter.com/{{$result->user->screen_name}}">{{$result->user->name}}</a></span>
					<span class="screen">&#64;{{$result->user->screen_name}}</span>
				</div>
				<p class="tweet-text"><?php echo preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $result->text); ?></p>
				@if(isset($result->extended_entities))
					<div class="tweet-extra"><a class="art-added-img" href="{{$result->extended_entities->media[0]->media_url_https}}" title="{{preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $result->text)}}" data-fancybox-group="gallery"><img src="{{$result->extended_entities->media[0]->media_url_https}}" /></a></div>
				@endif
				<span class="date">{{date("Y-m-d", $time)}}</span>
			</div>
		</div>
		<div class="tweet-add" style="display: none;">
			<input type="button" class="btn btn-default" value="Add this tweet" onclick="add_search_tweet({{$count}}, 'twitter' ,'{{$search['type']}}')">
		</div>
	</div>
	<?php $count++; ?>
	@endforeach
@else
<hr></hr>
	<div class="alert alert-danger">No Tweets Found.</div>
@endif
<script>
var mheight = $(".modal").height();
$(".modal-content").css("height", mheight-60);
$(".modal-content").css("overflow-y", "scroll");
$(document).ready(function(){
	$(".tweet-results .result-wrap").hover(function(){
		$(this).find(".tweet").css("background", "rgb(218, 208, 208)");
		$(this).find(".tweet-add").css("display", "block");
	}, function(){
		$(this).find(".tweet").css("background", "white");
		$(this).find(".tweet-add").css("display", "none");
	});
});
$(".tweet-loading").hide();
function add_search_tweet(value, type, kind){
	if(kind == 'new'){
		$(".new-addon .new-item").html("");
		var tweet = $(".result-wrap[value="+value+"] .tweet").html();
		tweet = '<div class="tweet row">'+tweet+'</div>';
		tweet = tweet.replace("col-md-2", "col-md-1");
		tweet = tweet.replace("col-md-10", "col-md-11");
		var content =	'<li class="ui-state-default added-addon">'+
						'<div class="item-added-container">'+
						'<div class="item-inner text">'+
						'<div class="tweet-wrapper">'+tweet+"</div>"+
						'</div>'+
						'<div class="editlist">'+
						'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
						'</div>'+
						'</div>'+
						'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
						'<input type="hidden" class="type" value="'+type+'">'+
						'<input type="hidden" class="kind" value="'+kind+'">'+
						'</li>';

		$(".addons-container .sortable").prepend(content);
		insert_addon();
		$(".loader").hide();
		addonHovered(type, kind);
	}
	else{
		var tweet = $(".result-wrap[value="+value+"] .tweet").html();
		tweet = '<div class="tweet row">'+tweet+'</div>';
		tweet = tweet.replace("col-md-2", "col-md-1");
		tweet = tweet.replace("col-md-10", "col-md-11");
		var content =	'<li class="ui-state-default added-addon">'+
						'<div class="item-added-container">'+
						'<div class="item-inner text">'+
						'<div class="tweet-wrapper">'+tweet+"</div>"+
						'</div>'+
						'<div class="editlist">'+
						'<button class="editItem" onclick="edit_item()"><span class="glyphicon glyphicon-edit"></span> Edit</button><button class="deleteItem" onclick="delete_item()"><span class="glyphicon glyphicon-remove-sign"></span> Delete</button>'+
						'</div>'+
						'</div>'+
						'<div class="add-item-area"><div class="append-new-item"></div><div class="add-inner"><div class="show-append-here"></div><div class="item-btn-con"><div class="item-hr"><hr></hr></div><div class="add-item-btn right"><a href="javascript:void(0)" onclick="show_appended_item_area()">Add New Addon</a></div></div></div></div></div>'+
						'<input type="hidden" class="type" value="'+type+'">'+
						'<input type="hidden" class="kind" value="'+kind+'">'+
						'</li>';

		var current = $("ul.sortable li[value='{{$search['li']}}']");
		$("ul.sortable li[value='{{$search['li']}}'] .append-new-item").hide();
		current.after(content);
		insert_addon();
		$("ul.sortable li[value='"+li+"'] .item-btn-con").show();
		addonHovered(type, kind);
	}
}
</script>