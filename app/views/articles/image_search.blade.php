@section('imageSearch')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="/assets/js/google-search.js"></script>
<div class="modal image-search fade" id="imageSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Image Search</h4>
	      	</div>
	    	<div class="modal-body">
	    		<div class="img-search">
		        	<ul class="nav nav-tabs" id="img-tabs">
		        		<li><a href="#google"><span><img width="20" src="/assets/images/google-icon.jpg" /></span> Google</a></li>
		        		<li><a href="#instagram"><span><img width="20" src="/assets/images/insta-icon.jpg" /></span> Instagram</a></li>
		        	</ul>
		        	<div class="tab-content">
			        	<div class="img-srch" id="google">
			        		<div class="google-input"><input type="text" class="form-control img-text"/></div>
			        		<input type="hidden" class="search-li" />
			        		<input type="hidden" class="search-kind">
			        		<br />
	    					<div id="content" class="row" ></div>
			        	</div>
			        	<div class="img-srch" id="instagram">
			        		Instagram
			        	</div>
		        	</div>
		        	<div id="hide-loaded" style="display:none;">
		        	</div>
		        </div>
			</div>
			<div class="modal-footer">
		    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@stop