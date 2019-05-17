<?php function gethead(){ ?>

	<?php global $ver; ?>

	<!--
	*
	*	SEO Content
	*
	- -->
	<!-- Short description of your document's subject -->
	<!-- <meta name="subject" content="your document's subject"> -->
	<!-- Short description of the document (limit to 150 characters) -->
	<!-- This content *may* be used as a part of search engine results. -->
	<meta name="description" content="An immersive tour of Klassik Landmark as you explore the place.">



	<!--
	*
	*	Authors
	*
	- -->
	<!-- Links to information about the author(s) of the document -->
	<meta name="author" content="Coders For Designers">
	<link rel="author" href="humans.txt">



	<!--
	*
	*	SEO meta
	*
	- -->
	<!-- Set the base URL for all relative URLs within the document -->
	<base href="/"><!-- ( example : http://example.com/page.html ) -->
	<!-- Links to top level resource in an hierarchical structure -->
	<!-- <link rel="index" href="http://example.com/article/"> -->
	<!-- Helps prevent duplicate content issues -->
	<link rel="canonical" href="https://audiotour.klassikbuild.com/">
	<!-- Control the behavior of search engine crawling and indexing -->
	<meta name="robots" content="index,follow"><!-- All Search Engines -->
	<meta name="googlebot" content="index,follow"><!-- Google Specific -->



	<!--
	*
	*	Web Application
	*
	- -->
	<!-- Name of web application (only should be used if the website is used as an app) -->

	<!-- Links to a JSON file that specifies "installation" credentials for the web applications -->
	<link rel="manifest" href="manifest.json">

	<!-- ~ iOS ~ -->
	<!-- Disable automatic detection and formatting of possible phone numbers -->
	<meta name="format-detection" content="telephone=no">
	<!-- Launch Screen Image -->
	<!-- <link rel="apple-touch-startup-image" href="/path/to/launch.png"> -->
	<!-- Launch Icon Title -->
	<!-- <meta name="apple-mobile-web-app-title" content="App Title"> -->
	<!-- Enable standalone (full-screen) mode -->
	<!-- <meta name="apple-mobile-web-app-capable" content="yes"> -->
	<!-- Status bar appearance (has no effect unless standalone mode is enabled) -->
	<!-- <meta name="apple-mobile-web-app-status-bar-style" content="black"> -->

	<!-- ~ Android ~ -->
	<!-- Add to home screen -->
	<meta name="mobile-web-app-capable" content="yes">
	<!-- More info: https://developer.chrome.com/multidevice/android/installtohomescreen -->



	<!--
	*
	*	Social
	*
	- -->
	<!-- Facebook Open Graph -->
	<meta property="og:url" content="https://audiotour.klassikbuild.com">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Audio Tour | Klassik Landmark">
	<meta property="og:image" content="https://klassikbuild.com/landmark/media/favicon/apple-icon.png">
	<meta property="og:description" content="An immersive tour of Klassik Landmark as you explore the place.">
	<meta property="og:site_name" content="Klassik Landmark">


	<!--
	*
	*	Favicon
	*
	- -->
	<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<link rel="manifest" href="favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#444444">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#444444">

	<!-- Safari Pinned Tab Icon -->
	<!-- <link rel="mask-icon" href="/path/to/icon.svg" color="blue"> -->



	<!--
	*
	*
	- -->

	<!--
	*
	*	Enqueue Files
	*
	- -->

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Concert+One|Roboto:400,400i,700" rel="stylesheet">

	<!-- Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- MDL -->
	<link rel="stylesheet" href="/plugins/mdl/material.min.css">
	<link rel="stylesheet" href="/plugins/mdl/mdl-custom.css">
	<script type="text/javascript" src="/plugins/mdl/material.min.js"></script>

	<!-- BFS Stylesheets -->
	<?php //require __DIR__ . '/../style.php'; ?>

	<!-- jQuery 3 -->
	<script type="text/javascript" src="/plugins/jquery/jquery-3.0.0.min.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-43861509-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [ ];
		function gtag () { dataLayer.push( arguments ); }
	  	gtag( "js", new Date() );
		gtag( "config", "UA-43861509-2" );
	</script>
	<!-- END: Global site tag -->

<?php } ?>
