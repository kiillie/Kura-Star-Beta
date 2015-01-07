@extends('layouts.main')
@section('content')
<div class="container">
	<h1>Add New Country</h1>

	@if(Session::has('message'))
	<div class="message"><span>{{Session::get('message')}}</span></div>
	@endif

	
	{{Form::open(['name'=>'country', 'route'=>'country.store', 'role'=>'form'])}}
	<div class="input-group form-group">
		{{Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Name'])}}
	</div>
	<div class="input-group form-group">
		<select name="continent" class="form-control">
			<option value="0" selected disabled>Select A Continent</option>
			@foreach($continents as $continent)
				<option value="{{$continent->CONTINENT_ID}}">{{$continent->CONTINENT_NAME}}</option>
			@endforeach
		</select>
	</div>
	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
	{{Form::close()}}
</div>
@stop