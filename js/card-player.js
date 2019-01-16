
jQuery( function ( $ ) {




var autoplayNextCard = true;

function togglePlayback ( $card ) {

	var $mediaToggle = $card.find( ".js_media_toggle" );
	// var $audio = $( ".js_audio" );

	// Disable the card toggle
	$mediaToggle.prop( "disabled", true );

	/*
	 * Stop all cards that are currently playing
	 */
	// If the card toggled is the one itself that is playing, then just pause
	if ( $card.hasClass( "js_currently_playing" ) ) {
		pauseCard( $card );
		$mediaToggle.prop( "disabled", false );
		return;
	}
	else {
		// Else pause the currently playing card
		var $currentCardPlaying = $( ".js_currently_playing" )
		pauseCard( $currentCardPlaying );
	}

	playCard( $card );

	// Re-enable the card toggle
	$mediaToggle.prop( "disabled", false );

}

function playCard ( $card ) {

	var $audio = $( ".js_audio" );
	var domAudio = $audio.get( 0 );
	var currentTime = parseInt( $card.data( "timestamp" ) || 0, 10 );

	$audio.attr( "src", $card.data( "src" ) );
	domAudio.play().then( function () {
		// Seek to the time where the card was last at
		domAudio.currentTime = currentTime;
		// Update the label on the card to "Pause"
		var $mediaToggle = $card.find( ".js_media_toggle" );
		$mediaToggle.find( ".js_media_action_label" ).text( "Pause" );
		$mediaToggle.find( ".js_media_action_icon" ).text( "pause" );
		// Update the title of the card being played on the control panel
		var cardLabel = $card.find( ".js_card_label" ).text();
		$( ".js_current_card_label" ).text( cardLabel );
		// Mark / Designate the card as "currently playing"
		$card.addClass( "js_currently_playing" );
	} );

}

function pauseCard ( $card ) {

	if ( ! $card.length )
		return;

	var $audio = $( ".js_audio" );
	var domAudio = $audio.get( 0 );

	// Store the timestamp
	var currentTime = parseInt( domAudio.currentTime, 10 );
	$card.data( "timestamp", currentTime );

	// Pause and clear the audio element
	domAudio.pause();
	$audio.removeAttr( "src" );

	// Update the label on the card to "Resume"
	var $mediaToggle = $card.find( ".js_media_toggle" );
	$mediaToggle.find( ".js_media_action_label" ).text( "Resume" );
	$mediaToggle.find( ".js_media_action_icon" ).text( "play_arrow" );

	// Remove the "currently playing" designation
	$card.removeClass( "js_currently_playing" );

}

$( document ).on( "click", ".js_media_toggle", function ( event ) {

	var $card = $( event.target ).closest( ".js_card" );
	// playCard( $card );
	togglePlayback( $card );

} );

$( ".js_audio" ).on( "timeupdate", function ( event ) {

	var domAudio = event.target;
	var $card = $( ".js_currently_playing" );

	if ( ! $card.length )
		return;

	var domCardProgress = $card.find( ".js_card_progress" ).get( 0 );

	var progress = domAudio.currentTime / domAudio.duration * 100;
	domCardProgress.MaterialProgress.setProgress( progress );

} );

$( ".js_audio" ).on( "ended", function ( event ) {

	var domAudio = event.target;
	var $card = $( ".js_currently_playing" );

	var $mediaToggle = $card.find( ".js_media_toggle" );

	// Force a pause for the browsers that incorrectly report `false` to the `paused` attribute
	pauseCard( $card );
	$mediaToggle.find( ".js_media_action_label" ).text( "Replay" );
	$mediaToggle.find( ".js_media_action_icon" ).text( "replay" );

	// Reset the card's current timestamp to 0
	$card.data( "timestamp", 0 );

	// Play next card ( if there is )
	if ( autoplayNextCard ) {
		var $nextCard = $card.next();
		if ( $nextCard.length )
			playCard( $nextCard );
	}

} );

/*
 * Toggle the card autoplay
 */
$( ".js_card_autoplay" ).on( "change", function ( event ) {
	autoplayNextCard = $( event.target ).is( ":checked" );
} );






} );
