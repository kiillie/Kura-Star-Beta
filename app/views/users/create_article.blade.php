@extends('layouts.main')
@section('content')
<div class="row head-search">
	<div class="col-xs-5 count">
		<select class="country btn">
			<option value="0" disabled selected>Select a Country</option>
			<option value="01">Philippines</option>
			<option value="02">Japan</option>
			<option value="03">United States of America</option>
		</select>
	</div>
	<div class="col-xs-5 cat">
		<select class="category btn">
			<option value="0" disabled selected>Select  Category</option>
			<option value="01">Fashion</option>
			<option value="02">Make Cosmetics</option>
			<option value="03">Hairstyles</option>
		</select>
	</div>
</div>
@stop