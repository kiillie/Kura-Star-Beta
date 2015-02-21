@section('twitterSearch')
<div class="modal twitter-search fade" id="twitterSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Search for Tweets</h4>
	      	</div>
	    	<div class="modal-body">
	    		<div class="row">
	    			{{Form::open(['name'=>'tweet-search', 'id'=>'form-tweet', 'method'=>'post', 'route'=>'addon.twitter'])}}
	    			<div class="col-md-7">
						<input type="text" class="form-control search-value" name="search" placeholder="Search for tweets" aria-describedby="sizing-addon1">
				  	</div>
				  	<div class="col-md-5">
				  		<input type="submit" class="btn btn-default" id="sizing-addon1" value="Search"/>
				  	</div>
					{{Form::close()}}
				</div>
				<div class="tweet-results">

				</div>
			</div>
			<div class="modal-footer">
		    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$(".twitter-search #form-tweet").submit(function(e){

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
		});
	});
});
</script>
@stop