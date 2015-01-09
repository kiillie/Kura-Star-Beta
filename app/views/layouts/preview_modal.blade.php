@section('prevModal')
<div class="modal article-view fade" id="articlePreview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Article Preview</h4>
	      	</div>
	    	<div class="modal-body">
	        	<div class="article-modal">
					<div class="row">
						<div class="col-md-3 main-photo">
							<img src="/assets/images/article-default.png" alt="Title"/>
						</div>
						<div class="col-md-9">
							<h2 class="art-title">Title</h2>
							<h4>Description</h4>
							<p class="art-desc">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultrices faucibus justo ac imperdiet. Phasellus fermentum nisl vitae purus cursus interdum. Maecenas ut lacus vel leo dictum laoreet id ut neque. Phasellus vulputate laoreet massa. Cras pulvinar nunc ac quam volutpat, non vulputate odio imperdiet. Donec sed sem ac quam commodo elementum eu vel metus. Aliquam molestie, dolor vitae aliquet molestie, felis dolor consectetur nulla, nec fermentum risus sem eget lorem. Vivamus efficitur, eros bibendum tristique feugiat, arcu nibh auctor nisi, ut mollis nisl elit ut nisi. Proin eu mattis orci, sit amet pharetra enim. Suspendisse potenti. Vivamus eros mi, tincidunt at nunc ac, interdum porttitor urna. Aliquam pretium tortor eu ultrices dapibus.
							</p>
							<div class="social">
								<input type="button" class="btn btn-info" value="Like">
								<input type="button" class="btn btn-info" value="Tweet">
								<input type="button" class="btn btn-info" value="Google+">
								<i></i>
							</div>
							
						</div>
					</div>
					<div class="count-cat">
						<ul class="list-inline">
							<li class="country"><a href="#">Philippines</a></li>
							<li class="category"><a href="#">Fashion</a></li>
						</ul>
					</div>
					<hr></hr>
					<div class="extra-details">
						Here goes extra details of the Article.
					</div>
					<div class="pages">
						<ul class="pagination">
							<li><a href="#">&laquo;</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">&raquo;</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="modal-footer">
		    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    	<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
@stop