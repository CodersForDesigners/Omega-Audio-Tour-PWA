<?php

	// :: ONLY DURING DEVELOPMENT ::
	// debugging
	ini_set( "display_errors", "On" );
	ini_set( "error_reporting", E_ALL );

	/*
	 * Versioning Assets to invalidate the browser cache
	 */
	$ver = '?v=20181126';

	// get info on the request
	$view = require "server/pageless.php";
	$viewName = $view[ 0 ];
	$viewPath = $view[ 1 ];

	// included external php files with functions.
	require ('inc/head.php');
	require ('inc/lazaro.php'); /* -- Lazaro disclaimer and footer -- */

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"
	prefix="og: http://ogp.me/ns# fb: http://www.facebook.com/2008/fbml">

<head>


	<!-- Nothing Above This -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Page Title | Page Name -->
	<title>Page Title <?php echo ( $viewName != "404" ? " | " . $viewName : "" ) ?></title>

	<?php echo gethead(); ?>

</head>

<body id="body" class="body">

<!--  ★  MARKUP GOES HERE  ★  -->





<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
	<header class="mdl-layout__header">
		<div class="mdl-layout__header-row">
			<!-- Title -->
			<span class="mdl-layout-title">Klassik Landmark</span>
			<!-- Add spacer, to align navigation to the right -->
			<div class="mdl-layout-spacer"></div>
			<!-- Right aligned menu below button -->
			<button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
				<i class="material-icons">more_vert</i>
			</button>
			<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="demo-menu-lower-right">
				<li class="mdl-menu__item">Some Action</li>
				<li class="mdl-menu__item">Another Action</li>
				<li disabled class="mdl-menu__item">Disabled Action</li>
				<li class="mdl-menu__item">Yet Another Action</li>
			</ul>
		</div>
	</header>
	<div class="mdl-layout__drawer">
		<span class="mdl-layout-title">Title</span>
		<nav class="mdl-navigation">
			<a class="mdl-navigation__link" href="">Link</a>
			<a class="mdl-navigation__link" href="">Link</a>
			<a class="mdl-navigation__link" href="">Link</a>
			<a class="mdl-navigation__link" href="">Link</a>
		</nav>
	</div>
	<main class="mdl-layout__content">
		<!-- Your content goes here -->
		<div class="page-content">
			<div class="mdl-grid playlist-subhead mdl-color--indigo-400">
				<div class="mdl-cell mdl-cell--12-col">
					<label class="playlist-meta mdl-color-text--white">
						<i class="material-icons">label</i>
						<span>2035 SQFT</span>
						<i class="material-icons">label_important</i>
						<span>West Facing</span>
						<i class="material-icons">label_important</i>
						<span>B - 13A</span>
					</label>
				</div>
			</div>		
			<div class="mdl-grid playlist">
				<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
					<div class="clip-card mdl-card mdl-shadow--2dp">
						<div class="card-title mdl-card__title">
							<h2 class="mdl-card__title-text">Welcome</h2>
						</div>
						<div class="mdl-card__supporting-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							Mauris sagittis pellentesque lacus eleifend lacinia...
						</div>
						<!-- Simple MDL Progress Bar -->
						<div id="p1" class="mdl-progress mdl-js-progress"></div>
						<script>
						  document.querySelector('#p1').addEventListener('mdl-componentupgraded', function() {
						    this.MaterialProgress.setProgress(99);
						  });
						</script>
						<div class="mdl-card__actions mdl-card--border">
							<a class="playback-button mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
								<span>Replay</span>
								<i class="material-icons">replay</i>
							</a>
						</div>
					</div>
				</div>
				<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
					<div class="clip-card mdl-card mdl-shadow--2dp">
						<div class="card-title mdl-card__title">
							<h2 class="mdl-card__title-text">Welcome</h2>
						</div>
						<div class="mdl-card__supporting-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							Mauris sagittis pellentesque lacus eleifend lacinia...
						</div>
						<!-- Simple MDL Progress Bar -->
						<div id="p2" class="mdl-progress mdl-js-progress"></div>
						<script>
						  document.querySelector('#p2').addEventListener('mdl-componentupgraded', function() {
						    this.MaterialProgress.setProgress(44);
						  });
						</script>
						<div class="mdl-card__actions mdl-card--border">
							<a class="playback-button mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
								<span>Pause</span>
								<i class="material-icons">pause</i>
							</a>
						</div>
					</div>
				</div>
				<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
					<div class="clip-card mdl-card mdl-shadow--2dp">
						<div class="card-title mdl-card__title">
							<h2 class="mdl-card__title-text">Welcome</h2>
						</div>
						<div class="mdl-card__supporting-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							Mauris sagittis pellentesque lacus eleifend lacinia...
						</div>
						<!-- Simple MDL Progress Bar -->
						<div id="p3" class="mdl-progress mdl-js-progress"></div>
						<script>
						  document.querySelector('#p3').addEventListener('mdl-componentupgraded', function() {
						    this.MaterialProgress.setProgress(1);
						  });
						</script>
						<div class="mdl-card__actions mdl-card--border">
							<a class="playback-button mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
								<span>Listen</span>
								<i class="material-icons">play_arrow</i>
							</a>
						</div>
					</div>
				</div>
				<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
					<div class="clip-card mdl-card mdl-shadow--2dp">
						<div class="card-title mdl-card__title">
							<h2 class="mdl-card__title-text">Welcome</h2>
						</div>
						<div class="mdl-card__supporting-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							Mauris sagittis pellentesque lacus eleifend lacinia...
						</div>
						<!-- Simple MDL Progress Bar -->
						<div id="p4" class="mdl-progress mdl-js-progress"></div>
						<script>
						  document.querySelector('#p4').addEventListener('mdl-componentupgraded', function() {
						    this.MaterialProgress.setProgress(1);
						  });
						</script>
						<div class="mdl-card__actions mdl-card--border">
							<a class="playback-button mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
								<span>Listen</span>
								<i class="material-icons">play_arrow</i>
							</a>
						</div>
					</div>
				</div>
				<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
					<div class="clip-card mdl-card mdl-shadow--2dp">
						<div class="card-title mdl-card__title">
							<h2 class="mdl-card__title-text">Welcome</h2>
						</div>
						<div class="mdl-card__supporting-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							Mauris sagittis pellentesque lacus eleifend lacinia...
						</div>
						<!-- Simple MDL Progress Bar -->
						<div id="p5" class="mdl-progress mdl-js-progress"></div>
						<script>
						  document.querySelector('#p5').addEventListener('mdl-componentupgraded', function() {
						    this.MaterialProgress.setProgress(1);
						  });
						</script>
						<div class="mdl-card__actions mdl-card--border">
							<a class="playback-button mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
								<span>Listen</span>
								<i class="material-icons">play_arrow</i>
							</a>
						</div>
					</div>
				</div>
				<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
					<div class="clip-card mdl-card mdl-shadow--2dp">
						<div class="card-title mdl-card__title">
							<h2 class="mdl-card__title-text">Welcome</h2>
						</div>
						<div class="mdl-card__supporting-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							Mauris sagittis pellentesque lacus eleifend lacinia...
						</div>
						<!-- Simple MDL Progress Bar -->
						<div id="p6" class="mdl-progress mdl-js-progress"></div>
						<script>
						  document.querySelector('#p6').addEventListener('mdl-componentupgraded', function() {
						    this.MaterialProgress.setProgress(1);
						  });
						</script>
						<div class="mdl-card__actions mdl-card--border">
							<a class="playback-button mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
								<span>Listen</span>
								<i class="material-icons">play_arrow</i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>







<!--  ☠  MARKUP ENDS HERE  ☠  -->

<!-- JS Modules -->
<script type="text/javascript">

// JAVASCRIPT GOES HERE
$(document).ready(function(){
});

</script>

<!-- Other Modules -->
<?php // require __DIR__ . '/inc/can-user-hover.php' ?>


</body>

</html>
