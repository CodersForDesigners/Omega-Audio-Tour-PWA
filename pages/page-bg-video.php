
<!--
	This snippet is for when you want add a auto-playing video in the background,
	that is hosted on YouTube.
	The parameters you have to change are,
		1. the video ID, i.e. what comes after the "/embed/" and before the "?".
		2. the time ( in seconds ) at which point the video is to loop back to
			the beginning. This is mentioned after "end=".
 -->
<section class="video_bg_section">

	<div class="layer-1">
		<div class="youtube-embed-bg js_embed_bg_yt ga_video" data-ga-video-src="Sample - Video">
			<div class="youtube_load"></div>
			<iframe id="embed_player_container" width="1280" height="1200" src="https://www.youtube.com/embed/68MBwELQKmk?enablejsapi=1&html5=1&mute=1&color=white&controls=0&disablekb=1&fs=0&autoplay=0&loop=0&modestbranding=1&playsinline=1&rel=0&showinfo=0&end=5" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>

</section> <!-- END : Video BG Section -->
