
/*
 * Constants
 */
const GTM_HOST = "www.googletagmanager.com";
const GOOGLE_ANALYTICS_HOST = "www.google-analytics.com";
// All known Measurement Protocol single-hit collect endpoints
const GOOGLE_COLLECT_PATHS_REGEX = /^\/(\w+\/)?collect/;
	// 	Most of the time the default path (/collect) is used, but occasionally
	// 	an experimental endpoint is used when testing new features.
	// 	( for example, "/r/collect" or "/j/collect" )
const routesToNotCache = [ GTM_HOST, GOOGLE_ANALYTICS_HOST ];


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

	let pageRoutes = CACHE_MANIFEST.filter(
		resource => ( ! resource.url.includes( "." ) )
	);
	let otherResources = CACHE_MANIFEST.filter(
		resource => resource.url.includes( "." )
	);

	let cache = await caches.open( CACHE_ID );

	// Delete all the page routes
	pageRoutes.forEach( async function ( route ) {
		await cache.delete( route.url );
	} );

	otherResources.forEach( async function ( request ) {
		let response = await caches.match( request.url, { ignoreSearch: true } );
		if ( response ) {
			let requestVersion = request.v || 0;
			let responseVersion = parseInt(
				new URL( response.url ).searchParams.get( "v" ), 10
			) || 0;
			// If the existing version of the version of the resource
			// is less than the one being requested, then fetch again
			if ( responseVersion < requestVersion ) {
				let requestUrl = new URL( request.url );
				requestUrl.set( "v", request.url );
				await cache.add( requestUrl.href );
			}
			else
				await cache.put( request.url, response );
		}
		else
			await cache.add( request.url );
	} );
	// Fetch and cache all the page routes
	await cache.addAll( pageRoutes.map( route => route.url ) );

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
	let url = new URL( request.url );

	// If the request is to certain blacklisted domains, we don't cache them
	if ( routesToNotCache.includes( url.host ) )
		return await fetch( request );

	let cache = await caches.open( CACHE_ID );

	let response;

	// if ( request is not cross-domain )
		response = await cache.match( request );

	if ( response )
		return response;

	response = await fetch( request );
	if ( response.ok )
		// if ( request is not cross-domain )
			await cache.add( request, response );

	return response;

}
