@extends('layouts.main')
@section('content')
	<div class="container article">
		<div class="row">
			<div class="col-xs-6">
				<div class="country">
					<select>
						<option disabled selected>Select A Country</option>
						<option>Philippines</option>
						<option>Japan</option>
						<option>USA</option>
					</select>
				</div>
				<div class="category">
					<select>
						<option disabled selected>Select A Category</option>
						<option>Gourmet</option>
						<option>Leisure</option>
						<option>Fashion</option>
						<option>Study</option>
						<option>Business</option>
						<option>Hotel</option>
					</select>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="article-btn">
					<input type="button" value="Preview" />
					<input type="button" value="Save" />
					<input type="button" value="Public" />
				</div>
			</div>
		</div>
	</div>
@stop