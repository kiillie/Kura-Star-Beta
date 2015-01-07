@extends('layouts.main')
@section('content')
<div class="container add-continent">
	<h1>Add New Continent</h1>

	@if(Session::has('message'))
	<div class="message"><span>{{Session::get('message')}}</span></div>
	@endif

	
	{{Form::open(['name'=>'continent', 'route'=>'continent.store', 'role'=>'form'])}}
	<div class="input-group form-group">
		{{Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Continent Name'])}}
	</div>
	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
	{{Form::close()}}
</div>
@stop