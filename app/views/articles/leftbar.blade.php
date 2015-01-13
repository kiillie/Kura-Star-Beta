@section('leftbar')
<ul class="nav nav-pills nav-stacked">
	<li><a href="{{URL::route('index')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	<li><a href="{{URL::route('article.bycategory', 1)}}"><span class="glyphicon glyphicon-cutlery"></span> Gourmet</a></li>
	<li><a href="{{URL::route('article.bycategory', 2)}}"><span class="glyphicon glyphicon-music"></span> Leisure</a></li>
	<li><a href="{{URL::route('article.bycategory', 3)}}"><span class="glyphicon glyphicon-briefcase"></span> Fashion</a></li>
	<li><a href="{{URL::route('article.bycategory', 4)}}"><span class="glyphicon glyphicon-pencil"></span> Study</a></li>
	<li><a href="{{URL::route('article.bycategory', 5)}}"><span class="glyphicon glyphicon-usd"></span> Business</a></li>
	<li><a href="{{URL::route('article.bycategory', 6)}}"><span class="glyphicon glyphicon-tower"></span> Hotel</a></li>
	<li><a href="{{URL::route('article.bycategory', 7)}}"><span class="glyphicon glyphicon-pushpin"></span> Buzz</a></li>
</ul>
@stop