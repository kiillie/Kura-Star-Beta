@extends('layouts.main')
@section('content')
<div class="container article">
	{{ Breadcrumbs::render('view_article') }}
	<div class="row details">
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-3">
					<img src="/assets/images/article-default.png" alt="Title" width="150" height="215" />
				</div>
				<div class="col-md-9">
					<h2>Title</h2>
					<h4>Description</h4>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultrices faucibus justo ac imperdiet. Phasellus fermentum nisl vitae purus cursus interdum. Maecenas ut lacus vel leo dictum laoreet id ut neque. Phasellus vulputate laoreet massa. Cras pulvinar nunc ac quam volutpat, non vulputate odio imperdiet. Donec sed sem ac quam commodo elementum eu vel metus. Aliquam molestie, dolor vitae aliquet molestie, felis dolor consectetur nulla, nec fermentum risus sem eget lorem. Vivamus efficitur, eros bibendum tristique feugiat, arcu nibh auctor nisi, ut mollis nisl elit ut nisi. Proin eu mattis orci, sit amet pharetra enim. Suspendisse potenti. Vivamus eros mi, tincidunt at nunc ac, interdum porttitor urna. Aliquam pretium tortor eu ultrices dapibus.
					</p>
					<div class="social">
						<input type="button" class="btn btn-info" value="Like">
						<input type="button" class="btn btn-info" value="Tweet">
						<input type="button" class="btn btn-info" value="Google+">
						<i></i>
						<div class="right">
							<a href="#">Preview</a>
						</div>
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
			<div class="ex-advertisement">
				<img src="/assets/images/Google-Adsense.jpg" alt="Advertisement"/> <img src="/assets/images/Google-Adsense.jpg" alt="Advertisement"/>
			</div>
		</div>
		<div class="col-md-3 right-bar">
			<div class="user">
				<span class="glyphicon glyphicon-user"></span>    <span>User Name</span>
			</div>
			<div class="advertisement">
				<img src="/assets/images/Google-Adsense.jpg" alt="Advertisement"/>
			</div>
			<div class="rank-article">
				<div class="rank-title"><h4>Ranking Article</h4><hr></hr></div>
				<ul>
					<li><span class="glyphicon glyphicon-bookmark"></span> <a href="#"><img src="/assets/images/rank-article-default.png" alt="Title" /> Title</a></li>
					<li><span class="glyphicon glyphicon-bookmark"></span> <a href="#"><img src="/assets/images/rank-article-default.png" alt="Title" /> Title</a></li>
					<li><span class="glyphicon glyphicon-bookmark"></span> <a href="#"><img src="/assets/images/rank-article-default.png" alt="Title" /> Title</a></li>
					<li><span class="glyphicon glyphicon-bookmark"></span> <a href="#"><img src="/assets/images/rank-article-default.png" alt="Title" /> Title</a></li>
					<li><span class="glyphicon glyphicon-bookmark"></span> <a href="#"><img src="/assets/images/rank-article-default.png" alt="Title" /> Title</a></li>
				</ul>
			</div>
			<div class="rank-country">
				<div class="rank-title"><h4>Ranking Article</h4><hr></hr></div>
				<ul>
					<li><span class="glyphicon glyphicon-globe"></span> <a href="#"><img src="/assets/images/flag.png" alt="Title" /> Country</a></li>
					<li><span class="glyphicon glyphicon-globe"></span> <a href="#"><img src="/assets/images/flag.png" alt="Title" /> Country</a></li>
					<li><span class="glyphicon glyphicon-globe"></span> <a href="#"><img src="/assets/images/flag.png" alt="Title" /> Country</a></li>
					<li><span class="glyphicon glyphicon-globe"></span> <a href="#"><img src="/assets/images/flag.png" alt="Title" /> Country</a></li>
					<li><span class="glyphicon glyphicon-globe"></span> <a href="#"><img src="/assets/images/flag.png" alt="Title" /> Country</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
@stop