<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="ja"> <!--<![endif]-->
    
<!-- Mirrored from 10.20.150.92/template/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Apr 2015 04:21:48 GMT -->
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
		<link rel="stylesheet" href="/assets/css/new/responsive.css" />
		<script language="javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script language="javascript" src="/assets/js/jquery-ui.js"></script>
		<script language="javascript" src="/assets/js/jquery-ui.min.js"></script>
    </head>
	<body>
		<div class="box100 mainWrap">
			<div class="contentWrap">
				<div class="head1">
					<div class="defaultWidth center headwrap">
						<a class="menu-sp"></a>
						<div class="logo">
							<a href="{{URL::route('index')}}"><img src="/assets/images/new/logo.png" alt="株式会社 デュナレイト" title="株式会社 デュナレイト" /></a>
						</div>
						<div class="actions">
						@if(Hybrid_Auth::isConnectedWith('Facebook'))
							<a href="{{URL::route('auth.logout')}}"><img src="/assets/images/new/icon_login.png" />LOGOUT</a>
							<a href="{{URL::route('user.profile', 'fb'.$profile->identifier)}}"><img src="{{$profile->photoURL}}" />{{strtoupper($profile->displayName)}}</a>
							<a href="{{URL::route('article.insert')}}"><img src="/assets/images/new/icon_write.png" />POST</a>
						@else
							@if(Auth::check())
								<a href="{{URL::route('logout')}}"><img src="/assets/images/new/icon_login.png" />LOGOUT</a>
								@if(Auth::user()->CURATER_IMAGE != '')
									<a href="{{URL::route('user.profile', Auth::user()->CURATER_ID)}}"><img src="{{Auth::user()->CURATER_IMAGE}}" />{{strtoupper(Auth::user()->CURATER)}}</a>
								@else
									<a href="{{URL::route('user.profile', Auth::user()->CURATER_ID)}}"><img src="/assets/images/picture-default.png" />{{strtoupper(Auth::user()->CURATER)}}</a>
								@endif
								<a href="{{URL::route('article.insert')}}"><img src="/assets/images/new/icon_write.png" />POST</a>
							@else
								<a href="{{URL::route('login')}}"><img src="/assets/images/new/icon_login.png" />LOGIN</a>
								<a href="{{URL::route('registration')}}"><img src="/assets/images/new/icon_signup.png" />REGISTER</a>
								<a href="{{URL::route('registration')}}"><img src="/assets/images/new/icon_write.png" />POST</a>
							@endif
						@endif
						</div>
					</div>
				</div>
				<div class="head2">
					<div class="defaultWidth center menuwrap">
						<ul class="menu">
							<img src="/assets/images/new/pointer1.png" />
							<li><a href="{{URL::route('index')}}" class="def"><i class="fa fa-home fa-2x"></i>&nbsp; HOME</a></li>
							<li><a href="{{URL::route('article.bycategory', 1)}}" class="menucat"><i class="fa fa-cutlery fa-2x"></i>&nbsp; GOURMET</a></li>
							<li><a href="{{URL::route('article.bycategory', 2)}}" class="menucat"><i class="fa fa-music fa-2x"></i>&nbsp; LEISURE</a></li>
							<li><a href="{{URL::route('article.bycategory', 3)}}" class="menucat"><i class="fa fa-briefcase fa-2x"></i>&nbsp; LIFE</a></li>
							<li><a href="{{URL::route('article.bycategory', 4)}}" class="menucat"><i class="fa fa-leanpub fa-2x"></i>&nbsp; STUDY</a></li>
							<li><a href="{{URL::route('article.bycategory', 5)}}" class="menucat"><i class="fa fa-usd fa-2x"></i>&nbsp; BUSINESS</a></li>
						</ul>
					</div>
				</div>
	
			<!-- content -->

				@yield('content')

				<!----- start footer --------->
				
				<div class="block-footer1">
					<div class="defaultWidth center clear-auto">
						<a href="{{URL::route('index')}}" class="logofooter">
							<img src="/assets/images/new/logo_gray.png" />
						</a>
						<div class="footermenu">
							<a href="#">Terms of Services</a>
							<a href="#">Privacy Policy</a>
							<a href="#">About Us</a>
							<a href="{{URL::route('index')}}">Home</a>
						</div>
					</div>
				</div>
				<div class="block-footer2">
					<div class="defaultWidth center clear-auto block-footer2-wrap">
						<div class="footcountry">
							<h3 class="footlabel">Countries</h3>
							<?php
								$ctr = 0;
								$rev = 0;
							?>
							@foreach($continents as $continent)
								@if($ctr == $rev)
									@if($ctr == 4)
										<div class="group2">
											<div class="origdiv div100">
												<div class="div50">
													<h4>{{$continent->CONTINENT_NAME}}</h4>
													<ul>
														@foreach($countries as $country)
															@if($continent->CONTINENT_ID == $country->CONTINENT_ID)
																<li><a href="{{URL::route('article.bycountry', $country->COUNTRY_ID)}}"><img src="{{$country->FLAG_IMAGE}}" />{{$country->COUNTRY_NAME}}</a></li>
															@endif
														@endforeach
													</ul>
												</div>
									@else
										<div class="group2">
											<div class="origdiv">
												<h4>{{$continent->CONTINENT_NAME}}</h4>
												<ul>
													@foreach($countries as $country)
														@if($continent->CONTINENT_ID == $country->CONTINENT_ID)
															<li><a href="{{URL::route('article.bycountry', $country->COUNTRY_ID)}}"><img src="{{$country->FLAG_IMAGE}}" />{{$country->COUNTRY_NAME}}</a></li>
														@endif
													@endforeach
												</ul>
											</div>
									@endif
								@else
									@if($ctr == 5)
												<div class="div50">
													<h4>{{$continent->CONTINENT_NAME}}</h4>
													<ul>
														@foreach($countries as $country)
															@if($continent->CONTINENT_ID == $country->CONTINENT_ID)
																<li><a href="{{URL::route('article.bycountry', $country->COUNTRY_ID)}}"><img src="{{$country->FLAG_IMAGE}}" />{{$country->COUNTRY_NAME}}</a></li>
															@endif
														@endforeach
													</ul>
												</div>
											</div>
										</div>
									@else
											<div class="origdiv">
												<h4>{{$continent->CONTINENT_NAME}}</h4>
												<ul>
													@foreach($countries as $country)
														@if($continent->CONTINENT_ID == $country->CONTINENT_ID)
															<li><a href="{{URL::route('article.bycountry', $country->COUNTRY_ID)}}"><img src="{{$country->FLAG_IMAGE}}" />{{$country->COUNTRY_NAME}}</a></li>
														@endif
													@endforeach
												</ul>
											</div>
										</div>
									@endif
								@endif
								@if($ctr == $rev)
									<?php
										$rev = $rev+2;
									?>
								@endif
								<?php
									$ctr++;
								?>
							@endforeach
						</div>
						<div class="footcategory">
							<h3 class="footlabel">Categories</h3>
							<div>
								<h4>Menu</h4>
								<ul>
									<li><a href="{{URL::route('article.bycategory', 1)}}"><i class="fa fa-cutlery"></i>&nbsp;Gourmet</a></li>
									<li><a href="{{URL::route('article.bycategory', 2)}}"><i class="fa fa-music"></i>&nbsp;Leisure</a></li>
									<li><a href="{{URL::route('article.bycategory', 3)}}"><i class="fa fa-briefcase"></i>&nbsp;Life</a></li>
									<li><a href="{{URL::route('article.bycategory', 4)}}"><i class="fa fa-leanpub"></i>&nbsp;Study</a></li>
									<li><a href="{{URL::route('article.bycategory', 5)}}"><i class="fa fa-usd"></i>&nbsp;Business</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="defaultWidth center clear-auto">
						<p class="copyright">&copy; Copyright Kura-Star 2015. All Right Reserved.</p>
					</div>
				</div>
				
				
		</div>
		<script src="/assets/js/new/jquery-ui.js"></script>
		<script src="/assets/js/new/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="/assets/js/new/jquery.flexslider.js"></script>
		<script src="/assets/js/new/script.js"></script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-60838164-1', 'auto');
		  ga('send', 'pageview');
		</script>

	
	</body>

<!-- Mirrored from 10.20.150.92/template/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Apr 2015 04:22:38 GMT -->
</html>