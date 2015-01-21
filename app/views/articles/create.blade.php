@extends('layouts.main')
@section('content')
<script src="/assets/js/jquery-ui.js" language="javascript"></script>
<script src="/assets/js/jquery-ui.min.js" language="javascript"></script>
<script src="/assets/js/google-search.js" language="javascript"></script>
<script>
$(function(){
	$(".art-addons").tabs();
	$(".img-search").tabs();
});
</script>
<script src="/assets/js/article.js" language="javascript"></script>
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
			<div class="url-setting inline row">
					<div class="img-url col-md-4">
						<input type="text" placeholder="URL" name="imageUrl" class="form-control" />
					</div>
					<div class="img-upload col-md-4" style="display:none;">
						<input type="file" name="imgUp" class="form-control" accept="image/*">
					</div>
					<div class="col-md-8 img-btns">
						<input type="submit" class="btn btn-default art-url-submit" name="art-submit" value="Set">
						<a href="#" class="disp-def">Click to Upload an Image</a>
					</div>
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
								<input type="file" class="btn btn-default pic-upload" value="Select a file" />
							</div>
							<div class="form-group">
								<input type="button" class="btn btn-default img-search" data-toggle="modal" data-target="#imageSearch" name="search" value="Search" />
								@include('articles.image_search')
								@section('imageSearch')
								@show
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
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
						<div class="inline check-wrap">
							<input type="hidden" class="route-url" value="{{URL::route('fetchlink')}}">
							<input type="text" class="form-control left art-link" placeholder="Enter URL" name="art-link" /> <input type="button" class="btn btn-default left link-check left" value="Check"> <input type="button" class="btn btn-default left" value="Cancel" name="reset" /><img src="/assets/images/loader.gif" class="loading" style="display: none; width: 20px"/> 
							<div class="clear"></div>
						</div>
						<div class="link-container">
							<div class="link-results">
							</div>
							<div class="extra-texts">
								<textarea class="link-extra-text form-control"></textarea>
								<input type="button" class="btn btn-default val-add" value="Add"> <input type="button" class="btn btn-default" value="Cancel">
							</div>
						</div>
					</div>
				</div>
				<div class="addon-tab twitter" id="tabs-5">
					<input type="text" class="form-control" placeholder="URL of the tweet">
					<input type="button" class="btn btn-default" data-toggle="modal" data-target="#twitterSearch" name="search" value="Look for tweets" />
					@include('articles.twitter_search')
					@section('twitterSearch')
					@show
				</div>
				<div class="addon-tab youtube" id="tabs-6">
					<div class="video-url inline">
						<input type="text" class="vid-url form-control left" placeholder="Enter URL from Youtube"/>&nbsp;<input type="button" class="btn btn-default vid-check left" value="Check" />&nbsp;<input type="button" class="btn btn-default vid-cancel left" value="Cancel" />
					</div>
					<div class="vid-result row" style="display:none">
						<div class="col-md-4">
							<iframe src="#" width="300" height="300">#document</iframe>
						</div>
						<div class="vid-text col-md-4">
							<textarea placeholder="Video Description" placeholder="Description for the link" class="form-control vid-desc"></textarea>
							<input type="button" class="btn btn-default vid-add val-add" value="Add" />
						</div>
						<div class="col-md-4">

						</div>
					</div>
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
			<div class="addons-container">
				
			</div>
			{{Form::close()}}
		</div>
	</div>
@stop