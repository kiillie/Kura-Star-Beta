@section('twitterSearch')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="/assets/js/google-search.js"></script>
<div class="modal twitter-search fade" id="twitterSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Image Search</h4>
	      	</div>
	    	<div class="modal-body">
	    		<input type="text" class="form-control" value="Search">
	    		<input type="button" class="btn btn-default" value="Search">
			</div>
			<div class="modal-footer">
		    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    	<button type="button" class="btn btn-primary">Add</button>
			</div>
		</div>
	</div>
</div>
@stop