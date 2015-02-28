// Comment Reply Links to Buttons
$(document).ready(function(){
	$( '.comment-reply-link' ).addClass( 'button' );
});

// Sticky Header
$(document).ready(function(){
	var stickyHeaderTop = $('#main-navbar').offset().top;
	if (window.matchMedia("(min-width: 37.5em)").matches) {
		$(window).scroll(function(){
			if( $(window).scrollTop() > stickyHeaderTop ) {
				$('#main-navbar').addClass( 'stickyheader' );
			} else {
				$('#main-navbar').removeClass( 'stickyheader' );
			}
		});
	};
});