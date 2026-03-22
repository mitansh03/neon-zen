/**
 * Scroll reveal animations using Intersection Observer.
 *
 * Add class "reveal" to any element you want to animate on scroll.
 * Elements start with opacity: 0 and translate, then animate in when visible.
 *
 * @package Zen_Yoga
 */
( function() {
	'use strict';

	const reveals = document.querySelectorAll( '.reveal' );

	if ( ! reveals.length ) {
		return;
	}

	const observer = new IntersectionObserver(
		function( entries ) {
			entries.forEach( function( entry ) {
				if ( entry.isIntersecting ) {
					entry.target.classList.add( 'is-visible' );
					observer.unobserve( entry.target );
				}
			} );
		},
		{
			threshold: 0.15,
			rootMargin: '0px 0px -50px 0px',
		}
	);

	reveals.forEach( function( el ) {
		observer.observe( el );
	} );
} )();
