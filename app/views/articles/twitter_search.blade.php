@section('twitterSearch')
<div class="twitter-search" id="twitterSearch">
  <div class="tweetbox">
	    <div>
	      	<div class="modal-header">
		        <button type="button" class="close" onclick="closeDialog()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <img src="/assets/images/tweet-search.png" alt="Search tweets"/><h4 class="modal-title" id="myModalLabel">Search for Tweets</h4>
	      	</div>
	    	<div class="modal-body">
	    		<div class="tweet-wrap">
	    			{{Form::open(['name'=>'tweet-search', 'id'=>'form-tweet', 'method'=>'post', 'route'=>'addon.twitter', 'class'=>'tweet-form'])}}
	    			<div class="tweet-input">
						<input type="text" class="form-control search-value" name="search" placeholder="Search for tweets" aria-describedby="sizing-addon1">
				  	</div>
				  	<div class="tweet-hidden">
				  		<input type="hidden" class="tweet-kind" name="type" />
				  		<input type="hidden" class="tweet-li" name="li" />
				  		<input type="submit" class="btn btn-default" id="sizing-addon1" value="Search"/>
				  	</div>
					{{Form::close()}}
				</div>
				<div class="tweet-loading" style="text-align: center; margin: 20px 0; display: none;">
					<img width="80" src="/assets/images/loader.gif" alt="loading..."/>
				</div>
				<div class="tweet-results">
					
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$(".twitter-search #form-tweet").submit(function(e){
		$(".tweet-loading").show();
		$(".twitter-search .tweet-results").html("");
		e.preventDefault();
		var search = $(".twitter-search .search-value").val();
		$.ajax({
			url	: '/addon/twitter',
			type : 'POST',
			data : new FormData(this),
			contentType : false,
			cache : false,
			processData : false,
			success : function(res){
				$(".twitter-search .tweet-results").html(res);
			}
		}).fail(function(){
			$(".tweet-loading").hide();
			var content = "<div class='alert alert-danger'>Please search again.</div>";
			$(".twitter-search .tweet-results").html(content);
		});
	});
});
</script>
@stop