@extends('layouts.main')
@section('content')
<script src="/assets/js/jquery-ui.js" language="javascript"></script>
<script src="/assets/js/jquery-ui.min.js" language="javascript"></script>
<script>
$(function(){
	$(".art-addons").tabs();
});
</script>
	<div class="container article">
		<div class="article-menu">
			<div class="row">
				<div class="col-md-6">
					{{ Form::open(['name'=>'article', 'role'=>'form', 'route'=>'article.store', 'method'=>'post']) }}
					<div class="row">
						<div class="country col-md-6">
							<div class="dropdown">
					       		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"><span class="val-select">Select A Country</span> <span class="caret"></span></button>
					        	<ul class="dropdown-menu nav-ctry" role="menu">
					        		<input type="hidden" class="sel-id" name="country">
						    		@foreach($continents as $continent)
					        			<li class="disabled">{{$continent->CONTINENT_NAME}}</li>
							    		@foreach($countries as $country)
							    			@if($country->CONTINENT_ID == $continent->CONTINENT_ID)
							    				<li class="item" value="{{$country->COUNTRY_ID}}">{{$country->COUNTRY_NAME}}</li>
							    			@endif
							    		@endforeach
							    	@endforeach
						    	</ul>
						    </div>
						</div>
						<div class="category col-md-6">
							<div class="dropdown">
						    	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"><span class="val-select">Select A Category</span> <span class="caret"></span></button>
					        	<ul class="dropdown-menu nav-cat" role="menu">
					        		<input type="hidden" class="sel-id" name="category">
									@foreach($categories as $category)
										<li class="item" value="{{$category->CATEGORY_ID}}">{{$category->CATEGORY_NAME}}</li>
									@endforeach
						    	</ul>
						    </div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="article-btn">
						<button type="button" class="btn btn-default preview" data-toggle="modal" data-target="#articlePreview"> Preview </button>
						<!-- Modal for Preview -->
							@include('layouts.preview_modal')
							@section('prevModal')
							@show
						<!-- End of Preview Modal-->
						<input type="submit" class="btn btn-default save" value="Save" />
						<input type="button" class="btn btn-default" value="Public" />
					</div>
				</div>
			</div>
		</div>
		<div class="article-details">
			<div class="title-desc">
				<div class="row">
					<div class="col-md-2 art-default-img">
						<img src="/assets/images/article-default.png" />
					</div>
					<div class="col-md-10 art-title-desc">
						<div class="form-group title">
							<input type="text" class="form-control" name="title" placeholder="Title" />
						</div>
						<div class="form-group desc">
							<textarea maxlength="150" class="form-control" name="description" placeholder="Description"></textarea>
							<span class="right"><span class="num-char">0</span>/150 characters</span>
						</div>
					</div>
				</div>
			</div>
			<div class="url-setting inline">
				<input type="text" placeholder="URL" name="art-url" class="form-control"> <input type="button" class="btn btn-default" name="art-submit" value="Submit">
			</div>
			<div class="art-addons">
				<ul class="nav nav-tabs">
					<li><a href="#tabs-1"><span class="glyphicon glyphicon-pencil"></span> Text</a></li>
					<li><a href="#tabs-2"><span class="glyphicon glyphicon-camera"></span> Picture</a></li>
					<li><a href="#tabs-3"><span class="glyphicon glyphicon-hdd"></span> Reference</a></li>
					<li><a href="#tabs-4"><span class="glyphicon glyphicon-link"></span> Link</a></li>
					<li><a href="#tabs-5"><span class="glyphicon glyphicon-retweet"></span> Twitter</a></li>
					<li><a href="#tabs-6"><span class="glyphicon glyphicon-hd-video"></span> Youtube</a></li>
					<li><a href="#tabs-7"><span class="glyphicon glyphicon-header"></span> h2 Tag</a></li>
				</ul>
				<div class="addon-tab text" id="tabs-1">
					<div class="tag-wrap temp-storage">
						
					</div>
					<textarea name="art-text-add" class="added-value" style="display:none;"></textarea>
					<textarea name="art-text" class="form-control temp-inp" placeholder="Enter Text Here"></textarea>
					<div><input type="button" class="btn btn-default val-add" value="Add" /></div>
				</div>
				<div class="addon-tab picture" id="tabs-2">
					<div class="pic-wrap">
						<div class="pic-img left">
							<img src="/assets/images/article-default.png" />
						</div>
						<div class="pic-upload left">
							<div class="form-group">
								<input type="file" name="art-image-addon">
							</div>
							<div class="form-group">
								<input type="button" class="btn btn-default" name="search" value="search">
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
					<div><input type="button" class="btn btn-default" value="Add" /></div>
				</div>
				<div class="addon-tab reference" id="tabs-3">
					<div class="form-group">
						<textarea class="form-control" name="art-ref-text" placeholder="Enter text"></textarea>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="ref-url" placeholder="Reference URL" />
					</div>
					<div><input type="button" class="btn btn-default" value="Add" /></div>
				</div>
				<div class="addon-tab link" id="tabs-4">
					<div class="link-wrap">
						<div class="inline">
							<input type="text" class="form-control left" placeholder="Enter URL" name="art-link" /> <input type="button" class="btn btn-default left" value="Submit"> <input type="button" class="btn btn-default left" value="Cancel" name="reset" />
						</div>
					</div>
				</div>
				<div class="addon-tab twitter" id="tabs-5">

				</div>
				<div class="addon-tab youtube" id="tabs-6">

				</div>
				<div class="addon-tab htag" id="tabs-7">
					<div class="tag-wrap temp-storage">
						
					</div>
					<div class="form-group">
						<input type="hidden" name="art-heading" class="added-value">
						<input type="text" class="form-control temp-inp" placeholder="Heading" height="30" name="art-ref-h"/>
					</div>
					<div><input type="button" class="btn btn-default tag-add val-add" value="Add" /></div>
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>
@stop