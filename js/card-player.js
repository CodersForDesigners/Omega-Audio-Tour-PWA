
jQuery( function ( $ ) {




function playCard ( $card ) {

	var $mediaToggle = $card.find( ".js_media_toggle" );
	var $audio = $mediaToggle.parent().find( "audio" );
	var domAudio = $audio.get( 0 );

	/*
	 * Stop all cards that are currently playing
	 */
	if ( $card.hasClass( "js_currently_playing" ) ) {
		pauseCard( $card );
		return;
	}
	var $currentCardPlaying = $( ".js_currently_playing" )
	pauseCard( $currentCardPlaying );

	if ( $audio.data( "state" ) != "playing" ) {
		$mediaToggle.prop( "disabled", true );
		domAudio.play().then( function () {
			$mediaToggle.find( ".js_media_action_label" ).text( "Pause" );
			$mediaToggle.find( ".js_media_action_icon" ).text( "pause" );
			var cardLabel = $card.find( ".js_card_label" ).text();
			$( ".js_current_card_label" ).text( cardLabel );
			$mediaToggle.prop( "disabled", false );
			$audio.data( "state", "playing" );
			$card.addClass( "js_currently_playing" );
		} )
	}

}

function pauseCard ( $card ) {

	if ( ! $card.length )
		return;

	var $mediaToggle = $card.find( ".js_media_toggle" );
	var $audio = $card.find( ".js_audio" );
	var domAudio = $audio.get( 0 );

	domAudio.pause();
	$mediaToggle.find( ".js_media_action_label" ).text( "Resume" );
	$mediaToggle.find( ".js_media_action_icon" ).text( "play_arrow" );
	$audio.data( "state", "paused" );
	$card.removeClass( "js_currently_playing" );

}

$( document ).on( "click", ".js_media_toggle", function ( event ) {

	var $card = $( event.target ).closest( ".js_card" );
	playCard( $card );

} );

$( ".js_audio" ).on( "timeupdate", function ( event ) {

	var domAudio = event.target;
	var $card = $( event.target ).closest( ".js_card" );
	var domCardProgress = $card.find( ".js_card_progress" ).get( 0 );

	var progress = domAudio.currentTime / domAudio.duration * 100;
	domCardProgress.MaterialProgress.setProgress( progress );

} );

$( ".js_audio" ).on( "ended", function ( event ) {

	var domAudio = event.target;
	var $card = $( event.target ).closest( ".js_card" );

	var $mediaToggle = $card.find( ".js_media_toggle" );
	// var domCardProgress = $card.find( ".js_card_progress" ).get( 0 );
	// domCardProgress.MaterialProgress.setProgress( 0 );

	// Force a pause for the browsers that incorrectly report `false` to the `paused` attribute
	pauseCard( $card );
	$mediaToggle.find( ".js_media_action_label" ).text( "Replay" );
	$mediaToggle.find( ".js_media_action_icon" ).text( "replay" );

} );






} );
