@section('imageSearch')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="/assets/js/google-search.js"></script>
<div class="image-search" id="imageSearch">
  <div class="googlebox">
	    <div>
	      	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeDialog()"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Search for Images</h4>
	      	</div>
	    	<div class="modal-body">
	    		<div class="img-search tab1 tab2">
		        	<ul class="nav nav-tabs" id="img-tabs">
		        		<li><a href="#google"><span><img width="20" src="/assets/images/google-icon.jpg" /></span> Google</a></li>
		        		<li><a href="#instagram"><span><img width="20" src="/assets/images/insta-icon.jpg" /></span> Instagram</a></li>
		        	</ul>
		        	<div class="tab-content">
			        	<div class="img-srch" id="google">
			        		<div class="google-input"><input type="text" class="form-control img-text" placeholder="Search Images"/></div>
			        		<input type="hidden" class="search-li" />
			        		<input type="hidden" class="search-kind">
			        		<br />
	    					<ul id="content" class="post-list-thumb" ></ul>
			        	</div>
			        	<div class="img-srch" id="instagram">
			        		Instagram
			        	</div>
		        	</div>
		        	<div id="hide-loaded" style="display:none;">
		        	</div>
		        </div>
			</div>
		</div>
	</div>
</div>
@stop