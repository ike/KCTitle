<!doctype html>

<!-- 
320 and Up boilerplate extension
Andy Clarke http://about.me/malarkey
Keith Clark http://twitter.com/keithclarkcouk
Version: 2
URL: http://stuffandnonsense.co.uk/projects/320andup/
License: http://creativecommons.org/licenses/MIT
-->

<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang="en"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html class="no-js" lang="en"><!--<![endif]-->

<head>
<meta charset="utf-8">

<title> Klickitat County Title Company </title>
<meta name="description" content="">
<meta name="author" content="">

<!-- http://t.co/dKP3o1e -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0">

<!-- For all browsers -->
<link rel="stylesheet" href="css/style.css">

<!--[if (lt IE 9) & (!IEMobile)]>
<script src="js/libs/selectivizr-min.js"></script>
<![endif]-->

<!-- JavaScript -->
<script src="js/libs/modernizr-2.0.6.min.js"></script>

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=IM+Fell+English' rel='stylesheet' type='text/css'>


<!-- For iPhone 4 -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/h/apple-touch-icon.png">
<!-- For iPad 1-->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/m/apple-touch-icon.png">
<!-- For iPhone 3G, iPod Touch and Android -->
<link rel="apple-touch-icon-precomposed" href="img/l/apple-touch-icon-precomposed.png">
<!-- For Nokia -->
<link rel="shortcut icon" href="img/l/apple-touch-icon.png">
<!-- For everything else -->
<link rel="shortcut icon" href="/favicon.ico">

<!--iOS. Delete if not required -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link rel="apple-touch-startup-image" href="img/splash.png">

<!--Microsoft. Delete if not required -->
<meta http-equiv="cleartype" content="on">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script><script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script><![endif]-->

<!-- http://t.co/y1jPVnT -->
<link rel="canonical" href="/">
</head>

<body class="clearfix">

<header role="banner">
	<div id="logo"><img src="img/Logo-small.png"></div>
	<a href="/" style="text-decoration: none;"><h1>Klickitat County Title Company</h1></a>

	<nav class="top-nav">
		<ul>
			<li><a href="index.html" name="home" class="nav">Home</a></li>
			<li><a href="contact.php" name="contact" class="nav">Contact</a></li>
			<li><a href="order.php" name="order" class="nav">Order</a></li>
			<li><a href="service.php" name="service" class="nav">Service</a></li>
		</ul>
	</nav>
</header>

<div class="content clearfix">

<div role="main" class="main">
   <section class="content">
  <h1 class="center">Success!</h1>
  <p class="center">
  <?php 
  
  if ($_GET["t"] == "order") {
  	echo "Thanks so much for your order. You'll hear from us shortly!";
  } elseif ($_GET["t"] == "contact") {
  	echo "Thanks so much for contacting us. You'll hear from us shortly!";
  } elseif ($_GET["t"] == "contact") {
	echo "Thanks for requesting a service order. You'll hear from us shortly!";
  } else {
	echo "Thanks so much for contacting us. You'll hear from us shortly!";
  }

  ?>
  </p>

  
</section>

</div>

<div role="complementary" id="complementary">

</div>
</div>

<footer role="contentinfo" class="clearfix">
</footer>

<!-- Scripts -->
<script src="js/libs/jquery-1.6.2.min.js"></script>
<script src="js/scripts.js"></script>

<!--[if (lt IE 9) & (!IEMobile)]>
<script src="js/libs/imgsizer.js"></script>
<![endif]-->

<script>
// iOS scale bug fix
MBP.scaleFix();

// Respond.js
yepnope({
	test : Modernizr.mq('(min-width)'),
	nope : ['js/libs/respond.min.js']
});

$('.phone').mask("(999) 999-9999", {placeholder:"_"});

// StickyScroller
$(document).scroll(function(){
	if ($(window).width() >= 992) {
		if ($(document).scrollTop() >= 150) {
			$('#complementary').removeClass('locked').addClass('floating');
		} else {
			$('#complementary').removeClass('floating').addClass('locked');
		}
	}
});
</script>

<!-- http://mths.be/aab -->
<!-- <script>
var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'));
</script> -->


</body>
</html>
