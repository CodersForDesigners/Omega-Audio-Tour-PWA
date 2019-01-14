
let CACHE_VERSION = 1;
let APP_NAMESPACE = "experiments";
let CACHE_NAME = "test";
let CACHE_ID = `${APP_NAMESPACE}/${CACHE_NAME}/v${CACHE_VERSION}`;

let CACHE_MANIFEST = [
	// Routes
	"/",
	// Every other resource
		// Fonts
	"https://fonts.googleapis.com/css?family=Concert+One|Roboto:400,400i,700",
	"https://fonts.googleapis.com/icon?family=Material+Icons",

		// Libraries
	"/plugins/jquery/jquery-3.0.0.min.js",
	"/plugins/mdl/material.min.css",
	"/plugins/mdl/material.min.js",

		// Stylesheets
	"/plugins/mdl/mdl-custom.css",

		// Scripts
	"/js/card-player.js",

		// Media
			// Shell
	"/favicon/favicon-32x32.png",
	"/favicon/favicon-16x16.png",
	"/favicon/favicon-96x96.png",
	"/favicon/android-icon-192x192.png",
	"/media/brand/nav-thumbnail-klassik.jpg",
	"/media/icon/index-icon.svg",
	"/media/morocco.png",
			// Content
	"/media/tour/1.png",
	"/media/tour/2.png",
	// "/media/tour/3.png",
	// "/media/tour/4.png",
	"/media/tour-audio/1.mp3",
	"/media/tour-audio/2.mp3",
	// "/media/tour-audio/3.mp3",
	// "/media/tour-audio/4.mp3",
];





self.addEventListener( "install", function ( event ) {
	console.log( `::-:: Service worker installing: ${CACHE_ID} ::-::` );
	event.waitUntil( installServiceWorker( event ) );
} );

self.addEventListener( "message", function ( event ) {
	if ( event.data == "skipWaiting" )
		return self.skipWaiting();
} );

self.addEventListener( "activate", function ( event ) {
	console.log( `::-:: Service worker activating: ${CACHE_ID} ::-::` );
	event.waitUntil( activateServiceWorker( event ) );
} );

self.addEventListener( "fetch", function ( event ) {
	event.respondWith( fetchHandler( event ) );
} );









async function installServiceWorker ( event ) {

	let routes = CACHE_MANIFEST.filter( url => ( ! url.includes( "." ) ) );
	let otherResources = CACHE_MANIFEST.filter( url => url.includes( "." ) );

	let cache = await caches.open( CACHE_ID );

	otherResources.map( async function ( request ) {
		let response = await caches.match( request );
		if ( response )
			await cache.put( request, response );
		else
			await cache.add( request );
	} )
	await cache.addAll( routes );

	return Promise.resolve();

}

async function activateServiceWorker ( event ) {

	let cacheObjects = await caches.keys();
	let cacheObjectsToRemove = cacheObjects.filter( name => name != CACHE_ID );
	cacheObjectsToRemove.forEach( async function ( cache ) {
		await caches.delete( cache );
	} )

	return Promise.resolve();

}

async function fetchHandler ( event ) {

	let request = event.request;
	let cache = await caches.open( CACHE_ID );

	let response;

	// if ( request is not cross-domain )
		response = await cache.match( request );

	if ( ! response ) {
		response = await fetch( request );
		// if ( response.status == 200 )
		if ( response.ok )
			// if ( request is not cross-domain )
				await cache.add( request, response );
	}

	return response;

}
