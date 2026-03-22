/**
 * Mobile navigation toggle.
 *
 * @package Zen_Yoga
 */
( function() {
	'use strict';

	const toggle = document.getElementById( 'menu-toggle' );
	const nav = document.getElementById( 'primary-nav' );

	if ( ! toggle || ! nav ) {
		return;
	}

	toggle.addEventListener( 'click', function() {
		const isOpen = toggle.getAttribute( 'aria-expanded' ) === 'true';
		toggle.setAttribute( 'aria-expanded', String( ! isOpen ) );
		nav.classList.toggle( 'is-open' );
	} );

	// Close menu when a nav link is clicked.
	nav.querySelectorAll( 'a' ).forEach( function( link ) {
		link.addEventListener( 'click', function() {
			toggle.setAttribute( 'aria-expanded', 'false' );
			nav.classList.remove( 'is-open' );
		} );
	} );
} )();
