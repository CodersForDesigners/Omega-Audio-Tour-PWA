<?php

	// :: ONLY DURING DEVELOPMENT ::
	// debugging
	ini_set( "display_errors", "On" );
	ini_set( "error_reporting", E_ALL );

	/*
	 * Versioning Assets to invalidate the browser cache
	 */
	$ver = '?v=20181126';

	// included external php files with functions.
	require ('inc/head.php');
	require ('inc/lazaro.php'); /* -- Lazaro disclaimer and footer -- */

	// The card data
	$cards = json_decode( file_get_contents( __DIR__ . '/data/cards.json' ), true );
	$cards = array_filter( $cards, function ( $card ) {
		if ( empty( $card[ 'exclude' ] ) )
			return true;
		else
			return ! $card[ 'exclude' ];
	} );

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"
	prefix="og: http://ogp.me/ns# fb: http://www.facebook.com/2008/fbml">

<head>


	<!-- Nothing Above This -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Page Title | Page Name -->
	<title>Page Title</title>

	<?php echo gethead(); ?>

</head>

<body id="body" class="body">

<!--  ★  MARKUP GOES HERE  ★  -->





<!-- Always shows a header, even in smaller screens. -->
<div class="app-layout mdl-layout mdl-js-layout mdl-layout--fixed-header">
	<header class="app-header mdl-layout__header">
		<div class="mdl-layout__header-row">
			<!-- Title -->
			<span class="mdl-layout-title">Island 3BHK</span>
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
	<div class="playlist-navigation mdl-layout__drawer">
		<span class="title mdl-layout-title mdl-color--omega-500 mdl-color-text--white">
			<img src="/media/brand/nav-thumbnail-klassik.jpg">
		</span>
		<nav class="mdl-navigation">
			<div class="subtitle mdl-color--grey-200">
				<small>Building Tour</small>
			</div>
			<a class="mdl-navigation__link" href="">
				<!-- <i class="material-icons">lens</i> -->
				<strong class="mdl-color-text--omega-500">Klassik Landmark</strong>
			</a>
			<div class="subtitle mdl-color--grey-200">
				<small>Apartment Tour</small>
			</div>
			<a class="mdl-navigation__link" href="">
				<strong class="mdl-color-text--omega-500">Island 3BHK</strong><br>
				<small>2035 SQFT | West Facing</small>
			</a>
			<a class="mdl-navigation__link" href="">
				<strong class="mdl-color-text--omega-500">Plush 3BHK</strong><br>
				<small>2035 SQFT | East Facing</small>
			</a>
			<a class="mdl-navigation__link" href="">
				<strong class="mdl-color-text--omega-500">Elevate 3BHK</strong><br>
				<small>2035 SQFT | West Facing</small>
			</a>
		</nav>
	</div>
	<main class="mdl-layout__content">
		<!-- Your content goes here -->
		<div class="page-content">
			<div class="mdl-grid playlist-subhead">
				<div class="playlist-meta mdl-cell mdl-cell--12-col">
					<small class="mdl-color-text--white">2035 SQFT</small>
					<small class="mdl-color-text--white">West Facing</small>
					<small class="mdl-color-text--white">B - 13A</small>
				</div>
			</div>
			<div class="mdl-grid playlist">

				<?php foreach ( $cards as $index => $card ) : ?>

					<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone js_card" data-src="<?php echo $card[ 'audio' ] ?>">
						<div class="clip-card mdl-card mdl-shadow--2dp">
							<div class="card-title mdl-card__title" style="background-image: url( '<?php echo $card[ 'image' ] ?>' );">
								<h4 class="playlist-index mdl-card__title-text"><?php echo $index + 1 ?></h4>
							</div>
							<div class="mdl-card__supporting-text">
								<div class="description js_card_label"><?php echo $card[ 'description' ] ?></div>
							</div>
							<!-- Simple MDL Progress Bar -->
							<div class="mdl-progress mdl-js-progress js_card_progress"></div>
							<div class="mdl-card__actions mdl-card--border">
								<button class="playback-button mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect js_media_toggle">
									<span class="js_media_action_label">Listen</span>
									<i class="material-icons js_media_action_icon">play_arrow</i>
								</button>
							</div>
						</div>
					</div>

				<?php endforeach; ?>

			</div>

			<!-- Notification Section -->
			<div class="mdl-js-snackbar mdl-snackbar js_notification_section">
				<div class="mdl-snackbar__text"></div>
				<button class="mdl-snackbar__action" type="button"></button>
			</div>

		</div>
	</main>
	<footer class="app-footer">
		<audio class="js_audio hidden" preload="none"></audio>
		<div class="playlist-playhead js_playlist_playhead">
			<!-- Default Slider -->
			<input class="mdl-slider mdl-js-slider js_card_seek_scrubber" type="range" min="0" max="100" value="0" tabindex="0" disabled>
		</div>
		<div class="mdl-grid playlist-footer">
			<div class="playlist-status mdl-cell mdl-cell--10-col mdl-cell--6-col-tablet mdl-cell--3-col-phone mdl-color-text--omega-500">
				<i class="material-icons">volume_up</i>
				<span class="status-text js_current_card_label"></span>
			</div>
			<div class="playlist-autoplay mdl-cell mdl-cell--2-col mdl-cell--2-col-tablet mdl-cell--1-col-phone">
				<strong>Autoplay</strong>
				<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-1">
				  <input type="checkbox" id="switch-1" class="mdl-switch__input js_card_autoplay" checked>
				  <span class="mdl-switch__label"></span>
				</label>
			</div>
		</div>
	</footer>
</div>







<!--  ☠  MARKUP ENDS HERE  ☠  -->

<!-- JS Modules -->
<script type="text/javascript" src="js/card-player.js"></script>
<script type="text/javascript">

	if ( "serviceWorker" in navigator ) {

		/*
		 * Register a service worker
		 */
		window.addEventListener( "load", function ( event ) {
			var serviceWorkerIsAlreadyPresent = navigator.serviceWorker.controller;
			navigator.serviceWorker.register( "/service-worker.js", { scope: "/" } )
				.then( function ( registration ) {
					console.log( "Service worker registered", registration );
					if ( serviceWorkerIsAlreadyPresent )
						onServiceWorkerWaiting( registration, promptUserToUpdate );
				} )
				.then( navigator.serviceWorker.ready )
				.then( function ( registration ) {
					console.log( "Service worker is ready" );
				} )
				.catch( function ( e ) {
					console.error( "Service worker not registered", e );
				} )
		} );

		/*
		 * Refresh the page when a new service worker takes up shop
		 */
		var pageHasBeenRefreshed;
		navigator.serviceWorker.addEventListener( "controllerchange", function ( event ) {
			if ( pageHasBeenRefreshed )
				return;
			pageHasBeenRefreshed = true;
			window.location.reload();
		} );

	}

	function promptUserToUpdate ( registration ) {

		// Fancy snackbar approach
		var domNotificationSection = document.getElementsByClassName( "js_notification_section" )[ 0 ];
		domNotificationSection.MaterialSnackbar.showSnackbar( {
			message: "A new version has been installed. Do you wish to update to it?",
			timeout: 19000,
			actionHandler: function () {
				registration.waiting.postMessage( "skipWaiting" );
			},
			actionText: "Okay"
		} );

	}

	function onServiceWorkerWaiting ( registration, handler ) {

		if ( ! registration )
			return;

		if ( registration.waiting )
			handler( registration );

		function handleOnInstall () {
			registration.installing.addEventListener( "statechange", function ( event ) {
				if ( event.target.state == "installed" )
					handler( registration );
			} );
		}

		if ( registration.installing )
			handleOnInstall();

		registration.addEventListener( "updatefound", handleOnInstall );

	}

</script>

<!-- Other Modules -->
<?php // require __DIR__ . '/inc/can-user-hover.php' ?>


</body>

</html>
