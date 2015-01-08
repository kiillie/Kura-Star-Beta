@extends('../layouts.main')
@section('content')
<div class="menu-header">
	<div class="header-slide">
		<div class="header">
			<ul class="bxslider">
				<li><img src="/assets/images/header/top1.jpg" /></li>
				<li><img src="/assets/images/header/top3.png" /></li>
				<li><img src="/assets/images/header/top5.png" /></li>
			</ul>
		</div>
		<div class="container hidden-xs">
			<div class="search-form">
				<div class="row head-search">
					<div class="col-md-2 search-title">
						<h2>Search</h2>
					</div>
					<div class="col-md-4 country">
						{{Form::open(['name'=>'search', 'role'=>'form', 'method'=>'post', 'route'=>'article.search'])}}
							<div class="dropdown">
					       		<button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"><span class="val-select">Select A Country</span> <span class="caret"></span></button>
					        	<input type="hidden" class="sel-id" name="ctry-sel">
					        	<ul class="dropdown-menu nav-ctry" role="menu">
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
						<div class="col-md-4 category">
							<div class="dropdown">
						    	<button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"><span class="val-select">Select A Category</span> <span class="caret"></span></button>
					        	<input type="hidden" class="sel-id" name="cat-sel">
					        	<ul class="dropdown-menu nav-cat" role="menu">
									@foreach($categories as $category)
										<li class="item" value="{{$category->CATEGORY_ID}}">{{$category->CATEGORY_NAME}}</li>
									@endforeach
						    	</ul>
						    </div>
						</div>
						<div class="col-md-1 search-btn">
							<input type="submit" class="form-control btn btn-primary" href="article.view" value="Search"/>
						</div>
						<div class="col-md-1 search-btn">
						</div>
						{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-2 hidden-xs cat-sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="{{URL::route('index')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="{{URL::route('article.view')}}"><span class="glyphicon glyphicon-cutlery"></span> Gourmet</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-music"></span> Leisure</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-briefcase"></span> Fashion</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Study</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-usd"></span> Business</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-tower"></span> Hotel</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-pushpin"></span> Buzz</a></li>
			</ul>
		</div>
		<div class="col-md-7 col-xs-12 latest">
			<div class="latest-group">
				<div class="row">
					<div class="col-md-2 col-xs-6">
						<img src="assets/images/temp/thumb50.JPG" alt="Name" />
					</div>
					<div class="col-md-8 col-xs-12">
						<h3>Title</h3>
						<hr></hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi libero, viverra nec eleifend vel, malesuada pretium nibh. Pellentesque iaculis luctus mollis. Integer pharetra venenatis dui, nec elementum mauris. Nam a tellus nec mauris pharetra porta. Fusce at mi ornare, volutpat tellus vel, convallis magna. Ut condimentum posuere ipsum, sit amet tempus turpis placerat vel. Mauris feugiat, eros quis consequat laoreet, ipsum felis viverra justo, nec consequat nisi ex quis augue. Sed convallis ornare massa, eu sollicitudin sem. Nulla facilisi.</p>
					</div>
					<div class="col-md-2 col-xs-12">
						<span class="hidden-xs">Name</span>
						<span class="visible-xs"><i>- Name</i></span>
					</div>
				</div>
				<div class="count-cat">
					<ul class="list-inline">
						<li class="country"><a href="#">Philippines</a></li>
						<li class="category"><a href="">Fashion</a></li>
					</ul>
				</div>
			</div>
			<div class="latest-group">
				<div class="row">
					<div class="col-md-2 col-xs-6">
						<img src="assets/images/temp/thumb57.JPG" alt="Name" />
					</div>
					<div class="col-md-8 col-xs-12">
						<h3>Title</h3>
						<hr></hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi libero, viverra nec eleifend vel, malesuada pretium nibh. Pellentesque iaculis luctus mollis. Integer pharetra venenatis dui, nec elementum mauris. Nam a tellus nec mauris pharetra porta. Fusce at mi ornare, volutpat tellus vel, convallis magna. Ut condimentum posuere ipsum, sit amet tempus turpis placerat vel. Mauris feugiat, eros quis consequat laoreet, ipsum felis viverra justo, nec consequat nisi ex quis augue. Sed convallis ornare massa, eu sollicitudin sem. Nulla facilisi.</p>
					</div>
					<div class="col-md-2 col-xs-12">
						<span class="hidden-xs">Name</span>
						<span class="visible-xs"><i>- Name</i></span>
					</div>
				</div>
				<div class="count-cat">
					<ul class="list-inline">
						<li class="country"><a href="#">Philippines</a></li>
						<li class="category"><a href="">Travel & Outing</a></li>
					</ul>
				</div>
			</div>
			<div class="latest-group">
				<div class="row">
					<div class="col-md-2 col-xs-6">
						<img src="assets/images/temp/thumb62.jpg" alt="Name" />
					</div>
					<div class="col-md-8 col-xs-12">
						<h3>Title</h3>
						<hr></hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi libero, viverra nec eleifend vel, malesuada pretium nibh. Pellentesque iaculis luctus mollis. Integer pharetra venenatis dui, nec elementum mauris. Nam a tellus nec mauris pharetra porta. Fusce at mi ornare, volutpat tellus vel, convallis magna. Ut condimentum posuere ipsum, sit amet tempus turpis placerat vel. Mauris feugiat, eros quis consequat laoreet, ipsum felis viverra justo, nec consequat nisi ex quis augue. Sed convallis ornare massa, eu sollicitudin sem. Nulla facilisi.</p>
					</div>
					<div class="col-md-2 col-xs-12">
						<span class="hidden-xs">Name</span>
						<span class="visible-xs"><i>- Name</i></span>
					</div>
				</div>
				<div class="count-cat">
					<ul class="list-inline">
						<li class="country"><a href="#">Philippines</a></li>
						<li class="category"><a href="">Fashion</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<h2>Advertisements</h2>
		</div>
	</div>
</div>
@stop