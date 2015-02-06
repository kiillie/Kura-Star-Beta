@extends('layouts.main')
@section('content')
<div class="container">
	<div class="prev-message alert alert-info"><span>This is a Preview Page. Only the curator can see this page.</span></div>
	<div class="">
		<h2>{{$article->CURATION_TITLE}}</h2>
	</div>
</div>
@stop