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
	{{ HTML::script('/assets/js/jquery-2.1.3.min.js') }}
	{{ HTML::script('/assets/js/bootstrap.js') }}
	{{ HTML::script('/assets/js/bootstrap.min.js') }}
	{{ HTML::script('/assets/js/npm.js') }}
	{{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
	{{ HTML::script('/assets/js/bootstrap-select.js') }}
	{{ HTML::script('/assets/js/bootstrap-select.min.js') }}
</head>
<body>
	<div class="container main-header">
		<div class="row">
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
					{{Form::text('search', '', ['placeholder' => 'Search', 'class' => 'form-control'])}}
				</div>
			</div>
			<div class="col-md-4">
				Logo
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