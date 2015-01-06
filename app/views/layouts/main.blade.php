<!DOCTYPE html>
<html>
<head>
	<title>Kura-Star</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	{{ HTML::script('/assets/js/bootstrap.min.js') }}
	{{ HTML::script('/assets/js/npm.js') }}
	{{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
	{{ HTML::script('/assets/js/bootstrap-select.js') }}
	{{ HTML::script('/assets/js/bootstrap-select.min.js') }}
	{{ HTML::script('/assets/js/jquery.bxslider.js') }}
	{{ HTML::script('/assets/js/jquery.bxslider.min.js') }}
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
			<div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
				    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				    <a class="navbar-brand" href="#">Logo Here</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				    <ul class="nav navbar-nav">
					    <li><a href="{{URL::route('index')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="{{URL::route('article.create')}}"><span class="glyphicon glyphicon-file"></span> Make an Article</a></li>
						@if(Auth::check())
						<li><a href="#"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}}</a></li>
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
						    <div class="dropdown">
					       		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">Select A Country<span class="caret"></span></button>
					        	<ul class="dropdown-menu nav-ctry" role="menu">
						    		<li>Philippines</li>
						    		<li>Japan</li>
						    		<li>USA</li>
						    	</ul>
						    </div>
						    <div class="dropdown">
						    	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">Select A Category<span class="caret"></span></button>
					        	<ul class="dropdown-menu nav-cat" role="menu">
									<li value="01">Gourmet</li>
									<li value="02">Leisure</li>
									<li value="03">Fashion</li>
									<li value="03">Study</li>
									<li value="03">Business</li>
									<li value="03">Hotel</li>
									<li value="03">Buzz</li>
						    	</ul>
						    </div>
						    <button class="btn srch-click">Search</button>
					    </li>
					    <li class="divider"><li>
				    </ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>
	<div class="container main-header hidden-xs">
		<div class="row">
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
					{{Form::text('search', '', ['placeholder' => 'Search', 'class' => 'form-control'])}}
				</div>
			</div>
			<div class="col-md-4">
				<div class="logo">
					Logo here!
				</div>
			</div>
			<div class="col-md-4">
				<ul class="list-inline">
					<li><a href="{{URL::route('article.create')}}">Make an Article</a></li>
					@if(Auth::check())
					<li><a href="#">{{Auth::user()->name}}</a></li>
					<li><a href="{{URL::route('logout')}}">Logout</a></li>
					@else
					<li><a href="{{URL::route('registration')}}">Sign Up</a></li>
					<li><a href="#">Login</a></li>
					@endif
				</ul>
			</div>
		</div>
	</div>
@yield('content')
<div class="container">
	<div class="foobar">
		<div class="footer">
			<div class="row">
				<div class="col-md-3">
					Logo
				</div>
				<div class="col-md-9">
					<div class="foo-country">
						<h3>Country</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut mattis pharetra nisi, ut aliquet nunc placerat convallis. Donec in nisi arcu. Donec fringilla tortor nec purus consequat, at porta turpis suscipit. Proin gravida, velit a maximus fermentum, velit augue scelerisque leo, in consequat nisi quam sit amet risus. Donec venenatis ut enim et efficitur. Praesent tincidunt velit lectus, non tempor eros malesuada vel. Pellentesque laoreet nunc in eros lobortis maximus aliquet vitae felis. Phasellus laoreet viverra tortor ut consequat. Curabitur bibendum sem in nisi lacinia blandit. Curabitur in dictum mauris</p>
					</div>
					<div class="foo-category">
						<h3>Category</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut mattis pharetra nisi, ut aliquet nunc placerat convallis. Donec in nisi arcu. Donec fringilla tortor nec purus consequat, at porta turpis suscipit. Proin gravida, velit a maximus fermentum, velit augue scelerisque leo, in consequat nisi quam sit amet risus. Donec venenatis ut enim et efficitur. Praesent tincidunt velit lectus, non tempor eros malesuada vel. Pellentesque laoreet nunc in eros lobortis maximus aliquet vitae felis. Phasellus laoreet viverra tortor ut consequat. Curabitur bibendum sem in nisi lacinia blandit. Curabitur in dictum mauris</p>
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
</div>
</body>
</html>