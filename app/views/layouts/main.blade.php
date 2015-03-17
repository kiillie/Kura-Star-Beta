<!DOCTYPE html>
<html>
<head>
	<title>Kura-Star</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/assets/images/favicon.jpg" /></link>
	{{ HTML::style('/assets/css/bootstrap.css') }}
	{{ HTML::style('/assets/css/bootstrap.min.css') }}
	{{ HTML::style('/assets/css/bootstrap-theme.css') }}
	{{ HTML::style('/assets/css/bootstrap-theme.min.css') }}
	{{ HTML::style('/assets/css/bootstrap-select.css') }}
	{{ HTML::style('/assets/css/bootstrap-select.min.css') }}
	{{ HTML::style('/assets/css/styles.css') }}
	{{ HTML::style('/assets/css/jquery.bxslider.css') }}
	{{ HTML::script('/assets/js/jquery-2.1.3.min.js') }}
	{{ HTML::script('/assets/js/bootstrap.js') }}
	{{ HTML::script('/assets/js/npm.js') }}
	{{ HTML::script('/assets/js/bootstrap-select.js') }}
	{{ HTML::script('/assets/js/bootstrap-select.min.js') }}
	{{ HTML::script('/assets/js/kurastar.js')}}
	{{ HTML::script('/assets/js/jquery.bxslider.js') }}
	{{ HTML::script('/assets/js/jquery.bxslider.min.js') }}

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60838164-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<script>
$(document).ready(function(){
	$('.bxslider').bxSlider({
		auto: true,
		speed: 2000,
		pause: 10000
	});
});
</script>
<body>
	<div class="container-fluid visible-xs nav-category">
		<nav class="navbar navbar-default">
			<div class="container-fluid mobile-header">
		    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
				    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				    <a class="navbar-brand" href="{{URL::route('index')}}"><img src="/assets/images/logo.png" alt="Kurastar" /></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				    <ul class="nav navbar-nav">
					    <li><a href="{{URL::route('index')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="{{URL::route('article.create')}}"><span class="glyphicon glyphicon-file"></span> Make an Article</a></li>
						@if(Auth::check())
						<li><a href="{{URL::route('user.profile', Auth::user()->CURATER_ID)}}"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}}</a></li>
						<li><a href="{{URL::route('logout')}}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						@else
						<li><a href="{{URL::route('registration')}}"><span class="glyphicon glyphicon-registration-mark"></span> Sign Up</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						@endif
						<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Categories<span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
							<li><a href="{{URL::route('article.view')}}"><span class="glyphicon glyphicon-cutlery"></span> Gourmet</a></li>
							<li class="divider"></li>
							<li><a href="#"><span class="glyphicon glyphicon-music"></span> Leisure</a></li>
							<li class="divider"></li>
							<li><a href="#"><span class="glyphicon glyphicon-briefcase"></span> Fashion</a></li>
							<li class="divider"></li>
							<li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Study</a></li>
							<li class="divider"></li>
							<li><a href="#"><span class="glyphicon glyphicon-usd"></span> Business</a></li>
							<li class="divider"></li>
							<li><a href="#"><span class="glyphicon glyphicon-tower"></span> Hotel</a></li>
							<li class="divider"></li>
							<li><a href="#"><span class="glyphicon glyphicon-pushpin"></span> Buzz</a></li>
				          </ul>
				        </li>
				        <li class="divider"><li>
				        <li class="search">
				        	Search
				        	{{Form::open(['name'=>'search', 'role'=>'form', 'method'=>'post', 'route'=>'article.search'])}}
						    <div class="dropdown">
					       		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"><span class="val-select">Select A Country</span> <span class="caret"></span></button>
					        	<ul class="dropdown-menu nav-ctry" role="menu">
					        		<input type="hidden" class="sel-id" name="ctry-sel">
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
						    <div class="dropdown">
						    	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"><span class="val-select">Select A Category</span> <span class="caret"></span></button>
					        	<ul class="dropdown-menu nav-cat" role="menu">
					        		<input type="hidden" class="sel-id" name="cat-sel">
									@foreach($categories as $category)
										<li class="item" value="{{$category->CATEGORY_ID}}">{{$category->CATEGORY_NAME}}</li>
									@endforeach
						    	</ul>
						    </div>
						    <button class="btn srch-click">Search</button>
						    {{Form::close()}}
					    </li>
					    <li class="divider"><li>
				    </ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>
	<div class="container-fluid main-header hidden-xs">
		<div class="row">
			<div class="col-md-4 top-menu">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
					{{Form::text('search', '', ['placeholder' => 'Search', 'class' => 'form-control'])}}
				</div>
			</div>
			<div class="col-md-4">
				<div class="logo">
					<a href="{{URL::route('index')}}"><img src="/assets/images/logo.png" alt="Kurastar" /></a>
				</div>
			</div>
			<div class="col-md-4 top-menu">
				<ul class="list-inline">
					@if(Hybrid_Auth::isConnectedWith('Facebook'))
						<li><span class="glyphicon glyphicon-list-alt"></span> <a href="{{URL::route('article.insert')}}">Make an Article</a></li>
						<li><span class="glyphicon glyphicon-user"></span>  <a href="{{URL::route('user.profile', 'fb'.$profile->identifier)}}">{{$profile->displayName}}</a></li>
						<li><span class="glyphicon glyphicon-log-out"></span> <a href="{{URL::route('auth.logout')}}">Logout</a></li>
					@else
						@if(Auth::check())
						<li><span class="glyphicon glyphicon-list-alt"></span> <a href="{{URL::route('article.insert')}}">Make an Article</a></li>
						<li><span class="glyphicon glyphicon-user"></span>  <a href="{{URL::route('user.profile', Auth::user()->CURATER_ID)}}">{{Auth::user()->CURATER}}</a></li>
						<li><span class="glyphicon glyphicon-log-out"></span> <a href="{{URL::route('logout')}}">Logout</a></li>
						@else
						<li><span class="glyphicon glyphicon-list-alt"></span> <a href="{{URL::route('registration')}}">Make an Article</a></li>
						<li><span class="glyphicon glyphicon-file"></span> <a href="{{URL::route('registration')}}">Sign Up</a></li>
						<li><span class="glyphicon glyphicon-log-in"></span> <a href="{{URL::route('login')}}">Login</a></li>
						@endif
					@endif
				</ul>
			</div>
		</div>
	</div>
@yield('content')
	<div class="foobar">
		<div class="footer">
			<div class="row">
				<div class="row vertical-align foologo">
			        <div class="col-md-3 logo hidden-xs">
			            <img src="/assets/images/logo.png" alt="Kurastar" />
			        </div>
			        <div class="col-xs-6 col-md-9" style="margin: 0 auto;">
			        	<div class="row" style="margin: auto;">
			        		<div class="col-xs-12 logo visible-xs">
					            <img src="/assets/images/logo.png" alt="Kurastar" />
					        </div>
							<div class="inline col-xs-12 foo-country col-md-8">
								<h3>Countries</h3>
								<div class="row" style="margin: auto;">
									@foreach($continents as $continent)
									<div class="col-md-2">
										<span>{{$continent->CONTINENT_NAME}}</span>
										<ul>
											@foreach($countries as $country)
												@if($continent->CONTINENT_ID == $country->CONTINENT_ID)
													<li><span class="fl-img"><img src="{{$country->FLAG_IMAGE}}" alt="{{$country->COUNTRY_NAME}}" /></span> <a href="{{URL::route('article.bycountry', $country->COUNTRY_ID)}}">{{$country->COUNTRY_NAME}}</a></li>
												@endif
											@endforeach
										</ul>
									</div>
									@endforeach
								</div>
							</div>
							<div class="foo-category col-xs-12 col-md-4">
								<h3>Categories</h3>
								<p><ul>
									@foreach($categories as $category)
										<li><a href="{{URL::route('article.bycategory', $category->CATEGORY_ID)}}">{{$category->CATEGORY_NAME}}</a></li>
									@endforeach
								</ul></p>
							</div>
						</div>
			        </div>
			    </div>
			</div>
		</div>
		<div class="container-fluid">
			<ul class="list-inline">
				<li><a href="">About Us</a></li>
				<li><a href="">Contact Us</a></li>
				<li><a href="">Privacy Policy</a></li>
				<li><a href="">Terms of Services</a></li>
			</ul>
		</div>
	</div>
</body>
</html>