@extends('layouts.main')
@section('content')
<div class="container">
	<h1>Add New Category</h1>

	@if(Session::has('message'))
	<div class="message"><span>{{Session::get('message')}}</span></div>
	@endif

	
	{{Form::open(['name'=>'category', 'route'=>'category.store', 'role'=>'form'])}}
	<div class="input-group form-group">
		{{Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Name'])}}
	</div>
	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
	{{Form::close()}}
</div>
@stop