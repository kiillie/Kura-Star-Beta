@extends('../layouts.main')
@section('content')
<div class="menu-header">
	<div class="jumbotron">
		<div class="container">
			<div class="search-form">
				<div class="row head-search">
					{{Form::open(['name' => 'search', 'class' => 'form-inline'])}}
					<div class="col-md-5 count">
							<select class="country btn">
								<option value="0" disabled selected>Select a Country</option>
								<option value="01">Philippines</option>
								<option value="02">Japan</option>
								<option value="03">United States of America</option>
							</select>
						</div>
						<div class="col-md-5 cat">
							<select class="category btn">
								<option value="0" disabled selected>Select  Category</option>
								<option value="01">Gourmet</option>
								<option value="02">Leisure</option>
								<option value="03">Fashion</option>
								<option value="03">Study</option>
								<option value="03">Business</option>
								<option value="03">Hotel</option>
								<option value="03">Buzz</option>
							</select>
						</div>
						<div class="col-md-2 search-btn">
							<input type="button" class="form-control btn btn-primary" href="article.view" value="Search"/>
						</div>
						{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-2 cat-sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="{{URL::route('index')}}">Home</a></li>
				<li><a href="#">Gourmet</a></li>
				<li><a href="#">Leisure</a></li>
				<li><a href="#">Fashion</a></li>
				<li><a href="#">Study</a></li>
				<li><a href="#">Business</a></li>
				<li><a href="#">Hotel</a></li>
				<li><a href="#">Buzz</a></li>
			</ul>
		</div>
		<div class="col-md-7 latest">
			<div class="latest-group">
				<div class="row">
					<div class="col-md-2">
						<img src="assets/images/default.jpg" alt="Name" />
					</div>
					<div class="col-md-8">
						Description
					</div>
					<div class="col-md-2">
						Name
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
					<div class="col-md-2">
						<img src="assets/images/default.jpg" alt="Name" />
					</div>
					<div class="col-md-8">
						Description
					</div>
					<div class="col-md-2">
						Name
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
					<div class="col-md-2">
						<img src="assets/images/default.jpg" alt="Name" />
					</div>
					<div class="col-md-8">
						Description
					</div>
					<div class="col-md-2">
						Name
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