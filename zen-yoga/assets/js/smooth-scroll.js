/**
 * Smooth scroll for anchor links.
 * CSS scroll-behavior handles the animation; this handles offset for fixed header.
 *
 * @package Zen_Yoga
 */
( function() {
	'use strict';

	document.querySelectorAll( 'a[href^="#"]' ).forEach( function( anchor ) {
		anchor.addEventListener( 'click', function( e ) {
			const targetId = this.getAttribute( 'href' );

			if ( targetId === '#' ) {
				return;
			}

			const target = document.querySelector( targetId );

			if ( target ) {
				e.preventDefault();
				target.scrollIntoView( { behavior: 'smooth', block: 'start' } );
			}
		} );
	} );
} )();
