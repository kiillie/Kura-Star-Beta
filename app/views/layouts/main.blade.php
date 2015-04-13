<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="ja"> <!--<![endif]-->
    
<!-- Mirrored from 10.20.150.92/template/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2015 02:13:00 GMT -->
<head>
        <!-- Le Meta Config -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Kurastar</title>
        <meta name="description" content="ですくりぷしょんですくりぷしょんですくりぷしょん">
        <meta name="keywords" content="キーワード1,キーワード2,キーワード3,キーワード4">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Le Favicons -->
        <link href="/assets/ico/favicon.ico" rel="icon" type="image/x-icon" />
        <link href="/assets/ico/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon-precomposed" />
        <link href="/assets/ico/apple-touch-icon-114-precomposed.png" rel="apple-touch-icon-precomposed" />
        <link href="/assets/ico/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon-precomposed" />
        <link href="/assets/ico/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon-precomposed" />
        
        <!-- Le Assets -->
		<link rel="stylesheet" href="/assets/css/new/reset.css" />
		<link rel="stylesheet" href="/assets/css/new/common.css" />
		<link rel="stylesheet" href="/assets/css/new/bonix.css" />
		<link rel="stylesheet" href="/assets/vendor/font-awesome-4.3.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="/assets/css/new/jquery.mCustomScrollbar.css">
		<link rel="stylesheet" href="/assets/css/new/flexslider.css">
		<link rel="stylesheet" href="/assets/css/new/custom.css" />
    </head>
	<body>
		<div class="box100 mainWrap">
			<div class="contentWrap">
				<div class="head1">
					<div class="defaultWidth center headwrap">
						<a class="menu-sp"></a>
						<div class="logo">
							<a href="index-2.html"><img src="/assets/images/new/logo.png" alt="株式会社 デュナレイト" title="株式会社 デュナレイト" /></a>
						</div>
						<div class="actions">
							<a href="#"><img src="/assets/images/new/icon_login.png" />LOGIN</a>
							<a href="#"><img src="/assets/images/new/icon_signup.png" />REGISTER</a>
							<a href="#"><img src="/assets/images/new/icon_write.png" />POST</a>
						</div>
					</div>
				</div>
				<div class="head2">
					<div class="defaultWidth center menuwrap">
						<ul class="menu">
							<img src="/assets/images/new/pointer1.png" />
							<li><a href="/"><i class="fa fa-home fa-2x"></i>&nbsp; HOME</a></li>
							<li><a href="{{URL::route('article.bycategory', 1)}}"><i class="fa fa-cutlery fa-2x"></i>&nbsp; GOURMET</a></li>
							<li><a href="{{URL::route('article.bycategory', 2)}}"><i class="fa fa-music fa-2x"></i>&nbsp; LEISURE</a></li>
							<li><a href="{{URL::route('article.bycategory', 3)}}"><i class="fa fa-briefcase fa-2x"></i>&nbsp; FASHION</a></li>
							<li><a href="{{URL::route('article.bycategory', 4)}}"><i class="fa fa-leanpub fa-2x"></i>&nbsp; STUDY</a></li>
							<li><a href="{{URL::route('article.bycategory', 5)}}"><i class="fa fa-usd fa-2x"></i>&nbsp; BUSINESS</a></li>
							<li><a href="{{URL::route('article.bycategory', 6)}}"><i class="fa fa-hotel fa-2x"></i>&nbsp; HOTEL</a></li>
							<li><a href="{{URL::route('article.bycategory', 7)}}"><i class="fa fa-bell fa-2x"></i>&nbsp; BUZZ</a></li>
						</ul>
					</div>
				</div>
	
			<!-- content -->		      
				@yield('content')
			
			<!---- start sidebar ---->
					
				@include('articles.rightbar')
				@section('rightbar')
				@show
					
			<!----- end sidebar ----------->
					
					
				</div>
				

				<!----- start footer --------->
				
				
				
				<div class="block-footer1">
					<div class="defaultWidth center clear-auto">
						<a href="#" class="logofooter">
							<img src="/assets/images/new/logo_gray.png" />
						</a>
						<div class="footermenu">
							<a href="#">Terms of Services</a>
							<a href="#">Privacy Policy</a>
							<a href="#">Contact Us</a>
							<a href="#">About Us</a>
							<a href="/">Home</a>
						</div>
					</div>
				</div>
				<div class="block-footer2">
					<div class="defaultWidth center clear-auto block-footer2-wrap">
						<div class="footcountry">
							<h3 class="footlabel">Countries</h3>
							@foreach($continents as $continent)
							<div>
								<h4>{{$continent->CONTINENT_NAME}}</h4>
								<ul>
									@foreach($countries as $country)
										@if($continent->CONTINENT_ID == $country->CONTINENT_ID)
											<li><a href="{{URL::route('article.bycountry', $country->COUNTRY_ID)}}"><img src="{{$country->FLAG_IMAGE}}" />{{$country->COUNTRY_NAME}}</a></li>
										@endif
									@endforeach
								</ul>
							</div>
							@endforeach
						</div>
						<div class="footcategory">
							<h3 class="footlabel">Categories</h3>
							<div>
								<h4>Menu</h4>
								<ul>
									@foreach($categories as $category)
										<li><a href="{{URL::route('article.bycategory', $category->CATEGORY_ID)}}">{{$category->CATEGORY_NAME}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="defaultWidth center clear-auto">
						<p class="copyright">&copy; Copyright Kura-Star 2015. All Right Reserved.</p>
					</div>
				</div>
				
				
		</div>
		<script src="/assets/js/new/jquery.js"></script>
		<script src="../../code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="/assets/js/new/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="/assets/js/new/jquery.flexslider.js"></script>
		<script src="/assets/js/new/script.js"></script>


	
	</body>

<!-- Mirrored from 10.20.150.92/template/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2015 02:13:41 GMT -->
</html>