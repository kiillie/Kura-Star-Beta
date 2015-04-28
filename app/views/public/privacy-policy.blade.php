@extends('layouts.main')
@section('content')
	<div class="defaultWidth center clear-auto bodycontent bodycontent-index ">
		<div class="privacy-content">
			<h2 style="font-size: 20px">Content Here</h2>
		</div>
	
		<!---- start sidebar ---->
			@include('articles.rightbar')
			@section('rightbar')
			@show
		<!----- end sidebar ----------->
	</div>
@stop
